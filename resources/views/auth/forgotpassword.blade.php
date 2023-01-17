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
            <h2 class="text-light text-center mt-2">Forgot Password</h2>
            <hr class="mb-3">
            {{-- <hr style="width: 20rem;margin:auto;" class="text-dark fw-"> --}}
            <div>
                <form action="{{ route('forget.password.post') }}" method="POST">
                    @csrf
                    <div class="email">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <p class="lead text-light">Enter your email address and we will send you a link to reset your
                            password</p>
                        <input type="email" class="form-control py-2 mb-3 text-cente mt-4"
                            placeholder="Enter email address" name="email">

                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @endif

                            <div class="text-center">
                                <button class="btn btn-primary">Send Reset Password link</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </body>

    </html>
