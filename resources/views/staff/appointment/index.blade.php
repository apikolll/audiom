@extends('staff.sidebar')

@section('content1')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

<style>
    .active {
        border: 2px solid white;
        border-radius: 5px;
    }

    .unactive {
        display: none;
    }
</style>

<section class="pt-5 fs-6">
    <div class="container">

        <ul class="nav mb-3">
            <li class="nav-item {{ 'app' ==  request()->path() ? 'border-bottom' : '' }}">
                <a class="nav-link text-light fs-5" href="{{ route('app.index') }}">Appointments</a>
            </li>
            <li class="nav-item {{ 'schedule' ==  request()->path() ? 'border-bottom' : '' }}">
                <a class="nav-link text-light fs-5" href="{{ route('schedule.index') }}">Appointment Schedule</a>
            </li>
        </ul>

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end align-items-center mb-3">
                    <a href="{{ route('app.create') }}" class="btn btn-success">Add Appointment</a>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr class="bg-secondary bg-opacity-10">
                            <th scope="col" class="text-muted">APP ID</th>
                            <th scope="col" class="text-muted">PATIENT</th>
                            <th scope="col" class="text-muted">DOCTOR</th>
                            <th scope="col" class="text-muted">STATUS</th>
                            <th scope="col" class="text-muted"></th>
                        </tr>
                    </thead>
                   
                    <tbody class="align-middle">
                        @foreach ($appointments as $appointment)
                        @if (count($appointments) > 0)
                        <tr>
                            <th scope="row" class="fs-6"><span class="badge bg-info text-dark">{{ $appointment->id
                                    }}</span></th>
                            <td>
                                <span class="d-block fs-6">{{ $appointment->patient->name }}</span>
                            </td>
                            <td>
                                <span class="d-block fs-6">Dr. {{ $appointment->doctor->name }}</span>
                            </td>
                            <td><select class="form-select w-75 fs-6">
                                    <option selected>{{ $appointment->status }}</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Cancelled">Cancelled</option>
                                    <option value="Done">Done</option>
                                </select></td>
                            <td>
                                <form action="{{ route('app.delete', $appointment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('app.show', $appointment->id) }}"
                                        class="btn btn-outline-primary">Details</a>
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @else
                    <tr>
                        <td colspan="5" class="text-center fs-6">No Data Found</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $('select').on('change',function(){
            var status =  $( "select option:selected" ).val();
            var app_id = '{{$appointment->id}}';

            // $.ajaxSetup({
            //         headers: {
            //              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //             });

            $.ajax({
                url: '/change-status', 
                type: 'GET',
                dataType: "JSON",
                data: { 
                    status : status,
                    app_id : app_id
                },
                success:function(data){
                    alert("success");
                }
            });
        })
    })
</script>
@endforeach
@endsection