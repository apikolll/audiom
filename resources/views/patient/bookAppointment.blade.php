@extends('patient.sidebar-patient')

@section('content1')


<section class="pt-5 fs-6">
    <div class="container">

        <ul class="nav mb-3">
            <li>
                <h2 class="text-light nav-item fs-5 {{ 'app-patient' ==  request()->path() ? 'border-bottom' : '' }}">
                    Appointments</h2>
            </li>
        </ul>

        <div class="card">
            <div class="card-body">
<<<<<<< HEAD
                <div class="card-title d-flex justify-content-between">
                    <h3 class="fs-5">Current Appointment</h3>
                    <a href="{{ route('patients.create') }}" class="text-decoration-none">
                        <button class="btn btn-success">Add Appointment</button>
                    </a>
=======
                <div class="d-flex justify-content-end align-items-center mb-3">
                    <a href="{{ route('patients.create') }}" class="btn btn-success">Add Appointment</a>
>>>>>>> refs/remotes/origin/master
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr class="bg-secondary bg-opacity-10">
                            <th scope="col" class="text-muted">APP ID</th>
                            <th scope="col" class="text-muted">PATIENT</th>
                            <th scope="col" class="text-muted">DOCTOR</th>
                            <th scope="col" class="text-muted">STATUS</th>
                            <th scope="col" class="text-muted"></th>
                        </tr>
                    </thead>

                    <tbody class="align-middle">
                        @foreach ($appointments as $appointment)
                        @if (count($appointments) > 0)
                        <tr>
                            <th scope="row" class="fs-6"><span class="badge bg-info text-dark">{{ $appointment->id
                                    }}</span></th>
                            <td>
                                <span class="d-block fs-6">{{ $appointment->patient->name }}</span>
                            </td>
                            <td>
                                <span class="d-block fs-6">Dr. {{ $appointment->doctor->name }}</span>
                            </td>
                            <td>
                                <span class="badge bg-warning text-dark">{{ $appointment->status ? $appointment->status : 'No Status' }}</span>
                            </td>
                            <td>
                                <form action="{{ route('app-patient.delete', $appointment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('app-patient.show', $appointment->id) }}"
                                        class="btn btn-outline-primary">Details</a>
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>

                    </tbody>
                    @else
                    <tr>
                        <td colspan="5" class="text-center fs-6">No Data Found</td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</section>

@endsection