@extends('patient.sidebar-patient')

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

<section class="p-5 text-dark fs-5 shadow-lg bg-light border border-dark rounded-4 border-opacity-10 fs-6">
    <form action="{{ route('patients.update', $patient->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-12 text-center">
                <div class="form-group">
                    @if (auth()->user()->patient->image)
                    <img src="{{ Storage::url($patient->image) }}" alt="dp" class="rounded-circle"
                    style="width: 100px;height:100px">
                    @else
                    <i class="bi bi-person-circle display-6"></i>
                    @endif
                    
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input class="form-control" type="text" name="name" value="{{ $patient->name }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Age</label>
                    <input class="form-control" type="text" name="age" value="{{ $patient->age }}" required>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Date of Birth</label>
                    <input class="form-control" type="date" name="dob" value="{{ $patient->dob }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Gender</label>
                    <input class="form-control" type="text" name="gender" value="{{ $patient->gender }}" required>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Race</label>
                    <input class="form-control" type="text" name="race" value="{{ $patient->race }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Contact No</label>
                    <input class="form-control" type="text" name="contact" value="{{ $patient->contact }}" required>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Upload image</label>
                    <input class="form-control" type="file" name="image" id="image">
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