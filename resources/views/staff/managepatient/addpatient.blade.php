@extends('staff.sidebar')

@section('content1')

<style>
    img.unactive {
        display: none;
    }

    label {
        font-weight: 600;
        font-size: 16px;

    }
</style>

<div class="text-center text-light">
    <h3 class="display-3 fw-bold">Add Patient</h3>
</div>
<a href="{{ URL::previous() }}" class="btn btn-primary mb-3"><i class="bi bi-chevron-left"></i> Back</a>

<section class="p-5 text-dark fs-5 shadow-lg bg-light border border-dark rounded-4 border-opacity-10">
    @error('password')
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror

    <form action="{{ route('patient.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="mb-2">Name:</label>
                    <input class="form-control bg-light" type="text" name="name" placeholder="Name" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="mb-2">Age:</label>
                    <input class="form-control bg-light" type="text" name="age" placeholder="Age" required>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="mb-2">Date of Birth:</label>
                    <input class="form-control bg-light" type="date" name="dob" placeholder="Date of Birth" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="mb-2">Contact No:</label>
                    <input class="form-control bg-light" type="text" name="contact" placeholder="Contact No" required>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="mb-2">Race:</label>
                    <select class="form-select bg-transparent" aria-label="Default select example" name="race">
                        <option selected>Choose Race</option>
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
                            <input class="form-check-input" type="radio" value="male" name="gender" id="flexRadioDefault1">
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="female" name="gender" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Female
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="mb-2">Email</label>
                    <input class="form-control bg-light" type="text" name="email" value="{{ old('email') }}"
                        placeholder="Email" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="mb-2">Password</label>
                    <div class="input-group mb-3">
                        <input class="form-control bg-light input1" type="password" name="password"
                            placeholder="Password" required>
                        <div class="input-group-text" style="cursor: pointer">
                            <img src="{{ asset('img/show.png') }}" style="width: 20px;" alt="show" id="show1">
                            <img src="{{ asset('img/hide.png') }}" style="width: 20px;" alt="show" id="hide1"
                                class="unactive">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="mb-2">Confirm Password</label>
                    <div class="input-group mb-3">
                        <input class="form-control bg-light input2" type="password" name="password_confirmation"
                            placeholder="Confirm Password" required>
                        <div class="input-group-text" style="cursor: pointer">
                            <img src="{{ asset('img/show.png') }}" style="width: 20px;" alt="show" id="show2">
                            <img src="{{ asset('img/hide.png') }}" style="width: 20px;" alt="show" id="hide2"
                                class="unactive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="mb-2">Picture</label>
                    <input class="form-control bg-light" type="file" name="image">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="mb-2">Address</label>
                    <input class="form-control bg-light" type="text" name="address" value="{{ old('address') }}"
                        required>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-success mt-3 px-4 shadow" type="submit">Save</button>
            <a href="{{ route('patient.index') }}" class="btn btn-secondary mt-3 px-4 shadow">Discard</a>
        </div>
    </form>
</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $('#show1').on('click', function(){
            $('.input1').attr("type","text")
            $('#hide1').removeClass("unactive")
            $('#show1').addClass("unactive")
        })

        $('#hide1').on('click', function(){
            $('.input1').attr("type","password")
            $('#show1').removeClass("unactive")
            $('#hide1').addClass("unactive")
        })

        $('#show2').on('click', function(){
            $('.input2').attr("type","text")
            $('#hide2').removeClass("unactive")
            $('#show2').addClass("unactive")
        })

        $('#hide2').on('click', function(){
            $('.input2').attr("type","password")
            $('#show2').removeClass("unactive")
            $('#hide2').addClass("unactive")
        })

    })

</script>

@endsection