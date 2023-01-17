@extends('patient.sidebar-patient')

@section('content1')
@section('content1')

<div class="text-center text-light">
    <h3 class="display-3 fw-bold">Edit Profile</h3>
</div>
<a href="{{ URL::previous() }}" class="btn btn-primary mb-3"><i class="bi bi-chevron-left"></i> Back</a>

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<section class="p-5 text-light fs-5 shadow-lg bg-dark border border-dark  rounded-4 bg-opacity-10 border-opacity-10">
    <form action="{{ route('patients.update', $patient->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-12 text-center">
                <div class="form-group">
                    <img src="{{ Storage::url($patient->image) }}" alt="dp" class="rounded-circle"
                        style="width: 100px;height:100px">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="{{ $patient->name }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Age</label>
                    <input class="form-control" type="text" name="age" value="{{ $patient->age }}" required>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input class="form-control" type="date" name="dob" value="{{ $patient->dob }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Gender</label>
                    <input class="form-control" type="text" name="gender" value="{{ $patient->gender }}" required>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Race</label>
                    <input class="form-control" type="text" name="race" value="{{ $patient->race }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Contact No</label>
                    <input class="form-control" type="text" name="contact" value="{{ $patient->contact }}" required>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Upload image</label>
                    <input class="form-control shadow" type="file" name="image">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Address</label>
                    <input class="form-control" type="text" name="address" value="{{ $patient->address }}" required>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-warning mt-3 px-4 shadow">Update</button>
        </div>
    </form>
</section>
@endsection