@extends('staff.sidebar')

@section('content1')

<section class="">
    <div class="container">
        <h2 class="fw-bold">Dashboard</h2>
        <hr>
        <div class="d-lg-flex gap-3 justify-content-between">
            <div class="card rounded-3 shadow-sm mb-3" style="width: 16rem;">
                <div class="card-body">
                    <div class="card-text">
                        <div class="d-flex justify-content-start gap-4 align-items-center">
                            <img src="{{ asset('img/appointment.png') }}" alt="icon"
                                class="icon-dashboard align-middle">
                            <div class="d-block">
                                <h5>Staff</h5>
                                <h5 class="rounded-2 text-dark fw-bold">{{ $staff }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="10"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="card rounded-3 shadow-sm mb-3" style="width: 16rem;">
                <div class="card-body">
                    <div class="card-text">
                        <div class="d-flex justify-content-start gap-4 align-items-center">
                            <img src="{{ asset('img/doctor.png') }}" alt="icon" class="icon-dashboard align-middle">
                            <div class="d-block">
                                <h5>Doctors</h5>
                                <h5 class="rounded-2 text-dark fw-bold">{{ $doctor }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="10"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="card rounded-3 shadow-sm mb-3" style="width: 16rem;">
                <div class="card-body">
                    <div class="card-text">
                        <div class="d-flex justify-content-start gap-4 align-items-center">
                            <img src="{{ asset('img/medical.png') }}" alt="icon" class="icon-dashboard align-middle">
                            <div class="d-block">
                                <h5>Patients</h5>
                                <h5 class="rounded-2 text-dark fw-bold">{{ $patient }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="10"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

{{-- <h1>This is admin page</h1>
<form action="{{ route('logout.user')}}">
    @csrf
    <button class="btn btn-danger">Log out</button>
</form> --}}

</html>