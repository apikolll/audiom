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

    hr {
        margin-top: -5px;

    }
</style>


<ul class="nav mb-3">
    <li class="nav-item {{ 'appointment' ==  request()->path() ? 'border-bottom' : '' }}">
        <a class="nav-link text-light fs-5" href="/appointment" id="appointment">Appointments</a>
        {{--
        <hr id="hr1" class="active mx-3"> --}}
    </li>
    <li class="nav-item {{ 'showSchedule' ==  request()->path() ? 'border-bottom' : '' }}">
        <a class="nav-link text-light fs-5" href="{{ route('show.setSchedule') }}" id="appointmenttime">Appointment Schedule</a>
        {{--
        <hr id="hr2" class="unactive mx-3"> --}}
    </li>
</ul>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="d-inline-flex align-items-center gap-3">
                <input type="text" class="form-control" placeholder="Search">
                <a href="#" class="text-decoration-none text-dark"><i class="bi bi-search"></i></a>
            </div>
            <a href="/addapp" class="btn btn-success">Add Appointment</a>
        </div>

        <table class="table table-hover">
            <thead>
                <tr class="bg-secondary bg-opacity-10">
                    <th scope="col">Patient</th>
                    <th scope="col">Appointment At</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                <tr>
                    <th scope="row">Afiq</th>
                    <td>
                        <span class="d-block">Cabin 1</span>
                        <span>8.00 am - 9.00 am</span>
                    </td>
                    <td><select class="form-select w-50">
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
                <tr>
                    <th scope="row">Afiq</th>
                    <td>
                        <span class="d-block">Cabin 1</span>
                        <span>8.00 am - 9.00 am</span>
                    </td>
                    <td><select class="form-select w-50">
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
                <tr>
                    <th scope="row">Afiq</th>
                    <td>
                        <span class="d-block">Cabin 1</span>
                        <span>8.00 am - 9.00 am</span>
                    </td>
                    <td><select class="form-select w-50">
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

@endsection