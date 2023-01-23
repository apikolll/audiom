@extends('staff.sidebar')

@section('content1')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

<div class="text-center text-light mb-3">
    <h3 class="display-3 fw-bold">Create Appointment</h3>
</div>

@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show text-center fs-6" role="alert">
    {{ Session::get('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<form action="{{ route('app.check') }}" method="post">
    @csrf
    <section class="p-5 mb-3 text-dark fs-5 shadow-lg bg-light border border-dark rounded-4 border-opacity-10">
        <p class="lead">Pick a Date:</p>
        <input type="date" class="form-control" name="date">
        <div class="text-center mt-5">
            <button type="submit" class="btn btn-outline-primary">Proceed
            </button>
        </div>
    </section>
</form>

@if (Route::is('app.check'))

<section class="p-5 text-dark fs-5 shadow-lg bg-light border border-dark rounded-4 border-opacity-10">
    <form action="{{ route('app.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="text-center">
            <input class="btn btn-block" name="date"
                value="{{\Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('M d, Y')}}">
        </div>
        @foreach ($sessions as $session)
        {{-- <span class="mb-4">Date : {{\Carbon\Carbon::createFromFormat('Y-m-d', $session->date)->format('M d,
            Y')}}</span> --}}
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Patient's Name:</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Patient's Name" required>
        </div>
        <div class="mb-3">
            <p>Available Session:</p>
            <div class="card rounded-3 p-4">
                <div class="card-body">
                    <div class="row">
                        @foreach ($session->sessions as $session)
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="{{ $session->id }}"
                                    id="flexRadioDefault1" name="session" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Session {{ $session->id }}
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
                </div>
            </div>
        </div>
        @endforeach
        <div class="mb-3">
            <p>Choose Cabin:</p>
            <div class="card rounded-3 p-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cabin" value=1
                                    id="flexRadioDefault1" >
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Cabin 1
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cabin" value=2
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Cabin 2
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cabin" value=3
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Cabin 3
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
        </div>
        <div class="text-center mt-5">
            <button type="submit" class="btn btn-outline-primary px-4">Book</button>
        </div>

    </form>
</section>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

</script>

@endsection