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
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}
</head>

<body>

    <section class="p-5">
        <div class="container">
            <h2 class="text-light text-center mt-2">Reset Password</h2>
            <hr class="mb-3">
            {{-- <hr style="width: 20rem;margin:auto;" class="text-dark fw-"> --}}
            <div>
                <form action="{{ route('reset.password.post') }}" method="POST">
                    @csrf
                    <div class="email">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput"
                                placeholder="Enter email address" value="{{ old('email') }}" required>
                            <label for="floatingInput">Email</label>
                            @error('email')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="floatingPassword"
                                placeholder="Enter password" value="{{ old('password') }}" required>
                            <label for="floatingPassword">Password</label>
                            @error('password')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="floatingConfirmPassword"
                                placeholder="Confirm Password" value="{{ old('password-confirm') }}" required>
                            <label for="floatingConfirmPassword">Confirm Password</label>
                            @error('password-confirm')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary">Reset Password</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
        </div>
    </section>

</body>

</html>
