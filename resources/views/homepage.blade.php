@extends('layouts.navbar')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">

<style>
    .reveal {
        position: relative;
        transform: translateY(150px);
        opacity: 0;
        transition: 1s all ease;
    }

    .reveal.active {
        transform: translateY(0);
        opacity: 1;
    }
</style>

@section('content1')

<section class="p-5 mt-5">
    <div class="container">
        <div class="d-flex text-center justify-content-center">
            <div class="d-block">
                <a href="#" class="text-decoration-none">
                    <h4 class="text-center display-4"><span class="fw-light text-light"> Let's make your life
                            happier</span><span class="text-light">.</span></h4>
                </a>
                <div class="custom-container mt-4">
                    <p class="lead fs-5">Hearing is especially important in speech and
                        language development. In order to prevent hearing loss from having a lasting negative impact
                        on
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


@section('content2')


{{-- Services --}}
<h1 class="text-light text-center display-4 text-underline fw-bold afiq">Services</h1>
<section class="p-4">
    <div class="container">
        <div class="row gap-3">
            <div class="col-md reveal">
                <div class="card opa shadow bg-body bg-opacity-10 text-light ms-md-5 me-md-5 rounded-4">
                    <div class="card-body">
                        <div class="card-title text-center"><img src="{{ asset('img/file.png') }}" alt="icon"
                                class="icon"></div>
                        <p class="card-text lead text-center">Balance assessments and reports.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md reveal">
                <div class="card opa shadow bg-body bg-opacity-10 text-light ms-md-5 me-md-5 rounded-4">
                    <div class="card-body">
                        <div class="card-title text-center"><img src="{{ asset('img/infant.png') }}" alt="icon"
                                class="icon"></div>
                        <p class="card-text lead text-center">Neonatal hearing screening.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md reveal">
                <div class="card opa shadow bg-body bg-opacity-10 text-light ms-md-5 me-md-5 rounded-4">
                    <div class="card-body">
                        <div class="card-title text-center"><img src="{{ asset('img/hearing-aid.png') }}" alt="icon"
                                class="icon"></div>
                        <p class="card-text lead text-center">Fitting of hearing aidsand accessories.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 gap-3">
            <div class="col-md reveal">
                <div class="card opa shadow bg-body bg-opacity-10 text-light ms-md-5 me-md-5 rounded-4">
                    <div class="card-body">
                        <div class="card-title text-center"><img src="{{ asset('img/hearing.png') }}" alt="icon"
                                class="icon"></div>
                        <p class="card-text lead text-center">Sales and services of hearing aids and hearing
                            imparied.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md reveal">
                <div class="card opa shadow bg-body bg-opacity-10 text-light ms-md-5 me-md-5 rounded-4">
                    <div class="card-body">
                        <div class="card-title text-center"><img src="{{ asset('img/documents.png') }}" alt="icon"
                                class="icon"></div>
                        <p class="card-text lead text-center">Hearing assessments for children and adults.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md reveal">
                <div class="card opa shadow bg-body bg-opacity-10 text-light ms-md-5 me-md-5 rounded-4">
                    <div class="card-body">
                        <div class="card-title text-center"><img src="{{ asset('img/speak.png') }}" alt="icon"
                                class="icon"></div>
                        <p class="card-text lead text-center">Evaluation of speech, language, voice and swallowing
                            for
                            children and adults.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="position-fixed">
    <iframe src='https://my.spline.design/untitled-6040165c4c62150b2d69e6315017cd7e/' frameborder='0' width='100%'
        height='100%'></iframe>
</div>
{{-- Cards vision mission --}}

<div class="p-1 mt-5">
    <h1 class="text-light text-center display-4 text-underline fw-bold">About us</h1>
    <section class="p-4">
        <div class="container reveal">
            <div class="row mb-5">
                <div class="col">
                </div>
                <div class="col-md-6 text-light">
                    <h4 class="text-center fw-bold">Introduction</h4>
                    <p class="card-text text-center ">The IIUM Hearing & Speech Clinic is a part of the
                        Department of Audiology and Speech-Language Pathology, Kulliyyah of Allied Health
                        Sciences.
                    </p>
                    <p class="card-text text-center">It began its operation in March 2010 with the aim to provide
                        hearing and speech services to the public as well as training for future audiologist and
                        speech-language pathologists.
                    </p>
                    <p class="card-text text-center">There are 6 audiometric cabins complete with the
                        latest
                        equipments for hearing diagnostics and rehabilitation and 3 beatifully designed sound
                        trated rooms to allow for comfortable and focused speech-languange therapy sessions.
                    </p>
                </div>
                <div class="col">
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md text-light">
                    <h4 class="card-title text-center fw-bold">Vision</h4>
                    <p class="card-text text-center ">To be the centre of excellence in hearing and
                        speech-language
                        healthcare provision and education.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md text-light">
                    <h4 class="card-title text-center fw-bold">Mission</h4>
                    <p class="card-text text-center">Provide comprehensive assessment, intervention and
                        rehabilitation for pateints with hearing and speech-language disorders.
                    </p>
                    <p class="card-text text-center">Integrate Islamic values in service and practice.
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="p-1 mt-5 mb-5">
    <h1 class="text-light text-center display-4 text-underline fw-bold">FAQ</h1>
    <div class="accordion w-75 mx-auto reveal" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne">
                    Who is an audiologist ?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    An audiologist is a professional with a degree from accredited universited specialisng in the
                    prevention, identification, diagnosis, intervention and rehablilitation of hearing & balance
                    disorders.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Who is a Speech-Language Pathologist?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    A speech -language pathologist is a professional with a degree from accredited universities
                    speacialising in the prevention, identification, diagnosis, intervention and rehabilitation of human
                    communication disorders.
                </div>
            </div>
        </div>
    </div>
</div>


{{-- footer --}}
<footer class="bg-dark bg-opacity-75 text-light">
    <div class="p-3">
        <div class="d-md-flex justify-content-evenly">
            <div class="d-block">
                <h3 class="text-center">Our Social:</h3>
                <div class="mt-4 d-flex gap-5 justify-content-center align-items-center">
                    <i class="h3 bi bi-twitter"></i>
                    <i class="h3 bi bi-instagram"></i>
                    <i class="h3 bi bi-facebook"></i>
                </div>
            </div>
            <div class="d-block">
                <h3>Contact us</h3>
                <p><i class="bi bi-house"></i> International Islamic University Malaysia</p>
                <p><i class="bi bi-envelope"></i> afiqnrzm@hotmail.com</p>
                <p><i class="bi bi-telephone"></i> 09-5177627</p>
            </div>
            <div class="d-md-block">
                <h3>Location</h3>
                <iframe class="rounded-3" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3980.8787474365618!2d103.30240291482082!3d3.836194149614378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31c8ba517cb18f45%3A0xd13384f9d78197e3!2sAudiology%20Clinic%2C%20IIUM%20Medical%20Centre%20(IIUMMC)!5e0!3m2!1sen!2smy!4v1673880798756!5m2!1sen!2smy" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                {{-- <p><i class="bi bi-house"></i> International Islamic University Malaysia</p>
                <p><i class="bi bi-envelope"></i> afiqnrzm@hotmail.com</p>
                <p><i class="bi bi-telephone"></i> 09-5177627</p> --}}
            </div>
        </div>
        <div class="text-muted text-center mt-3">
            <small>Developed by Afiq <div class="vr"></div> All Rights Reserved</small>
        </div>
    </div>
</footer>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".card").hover(function(){
            $(this).css({"opacity": "100%"});
        }, function(){
            $(this).css({"opacity": "80%"});
        });
    });
</script>

<script>

    function reveal() {

        var reveals = document.querySelectorAll(".reveal");

        for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;
            var elementVisible = 150;

             if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");
            } else {
                reveals[i].classList.remove("active");
            }
        }
    }

window.addEventListener("scroll", reveal);
</script>