@extends('patient.sidebar-patient')

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

<form action="{{ route('app-patient.check') }}" enctype="multipart/form-data" method="POST">
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

@if (Route::is('app-patient.check'))

<section class="p-5 text-dark fs-5 shadow-lg bg-light border border-dark rounded-4 border-opacity-10 fs-6">
    <form action={{ route('app-patient.store') }} enctype="multipart/form-data" method="POST">
        @csrf
        <div class="text-center">
            <input class="btn btn-block" name="date" value="{{$date}}" readonly>
        </div>
        {{-- <div class="text-center">
            <input class="btn btn-block" name="date"
                value="{{\Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('M d, Y')}}">
        </div> --}}
        @foreach ($sessions as $session)
        <div class="row mb-3 mt-3">
            <div class="col-6">
                <label for="name" class="form-label">Doctor's Name:</label>
                <select class="form-select" aria-label="Default select example" name="doctor" id="name" required>
                    <option value="0" selected>Doctor</option>
                    @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach 
                </select>
            </div>
            <div class="col-6">
                <label for="patient" class="form-label">Your ID:</label>
                <input type="text" name="patient" class="form-control" id="patient" placeholder=""
                    value="{{ auth()->user()->patient->id }}" readonly >
            </div>
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
            @error('cabin')
                {{ $message }}
            @enderror
            <div class="card rounded-3 p-4">
                <div class="card-body">
                    <div class="row">
                        @error('cabin')
                            {{ $message }}
                        @enderror
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cabin" value=1
                                    id="flexRadioDefault1" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Cabin 1
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cabin" value=2
                                    id="flexRadioDefault1" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Cabin 2
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cabin" value=3
                                    id="flexRadioDefault1" required>
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
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" required></textarea>
        </div>
        <div class="text-center mt-5">
            <button type="submit" class="btn btn-outline-primary px-4">Book</button>
        </div>

    </form>
</section>
@endif

@endsection