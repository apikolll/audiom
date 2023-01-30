@extends('doctor.sidebar-doctor')

@section('content1')

<div class="text-center text-light">
    <h3 class="display-3 fw-bold">Edit Profile</h3>
</div>
<a href="{{ URL::previous() }}" class="btn btn-primary mb-3"><i class="bi bi-chevron-left"></i> Back</a>

<section class="p-5 text-dark fs-5 shadow-lg bg-light border border-dark rounded-4 border-opacity-10 fs-6">
    <form action="{{ route('doctors.update', $doctor->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="mb-2">Name:</label>
                    <input class="form-control bg-light" type="text" name="name" placeholder="Name" value="{{ $doctor->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="mb-2">Contact No:</label>
                    <input class="form-control bg-light" type="text" name="contact" placeholder="Contact No" value="{{ $doctor->contact }}">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="mb-2">Race:</label>
                    <select class="form-select bg-transparent" aria-label="Default select example" name="race">
                        <option selected>{{ $doctor->race }}</option>
                        <option value="India">India</option>
                        <option value="Malay">Malay</option>
                        <option value="Chinese">Chinese</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="mb-2">Select Gender:</label> 
                    <div class="d-flex gap-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Male" name="gender" id="flexRadioDefault1" {{ $doctor->gender == 'Male' ? 'checked' : ''}}>
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Female" name="gender" id="flexRadioDefault2" {{ $doctor->gender == 'Female' ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Female
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="mb-2">Email:</label>
                    <input class="form-control bg-light" type="text" name="email" placeholder="Email" value="{{ auth()->user()->email }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="mb-2">Password:</label>
                    <input class="form-control bg-light" type="password" name="password" placeholder="Password" value="*******" readonly>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="mb-2">Picture:</label>
                    <input class="form-control bg-light" type="file" name="image">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="mb-2">Address:</label>
                    <input class="form-control bg-light" type="text" name="address" placeholder="Address" value="{{ $doctor->address }}">
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-success mt-3 px-4 shadow" type="submit">Update</button>
            <a href="{{ route('doctor.index') }}" class="btn btn-secondary mt-3 px-4 shadow">Discard</a>
        </div>
    </form>
</section>
@endsection