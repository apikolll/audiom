@extends('staff.sidebar')

@section('content1')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

<style>
    .active {
        border: 2px solid white;
        border-radius: 5px;
    }

    .unactive {
        display: none;
    }
</style>

<section class="pt-5">
    <div class="container">

        <ul class="nav mb-3">
            <li class="nav-item {{ 'app' ==  request()->path() ? 'border-bottom' : '' }}">
                <a class="nav-link text-light fs-5" href="{{ route('app.index') }}">Appointments</a>
            </li>
            <li class="nav-item {{ 'schedule' ==  request()->path() ? 'border-bottom' : '' }}">
                <a class="nav-link text-light fs-5" href="{{ route('schedule.index') }}">Appointment Schedule</a>
            </li>
        </ul>

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-inline-flex align-items-center gap-3">
                        <input type="text" class="form-control" placeholder="Search">
                        <a href="#" class="text-decoration-none text-dark"><i class="bi bi-search"></i></a>
                    </div>
                    <a href="{{ route('app.create') }}" class="btn btn-success">Add Appointment</a>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr class="bg-secondary bg-opacity-10">
                            <th scope="col fs-6">Patient</th>
                            <th scope="col fs-6">Appointment At</th>
                            <th scope="col fs-6">Status</th>
                            <th scope="col fs-6">Action</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <tr>
                            <th scope="row" class="fs-6">Afiq</th>
                            <td>
                                <span class="d-block fs-6">Cabin 1</span>
                                <span class="fs-6">8.00 am - 9.00 am</span>
                            </td>
                            <td><select class="form-select w-50 fs-6">
                                    <option selected>Status</option>
                                    <option value="1">Booked</option>
                                    <option value="2">Cancelled</option>
                                    <option value="3">Check in</option>
                                </select></td>
                            <td>
                                <a href="#"><img src="{{ asset('img/details.png') }}" alt="" style="width:1.5rem;"></a>
                                <a href="#"><img src="{{ asset('img/trash.png') }}" alt="" style="width:1.5rem;"></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection