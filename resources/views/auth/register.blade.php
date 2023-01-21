<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Audiom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/hp.css') }}">
</head>

<body>

    <div class="h2 p-3">
        <a href="{{ URL::previous() }}" class="text-dark"><i class="bi bi-arrow-left-circle"></i></a>
    </div>

    <div class="position-absolute start-50 translate-middle">
        <a href="{{ route('homepage.page') }}"><img src="img/logo.png" alt="logoIIUM"
                style="width:6rem; height:6rem;"></a>
    </div>

    <section class="position-absolute top-50 start-50 translate-middle mt-5">
        <div class="container">
            <div class="card ">
                <div class="card-body">
                    <div class="card-title h3 text-center my-3 d-none d-lg-block">
                        Patient Registration
                    </div>

                    <form action="{{ route('register.custom') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email address</label>
                            <input type="email" name="email" class="form-control py-2" id="email" placeholder="Email"
                                value="{{ old('email') }}" required>
                            @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Name</label>
                            <input type="text" name="name" class="form-control py-2" id="name" placeholder="Name"
                                value="{{ old('name') }}" required>
                            @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <input type="password" name="password" class="form-control py-2" id="password"
                                placeholder="Password" required>
                            @error('password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- <div class="h4 d-flex justify-content-center">
                            You are a :
                        </div>
                        <div class="d-flex justify-content-evenly">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="patient" name="roleuser"
                                    value="patient">Patient
                                <label class="form-check-label" for="patient"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="staff" name="roleuser"
                                    value="staff">Staff
                                <label class="form-check-label" for="staff"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="doctor" name="roleuser"
                                    value="doctor">Doctor
                                <label class="form-check-label" for="doctor"></label>
                            </div>
                        </div>
                        @error('roleuser')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror --}}

                        <div class="text-center my-3">
                            <button class="btn btn-outline-success fs-5 p-2 px-4 s-2 w-100" type="submit">Create
                                account</button>
                        </div>
                        <div class="text-center text-secondary mt-3">Already have an account?<a href="login"
                                class="text-decoration-none mx-2">Log
                                in</a></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>