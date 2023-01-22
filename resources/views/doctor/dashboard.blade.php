@extends('doctor.sidebar-doctor')

@section('content1')

<section class="pt-5">
    <div class="container">

        <ul class="nav mb-3">
            <li>
                <h2 class="text-light nav-item fs-5 {{ 'doctors' ==  request()->path() ? 'border-bottom' : '' }}">
                    Dashboard</h2>
            </li>
        </ul>


        <div class="d-lg-flex gap-3 justify-content-between">
            <div class="card rounded-3 shadow-sm mb-3 p-3" style="width: 20rem;">
                <div class="card-body">
                    <div class="card-text">
                        <div class="d-flex justify-content-start gap-4 align-items-center">
                            <img src="{{ asset('img/appointment.png') }}" alt="icon"
                                class="icon-dashboard align-middle">
                            <div class="d-block">
                                <h5>Total Appointment</h5>
                                <h5 class="rounded-2 text-dark fw-bold">5</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card rounded-3 shadow-sm mb-3 p-3" style="width: 20rem;">
                <div class="card-body">
                    <div class="card-text">
                        <div class="d-flex justify-content-start gap-4 align-items-center">
                            <img src="{{ asset('img/doctor.png') }}" alt="icon" class="icon-dashboard align-middle">
                            <div class="d-block">
                                <h5>Today Appointment</h5>
                                <h5 class="rounded-2 text-dark fw-bold">2</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card rounded-3 shadow-sm mb-3 p-3" style="width: 20rem;">
                <div class="card-body">
                    <div class="card-text">
                        <div class="d-flex justify-content-start gap-4 align-items-center">
                            <img src="{{ asset('img/medical.png') }}" alt="icon" class="icon-dashboard align-middle">
                            <div class="d-block">
                                <h5>Total Patients</h5>
                                <h5 class="rounded-2 text-dark fw-bold">4</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-light fs-5">Recent Appointments</h2>
        <div class="card mt-3 rounded-4">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <th>APPOINTMENT ID</th>
                        <th>PATIENT'S NAME</th>
                        <th>DATE</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr class="align-middle">
                            <td><span class="badge bg-info text-dark">APP2</span></td>
                            <td>Afiq</td>
                            <td>Jan 23, 2022</td>
                            <td>
                                <button class="btn btn-outline-primary">Details</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection