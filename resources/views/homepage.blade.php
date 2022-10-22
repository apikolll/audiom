@extends('layouts.navbar')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">

<link rel="stylesheet" href="/css/style.css">

@section('section1')
    <section class="p-5" style="font-family: 'Yeseva One', cursive;">
        <div class="container">
            <div class="d-flex text-center justify-content-center">
                <div class="d-block">
                    <a href="#" class="text-decoration-none">
                        <h4 class="text-center display-4"><span class="fw-light text-dark"> Let's make your life happier</span><span class="text-light">.</span></h4>
                    </a>
                    {{-- custom-container is a custome container --}}
                    <div class="custom-container mt-4">
                        <p class="lead fs-5">Hearing is especially important in speech and
                            language development. In order to prevent hearing loss from having a lasting negative impact on
                            a child's development, early intervention is key</span><span class="text-light">.</span></p>
                    </div>
                    <a href="register">
                        <button class="btn btn-warning p-2 px-4 s-2 mt-4" type="button"><span class="fs-5">Book
                                Appointment</span></button>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- @section('section2')
    <div class="container-fluid bg-dark">
        <h1>idawd</h1>
        <h1>idawd</h1>
        <h1>idawd</h1>
        <h1>idawd</h1>
    </div>
@endsection --}}

{{-- @section('footer')
    <footer class="container-fluid bg-light text-muted">
        social media section
        <section class="d-flex justify-content-between">
            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>
            <div>
                <a href="#" class="me-4 h4 text-decoration-none">
                    <i class="bi bi-twitter text-muted"></i>
                </a>
                <a href="#" class="me-4 h4 text-decoration-none">
                    <i class="bi bi-facebook text-muted"></i>
                </a>
                <a href="#" class="me-4 h4 text-decoration-none">
                    <i class="bi bi-whatsapp text-muted"></i>
                </a>
                <a href="#" class="me-4 h4 text-decoration-none">
                    <i class="bi bi-instagram text-muted"></i>
                </a>
            </div>
        </section>
        <hr>
    </footer>
@endsection --}}
