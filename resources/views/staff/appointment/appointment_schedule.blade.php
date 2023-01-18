@extends('staff.sidebar')

@section('content1')

<ul class="nav mb-3">
    <li class="nav-item {{ 'appointment' ==  request()->path() ? 'border-bottom' : '' }}">
        <a class="nav-link text-light fs-5" href="/appointment" id="appointment">Appointments</a>
        {{--
        <hr id="hr1" class="active mx-3"> --}}
    </li>
    <li class="nav-item {{ 'showSchedule' || 'appointment/check' ==  request()->path() ? 'border-bottom' : '' }}">
        <a class="nav-link text-light fs-5" href="{{ route('show.setSchedule') }}" id="appointmenttime">Appointment
            Schedule</a>
        {{--
        <hr id="hr2" class="unactive mx-3"> --}}
    </li>
</ul>

<section class="pt-3">
    <div class="container">
        @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        {{-- @if (count($appointmentcount) > 0)
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            Appoinment has not been set yet
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif --}}
        @if (Session::has('errMessage'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{ Session::get('errMessage') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @foreach ($errors->all() as $error)
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endforeach

        <form action="{{ route('appointment.check') }}" method="post">
            @csrf
            <div class="card mb-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        Choose date
                        <br>
                        <a href="{{ route('appointment.create') }}" class="btn btn-success">Set new appointment</a>
                    </div>
                </div>
                <div class="card-body">
                    <input type="date" class="form-control" name="date">
                    <br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary text-light"> <i
                                class="bi bi-search text-center mx-1"></i>
                            Check</button>
                    </div>
                </div>
            </div>
        </form>
        @if(Route::is('appointment.check'))

        <form action="{{ route('appointment.update', $date) }}" method="POST">
            @method('PUT')
            @csrf
            <section class="p-5 text-dark fs-5 shadow-lg bg-light border border-dark rounded-4 border-opacity-10">
                <input type="hidden" name="appointmentId" value="{{ $app }} ">
                <p>Schedule that has been set for <b>{{\Carbon\Carbon::createFromFormat('Y-m-d',$date)->format('M d,
                        Y')}}</b></p>
                <label for="exampleFormControlInput1" class="form-label">Select Session:</label>
                <div class="row">
                    @foreach ($sessions as $session)
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $session->id }}" name="session[]"
                                id="flexCheckDefault" @foreach ($appointments as $appointment) {{
                                $appointment->session->id
                            == $session->id ? 'checked' : ''
                            }}
                            @endforeach>
                            <label class="form-check-label" for="flexCheckDefault">
                                <span class="fw-semibold">Session {{ $session->id }} </span>
                                <p class="lead fs-6"> Time:
                                    {{\Carbon\Carbon::createFromFormat('H:i:s',$session->starttime)->format('g:i
                                    A')}} -
                                    {{\Carbon\Carbon::createFromFormat('H:i:s',$session->endtime)->format('g:i
                                    A')}}</p>
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-primary px-4">Submit</button>
                </div>
            </section>
        </form>
        @else

        @endif
    </div>
</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>

<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>

<script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 'Open' : 'Close'; 
          var cabin_id = $(this).data('id'); 
           
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/changeStatus',
              data: {'status': status, 'id': cabin_id},
              success: function(data){
                console.log(data.success)
              }
          });  
          location.reload(true);
      })
    })
   
</script>

@endsection