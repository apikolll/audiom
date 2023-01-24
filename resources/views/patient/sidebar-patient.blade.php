<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Audiom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/sb.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">

    <style>
        body {
            font-family: 'Poppins';
        }
        
    </style>
</head>

<body>

    <i class="h4 bi bi-layout-text-sidebar icon2 p-3" style="position: fixed;" id="open"></i>

    {{-- sidebar --}}
    <div class="sidebar rounded-end enter" style="background-color: #faf8f6">
        <div class="p-3 text-dark h2">
            <div class="d-flex align-items-center">
                <img src="{{ asset('img/logo.png') }}" alt="logoIIUM" class="top">
                <div class="d-col-flex mx-2">
                    <span class="fs-5 fw-bold">IIUM</span>
                    <span class="fs-6 d-block">Hearing & Speech Clinic</span>
                </div>
                <i class="h4 bi bi-layout-text-sidebar-reverse icon1 ms-auto" id="close"></i>
                {{-- <i class="h3 text-light bi bi-list icon1 ms-auto"></i> --}}
            </div>

            <div class="dropdown">
                <div class="mt-3 d-flex align-items-middle gap-3 justify-content-center border border-top rounded-4 shadow-sm pt-2"
                    type="button" data-bs-toggle="dropdown">
                    @if (auth()->user()->patient->image)
                    <img src="{{ Storage::url(auth()->user()->patient->image) }}"
                        class="dp rounded-circle ms border border-dark">
                    @else
                    <i class="bi bi-person-circle h1"></i>
                    @endif
                    <div class="d-block">
                        <h6>Hi, <b>{{ auth()->user()->patient->name }}</b></h6>
                        <h6 class="text-muted">{{ auth()->user()->email }}</h6>
                    </div>
                </div>
                <ul class="dropdown-menu w-100 rounded-top rounded-4 shadow" style="transition: all .6s;">
                    <li>
                        <a class="dropdown-item" href="{{ route('patients.edit', auth()->user()->patient->id) }}">
                            <img src="{{ asset('img/edit.png') }}" alt="icon" class="align-middle"
                                style="width:20px;height:20px;">
                            <span class="align-middle mx-2">Edit profile</span>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a class="dropdown-item" href="{{ route('change.patient.password') }}">
                            <img src="{{ asset('img/padlock.png') }}" class="align-middle" alt="icon"
                                style="width:20px;height:20px;">
                            <span class="align-middle mx-2">Change password</span>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a class="dropdown-item" href="{{ route('logout.user') }}" type="button">
                            <i class="fs-5 bi bi-box-arrow-left text-danger align-middle"></i>
                            <span class="align-middle mx-2 text-danger">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>

            <a href="{{ route('patient.page') }}" class="text-decoration-none text-dark">
                <div class="mt-3 shadow-sm p-3 rounded-4 mb-2 h6 border border-top" id="sb">
                    <img src="{{ asset('img/dashboard.png') }}" alt="icon" class="icon align-middle">
                    <span class="align-middle mx-2">Dashboard</span>
                </div>
            </a>

            <a href="{{ route('app-patient.index') }}" class="text-decoration-none text-dark">
                <div class="mt-3 shadow-sm p-3 rounded-4 mb-2 h6 border border-top" id="sb">
                    <img src="{{ asset('img/doctor.png') }}" alt="icon" class="icon align-middle">
                    <span class="align-middle mx-2">Appointments</span>
                </div>
            </a>
        </div>
    </div>


    {{-- Content1 --}}

    <div class="p-5" id="content1">
        @yield('content1')
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    {{-- <script src="{{ asset('js/index.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script> --}}

    <script>
        $(document).ready(function(){
            $("#open").on('click', function(){
            $("#open").css("opacity", "0");
            $('#content1').css('margin-left', "300px")
            $(".sidebar").addClass('enter');
    })
            $('#close').on('click', function(){
                $('.sidebar').removeClass('enter')
                $('#content1').css('margin-left', "0")
                $("#open").css("opacity", "1");
            })
    })

    </script>

</body>

</html>