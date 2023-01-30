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

        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show text-center fs-6" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
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

                    @if (count($appointments) > 0)
                    @foreach ($appointments as $appointment)
                    <tbody class="align-middle">
                        <tr>
                            <th scope="row" class="fs-6"><span class="badge bg-info text-dark">{{ $appointment->id
                                    }}</span></th>
                            <td>
                                <span class="d-block fs-6">{{ $appointment->patient->name }}</span>
                            </td>
                            <td>
                                <span class="d-block fs-6">Dr. {{ $appointment->doctor->name }}</span>
                            </td>
                            <td><select class="form-select w-75 fs-6" data-id={{ $appointment->id }}>
                                    <option selected>{{ $appointment->status}}</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Approve">Approve</option>
                                    <option value="Cancelled">Cancelled</option>
                                    <option value="Done">Done</option>
                                    <option value="FollowUp">Follow-up</option>
                                </select></td>
                            <td>
                                <a href="{{ route('app.show', $appointment->id) }}"
                                    class="btn btn-outline-primary">Details</a>
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#ModalDelete{{ $appointment->id }}">Delete</a>
                            </td>
                            @include('staff.appointment.deleteappointment')
                        </tr>
                    </tbody>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5" class="text-center fs-6">No Data Found</td>
                    </tr>
                    @endif
                </table>

            </div>
        </div>
        <div class="text-dark mt-3 fs-6">
            {!! $appointments->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $('select').on('change',function(){
            var status =  $( "select option:selected" ).val();
            var app_id = $(this).data('id');

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
            location.reload();
        })
    })
</script>
{{-- @endforeach --}}
@endsection