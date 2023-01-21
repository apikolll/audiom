@extends('staff.sidebar')

@section('content1')



<section class="pt-5">
    <div class="container">
        <ul class="nav mb-3">
            <li class="nav-item {{ 'app' ==  request()->path() ? 'border-bottom' : '' }}">
                <a class="nav-link text-light fs-5" href="{{ route('app.index') }}" >Appointments</a>
                {{--
                <hr id="hr1" class="active mx-3"> --}}
            </li>
            <li class="nav-item {{ 'schedule' || 'check' ==  request()->path() ? 'border-bottom' : '' }}">
                <a class="nav-link text-light fs-5" href="{{ route('schedule.index') }}" >Appointment Schedule</a>
                {{--
                <hr id="hr2" class="unactive mx-3"> --}}
            </li> 
        </ul>
        
        @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (Session::has('errMessage'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{ Session::get('errMessage') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endforeach

        <form action="{{ route('schedule.check') }}" method="post">
            @csrf
            <div class="card mb-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        Choose date
                        <br>
                        <a href="{{ route('schedule.create') }}" class="btn btn-success">Set new appointment</a>
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


        @if(Route::is('schedule.check'))
        @foreach ($sessions as $session)
        <form action="{{ route('schedule.update', $session->id )}}" method="POST">
            @method('PUT')
            @csrf
           
            <section class="p-5 text-dark fs-5 shadow-lg bg-light border border-dark rounded-4 border-opacity-10">
                <p class="d-block">Schedule that has been set for
                    <b>{{\Carbon\Carbon::createFromFormat('Y-m-d',$session->date)->format('M d,
                        Y')}}</b>
                {{-- <input type="text" class="date" value="{{ $session->date }}"> --}}
                <span class="fs-6 d-block text-secondary">- created at {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $session->created_at)->format('M d,
                    Y g:i
                    A')}}</span>
                    </p>
                <label for="exampleFormControlInput1" class="form-label">Select Session:</label>
                {{-- <p class="fs-6">Check the box to open the session</p> --}}
                <div class="row">
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value=1 name="session[]"
                                id="flexCheckDefault" @foreach ($session->sessions as $ses)
                                {{ $ses->id == 1 ? 'checked' : '' }}
                                @endforeach>
                            <label class="form-check-label" for="flexCheckDefault">
                                <span class="fw-semibold">Session 1</span>
                                <p class="lead fs-6"> Time:
                                    {{\Carbon\Carbon::createFromFormat('H:i', '09:00')->format('g:i
                                    A')}} -
                                    {{\Carbon\Carbon::createFromFormat('H:i', '10:00')->format('g:i
                                    A')}}</p>
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value=2 name="session[]"
                                id="flexCheckDefault" @foreach ($session->sessions as $ses)
                                {{ $ses->id == 2 ? 'checked' : '' }}
                                @endforeach>
                            <label class="form-check-label" for="flexCheckDefault">
                                <span class="fw-semibold">Session 2</span>
                                <p class="lead fs-6"> Time:
                                    {{\Carbon\Carbon::createFromFormat('H:i', '10:00')->format('g:i
                                    A')}} -
                                    {{\Carbon\Carbon::createFromFormat('H:i', '11:00')->format('g:i
                                    A')}}</p>
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value=3 name="session[]"
                                id="flexCheckDefault" @foreach ($session->sessions as $ses)
                                {{ $ses->id == 3 ? 'checked' : '' }}
                                @endforeach>
                            <label class="form-check-label" for="flexCheckDefault">
                                <span class="fw-semibold">Session 3</span>
                                <p class="lead fs-6"> Time:
                                    {{\Carbon\Carbon::createFromFormat('H:i', '11:00')->format('g:i
                                    A')}} -
                                    {{\Carbon\Carbon::createFromFormat('H:i', '12:00')->format('g:i
                                    A')}}</p>
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value=4 name="session[]"
                                id="flexCheckDefault" @foreach ($session->sessions as $ses)
                                {{ $ses->id == 4 ? 'checked' : '' }}
                                @endforeach>
                            <label class="form-check-label" for="flexCheckDefault">
                                <span class="fw-semibold">Session 4</span>
                                <p class="lead fs-6"> Time:
                                    {{\Carbon\Carbon::createFromFormat('H:i','14:30')->format('g:i
                                    A')}} -
                                    {{\Carbon\Carbon::createFromFormat('H:i','15:30')->format('g:i
                                    A')}}</p>
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value=5 name="session[]"
                                id="flexCheckDefault" @foreach ($session->sessions as $ses)
                                {{ $ses->id == 5 ? 'checked' : '' }}
                                @endforeach>
                            <label class="form-check-label" for="flexCheckDefault">
                                <span class="fw-semibold">Session 5</span>
                                <p class="lead fs-6"> Time:
                                    {{\Carbon\Carbon::createFromFormat('H:i', '15:30')->format('g:i
                                    A')}} -
                                    {{\Carbon\Carbon::createFromFormat('H:i', '16:30')->format('g:i
                                    A')}}</p>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-primary px-4" type="submit">Update</button>
                </div>
            </section>
            
        </form>
        @endforeach
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