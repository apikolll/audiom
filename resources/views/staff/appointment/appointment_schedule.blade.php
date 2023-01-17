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
                        @if (isset($date))
                        {{ $date }}
                        @endif
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

        <form action="{{ route('appointment.update', $date) }}" method="post">
            @csrf
            @method('PUT')

            @foreach ($cabin as $cabins)
            @foreach ($appointments as $appointment)
            <div class="row mb-3">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title fw-semibold">Cabin {{ $cabins->id }}</h5>
                                <div class="form-check form-switch">
                                    <input data-id="{{$cabins->id}}" class="form-check-input toggle-class"
                                        name="cabin[]" type="checkbox" value="{{ $cabins->id }}" {{ $cabins->status ==
                                    "Open" ?
                                    "checked" :
                                    "" }}>
                                </div>
                            </div>

                            @if ($cabins->status == 'Close')
                            <p class="card-text"><span class="badge bg-danger align-middle">Cabin {{ $cabins->id }}
                                    Close</span>
                            </p>
                            @else
                            <p class="card-text"><span class="badge bg-success align-middle">Cabin {{ $cabins->id }}
                                    Open</span>
                            </p>
                            @endif

                            @if ($cabins->status == 'Open')
                            <div class="row">
                                @foreach ($session as $sessions)
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="session[{{ $cabins->id }}][]" value="{{ $sessions->id }}"
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            <span class="fw-semibold">Session {{ $sessions->id }} </span>
                                            <p class="lead fs-6"> Time:
                                                {{\Carbon\Carbon::createFromFormat('H:i:s',$sessions->starttime)->format('g:i
                                                A')}} -
                                                {{\Carbon\Carbon::createFromFormat('H:i:s',$sessions->endtime)->format('g:i
                                                A')}}</p>
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            @else

                            @endif

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endforeach
            <div class="text-center">
                <button class="btn btn-primary px-4">Update</button>
            </div>
        </form>
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