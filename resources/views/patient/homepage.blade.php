<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Audiom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>


    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            {{-- <div class="d-flex">
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" alt="logoIIUM">
                <span class="fs-3 fw-semibold">IIUM</span>
                <span class="d-none d-lg-inline fs-5 fw-light">Hearing & Speech Clinic</span>
            </a>
        </div> --}}
            <button class="navbar-toggler text-center down mb-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <i class="fas fa-bars"></i>

            {{-- Collapsible --}}
            <div class="collapse navbar-collapse" id="navmenu">
                {{-- navbar brand --}}
                <div class="d-sm-block d-lg-flex align-items-center">
                    <a class="navbar-brand" href="#">
                        <img src="img/logo.png" alt="logoIIUM">
                        {{-- <span class="fs-3 fw-semibold ">IIUM</span>
                        <span class="d-none d-lg-inline fs-5 fw-light">Hearing & Speech Clinic</span> --}}
                    </a>
                    {{-- middle links --}}
                    <div class="">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a href="#" class="nav-link fs-5">Book appointment</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link fs-5">Report</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link fs-5">Appointment</a>
                            </li>
                        </ul>
                    </div>
                    {{-- middle links --}}
                </div>
            </div>

            {{-- right elements --}}
            <div class="d-flex align-items-center mx-2">
                <div class="dropdown">
                    <a href="#" class="text-reset me-3 dropdown-toggle">
                        <i class="bi bi-bell mx-2"></i>
                        <span
                            class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-danger fs-7">1</span>
                    </a>
                </div>
                <span class="fs-5 mx-2">{{ auth()->user()->username }}</span>
                {{-- avatar --}}
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle d-flex align-items-center" id="navbarDropDownMenuAvatar"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{-- <i class="bi bi-three-dots-vertical h2 text-dark"></i> --}}
                        <i class="bi bi-caret-down-fill text-dark"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropDownMenuAvatar">
                        <li>
                            <a href="{{ route('patient.profile')}}" class="dropdown-item">My profile</a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item">Settings</a>
                        </li>
                        <li>
                            <a href=" {{ route('logout.user') }}" type="button" class="dropdown-item">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- right elements --}}

        </div>
    </nav>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
