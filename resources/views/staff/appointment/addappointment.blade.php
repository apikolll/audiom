@extends('staff.sidebar')

@section('content1')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
    img.unactive {
        display: none;
    }

    .unactive {
        display: none;
    }
</style>

<div class="text-center text-light">
    <h3 class="display-3 fw-bold">Create new appointment</h3>
</div>
<a href="{{ route('appointment.index') }}" class="btn btn-primary mb-3"><i class="bi bi-chevron-left"></i> Back</a>

@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (Session::has('message'))
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    {{ Session::get('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
    {{ Session::get('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@error('date')
<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@enderror

@error('session')
<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
    Please pick session
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@enderror

<section class="p-5 text-dark fs-5 shadow-lg bg-light border border-dark rounded-4 border-opacity-10">


    <div class="alert alert-danger alert-dismissible fade show text-center unactive" id="err" role="alert">
        <span id="text1"></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <form action="{{ route('appointment.store') }}" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Select Date:</label>
            <input type="date" class="form-control" name="date" id="exampleFormControlInput1">
        </div>

        <label for="exampleFormControlInput1" class="form-label">Select Session:</label>
        <div class="row">
            @foreach ($sessions as $session)
            <div class="col-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $session->id }}" name="session[]" id="flexCheckDefault">
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
        {{-- <div class="card mb-3">
            <div class="card-header">
                <h3>Choose A Date</h3>
            </div>
            <div class="card-body">
                <input type="date" class="form-control datetimepicker-input" id="datepicker"
                    data-toggle="datetimepicker" data-target="#datepicker" name="date" value="{{ old('date') }}">
            </div>
        </div> --}}

        {{-- @foreach ($cabin as $cabins) --}}
        {{-- <div class="row mb-3">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Cabin1" id="flexCheckDefault"
                                    name="Cabin1">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <span class="badge bg-primary">Cabin 1</span>
                                </label>
                            </div>
                            <div class="form-check form-switch">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="" value=""
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <span class="fw-semibold">Session 1 </span>
                                        <p class="lead fs-6"> Time: 9.00am - 10.00am</p>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="" value=""
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <span class="fw-semibold">Session 2 </span>
                                        <p class="lead fs-6"> Time: 10.00am - 11.00am</p>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="" value=""
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <span class="fw-semibold">Session 3 </span>
                                        <p class="lead fs-6"> Time: 11.00am - 12.00pm</p>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="" value=""
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <span class="fw-semibold">Session 4 </span>
                                        <p class="lead fs-6"> Time: 14.30pm - 15.30pm</p>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="" value=""
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <span class="fw-semibold">Session 5 </span>
                                        <p class="lead fs-6"> Time: 15.3pm - 16.30pm</p>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div> --}}
        {{-- @endforeach --}}

        {{-- @foreach ($cabin as $cabins)
        <div class="row mb-3">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title fw-semibold">Cabin {{ $cabins->id }}</h5>
                            <div class="form-check form-switch">
                                <input data-id="{{$cabins->id}}" class="form-check-input toggle-class" name="cabin[]"
                                    type="checkbox" value="{{ $cabins->id }}" {{ $cabins->status ==
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
                                    <input class="form-check-input" type="checkbox" name="session[{{ $cabins->id }}][]"
                                        value="{{ $sessions->id }}" id="flexCheckDefault">
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
        @endforeach --}}
        <div class="text-center mt-3">
            <button class="btn btn-primary px-4">Submit</button>
        </div>
    </form>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>

<script type="text/javascript">
    document.getElementById("datepicker").addEventListener("change", getHari);

    // document.getElementById("flexSwitchCheckDefault[]").addEventListener("change", toggleSwitch);

function getHari(){

    var dt = new Date(document.getElementById('datepicker').value);
    var gd = dt.getDay();

    var hari = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
    
    for(let i = 0;i<hari.length;i++){
        var h = hari[gd];
    }
    
    document.getElementById('demo').innerHTML = h;

    if(h == "Monday" || h == "Tuesday" || h == "Wednesday"){
        document.getElementById("mw").classList.remove('unactive');
        document.getElementById("tf").classList.add('unactive');
    }else if(h == "Thursday" || h == "Friday"){
        document.getElementById("tf").classList.remove('unactive');
        document.getElementById("mw").classList.add('unactive');
    }else{
        document.getElementById("tf").classList.add('unactive');
        document.getElementById("mw").classList.add('unactive');
        document.getElementById("text1").innerHTML = "Not Available"
        document.getElementById("err").classList.remove('unactive');
    }
}
</script>

<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>

<script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 'Open' : 'Close'; 
          var cabin_id = $(this).data('id'); s
           
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