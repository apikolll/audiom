<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
        <div class="container">
            <a href="#" class="navbar-brand"><i class="bi bi-mask p-2"></i>AD | S</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"><span
                    class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="#learn" class="nav-link active">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="#questions" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#instructor" class="nav-link">Template</a>
                    </li>
                </ul>
            </div>

            <div class="btn-group">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login">Login</button>
            </div>
            <button class="btn text-white" data-bs-toggle="modal" data-bs-target="#register">Signup</button>

            {{-- <button id="btn-increment" type="button" class="btn btn-dark position-relative">
                Notification
                <span id="number-add" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    0
                    <span class="visually-hidden">unread messages</span>
                </span>
            </button> --}}
        </div>
    </nav>

    {{-- content --}}

    <section class="bg-dark text-light p-5 p-lg-0 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <img class="img-fluid d-none d-sm-block p-5" src="img/web.png" alt="Afiq" id="afiq">
                <div>
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if (Session::has('fail'))
                        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                    <h1>Hello, Peeps!</h1>
                    <p class="lead">It's Afiq. I am a <span class="text-warning">full-stack web developer.</span></p>
                    <p>I'm providing service that can help people out there to learn programming or need a service to
                        make a
                        website. There's a list of <span class="text-success fw-bold">services</span> that i provide.
                        Check em out !</p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#need-service">I need service
                        !</button>
                </div>
            </div>
        </div>
    </section>


    {{-- card --}}

    <section class="p-5">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-code"></i>
                            </div>
                            <h3 class="card-title">
                                Programming Logic
                            </h3>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias,
                                inventore voluptate animi numquam alias porro!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-controller"></i>
                            </div>
                            <h3 class="card-title">
                                Game Development
                            </h3>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias,
                                inventore voluptate animi numquam alias porro!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-suit-spade"></i>
                            </div>
                            <h3 class="card-title">
                                Website Development
                            </h3>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias,
                                inventore voluptate animi numquam alias porro!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="p-5 bg-primary" id="instructor">
        <div class="container">
            <h2 class="text-center text-white">
                Afiq Danial
            </h2>
            <p class="lead text-center text-white mb-3">5+ years experience working for Apple</p>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 mx-auto p-4">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <img src="img/afiq.jpg" class="rounded-circle mb-3" alt="">
                            <h3 class="card-title mb-3">Pikol</h3>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti
                                aliquam quisquam eveniet iusto, architecto inventore?
                            </p>
                            <a href="https://twitter.com/apikollll"><i class="bi bi-twitter text-dark mx-1"></i></a>
                            <a href="https://www.instagram.com/apikoll/"><i
                                    class="bi bi-instagram text-dark mx-1"></i></a>
                            <a href="https://www.linkedin.com/in/afiqnoorazam/"><i
                                    class="bi bi-linkedin text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-youtube text-dark mx-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- footer --}}

    <footer class="p-5 bg-dark text-white text-center position-relative align-items-center">
        <div class="container">
            <p class="lead">Copyright &copy; 2022 Afiq Website</p>
            <a href="#" class="position-absolute bottom-0 end-0 p-5">
                <i class="bi bi-arrow-up-circle h1"></i>
            </a>
        </div>
    </footer>



    {{-- Service --}}
    <div class="modal fade p-lg-5 position-absolute" id="need-service" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="need-serviceLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Fill out this form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="lead">and we'll get to you !</p>
                    <form>
                        <div class="form-floating mb-3">
                            <input type="firstname" class="form-control" id="floatingInput" placeholder="Name">
                            <label for="floatingInput" id="floatingInput">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingEmail" placeholder="Email">
                            <label for="floatingEmail">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="phone" class="form-control" id="floatingPhone" placeholder="Phone">
                            <label for="floatingPhone">Phone</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="btn-submit" type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>


    {{-- Login --}}


    {{-- <div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="loginLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginLabel">Login Now !</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('login.custom') }}" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="email" class="form-control" id="floatingUsername"
                                placeholder="Email">
                            <label for="floatingUsername" id="floatingUsername">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div> --}}

    {{-- Register --}}

    <div class="modal fade" id="register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="registerLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerLabel">Register Now !</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('register.custom') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="username" class="form-control" id="floatingUsername"
                                placeholder="Enter Name" value="{{ old('username') }}">

                            <label for="floatingUsername" id="floatingUsername">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            {{-- <input type="password" name="password" class="form-control" id="floatingPassword"
                                placeholder="Enter Password" value="{{ old('password') }}"> --}}
                            <input type="password" class="form-control" name="password"
                                value="{{ old('password') }}" placeholder="Password" required="required">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingemail"
                                placeholder="Enter Email" value="{{ old('email') }}">

                            <label for="floatingemail">Email</label>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>
</body>

</html>
