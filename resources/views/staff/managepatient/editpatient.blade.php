@extends('staff.sidebar')

@section('content1')

<div class="text-center text-light">
    <h3 class="display-3 fw-bold">Edit Patient Profile</h3>
</div>
<a href="{{ URL::previous() }}" class="btn btn-primary mb-3"><i class="bi bi-chevron-left"></i> Back</a>

<section class="p-5 text-dark fs-5 shadow-lg bg-light border border-dark rounded-4 border-opacity-10">
    <form action="{{ route('patient.update', $patient->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-12 text-center">
                <div class="form-group">
                    @if ($patient->image)
                    <img src="{{ Storage::url($patient->image) }}" alt="dp" class="rounded-circle"
                        style="width: 100px;height:100px">
                    @else
                    <i class="bi bi-person-circle h1"></i>
                    @endif

                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="mb-2">Name:</label>
                    <input class="form-control bg-light" type="text" name="name" value="{{ $patient->name }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="mb-2">Age:</label>
                    <input class="form-control bg-light" type="text" name="age" value="{{ $patient->age }}" required>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="mb-2">Date of Birth:</label>
                    <input class="form-control bg-light" type="date" name="dob" value="{{ $patient->dob }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <label class="mb-2">Select Gender:</label>
                <div class="d-flex gap-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Male" name="gender" id="flexRadioDefault1" {{ $patient->gender == "Male" ? 'checked' : "" }}>
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Female" name="gender" id="flexRadioDefault2" {{ $patient->gender == "Female" ? 'checked' : "" }}>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Female
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="mb-2">Race:</label>
                    <select class="form-select bg-transparent" aria-label="Default select example" name="race">
                        <option selected>Choose Race</option>
                        <option value="India" {{ $patient->race == "India" ? 'selected' : "" }}>India</option>
                        <option value="Malay" {{ $patient->race == "Malay" ? 'selected' : "" }}>Malay</option>
                        <option value="Chinese" {{ $patient->race == "Chinese" ? 'selected' : "" }}>Chinese</option>
                        <option value="Others" {{ $patient->race == "Others" ? 'selected' : "" }}>Others</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="mb-2">Contact No:</label>
                    <input class="form-control bg-light" type="text" name="contact" value="{{ $patient->contact }}"
                        required>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="mb-2">Profile Picture:</label>
                    <input class="form-control bg-light" type="file" name="image">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="mb-2">Address:</label>
                    <input class="form-control bg-light" type="text" name="address" value="{{ $patient->address }}"
                        required>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-warning mt-3 px-4 shadow" type="submit">Update</button>
            <a href="{{ route('patient.index') }}" class="btn btn-secondary mt-3 px-4 shadow">Discard</a>
        </div>
    </form>
</section>
@endsection