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

    <link rel="stylesheet" href="/css/app.css">
</head>

<body style="font-family: 'Yeseva One', cursived;">

    <div class="h2 p-3">
        <a href="{{ URL::previous() }}" class="text-dark"><i class="bi bi-arrow-left-circle"></i></a>
    </div>

    <div class="position-absolute start-50 translate-middle align-items-center">
        <a href="homepage"><img src="img/logo.png" alt="logoIIUM" style="width:6rem; height:6rem;"></a>
    </div>

    <div class="container text-center d-none d-lg-block" style="margin-top: 5rem;">
        <h1>IIUM Hearing & Speech Clinic Management System</h1>
    </div>


    <section class="position-absolute top-50 start-50 translate-middle middle-content mt-1">
        <div class="container">
            @if (Session::has('error'))
                <div class="alert alert-danger text-center">{{ Session::get('error')}}</div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="card-title h1 text-center mb-4">
                        Log in
                    </div>

                    <form action="{{ route('login.custom') }}" method="post" class="needs-validation" novalidate>
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="username" class="form-control" id="floatingInput"
                                placeholder="Username" value="{{ old('username') }}" required>
                            <label for="floatingInput">Username</label>
                            @error('username')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" id="floatingPassword"
                                placeholder="Password" required>
                            <label for="floatingPassword">Password</label>
                            @error('password')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="text-center mb-2">
                            <button class="btn btn-dark p-2 px-4 s-2 w-100 fs-4 bg-dark text-light">Log in</button>
                        </div>

                        <div class="text-center text-secondary mt-3">No account?<a href="register"
                                class="text-decoration-none mx-2">Create one</a></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
