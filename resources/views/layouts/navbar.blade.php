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

    <link rel="stylesheet" href="css/style.css">
    <style>
        .blur{
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body>
    

    {{-- Navbar --}}
    @yield('navbar')

    <nav class="navbar navbar-expand-lg fixed-top blur">
        <div class="container">
            <div class="d-flex">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="img/logo.png" alt="logoIIUM" class="top">
                    <span class="fs-3 fw-semibold mx-2">IIUM</span>
                    <span class="d-none d-lg-inline fs-5 fw-light">Hearing & Speech Clinic</span>
                </a>
            </div>

            <button class="navbar-toggler text-center down" type="button" data-bs-toggle="collapse"
                data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Nav Items --}}
            <div class="collapse navbar-collapse text-center" id="navmenu">
                <ul class="navbar-nav ms-auto fs-5">
                    <li class="nav-item">
                        <a href="/services" class="nav-link text-dark">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="/about" class="nav-link text-dark">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="/faq" class="nav-link text-dark">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a href="/location" class="nav-link text-dark">Location</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="login" class="btn btn-outline-warning" type="button">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    @yield('content1')
    @yield('content2')
    @yield('footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="\js\index.js"></script>
</body>

</html>