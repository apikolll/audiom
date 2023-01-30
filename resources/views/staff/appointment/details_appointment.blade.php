@extends('staff.sidebar')

@section('content1')

<section class="pt-5 fs-6">
    <div class="container">

        <ul class="nav mb-3">
            <li>
                <h2
                    class="text-light nav-item fs-5 {{ 'patient/detail' ==  request()->path() ? 'border-bottom' : '' }}">
                    Appointment Details</h2>
            </li>
        </ul>

        <div class="text-end">
            <a href="{{ URL::previous() }}" class="btn btn-primary">BACK</a>
        </div>

        <div class="card p-5 mt-3">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Appointment ID:</h3>
                            <p class="badge bg-info text-dark">{{ $appointment->id }}</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Status:</h3>
                            @if ($appointment->status == "Pending")
                            <p class="badge bg-warning text-dark">{{ $appointment->status }}</p>
                            @elseif($appointment->status == "Approve")
                            <p class="badge bg-success text-dark">{{ $appointment->status }}</p>
                            @else
                            <p class="badge bg-primary text-dark">{{ $appointment->status }}</p>
                            @endif
                            
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Doctor:</h3>
                            <p>{{ $appointment->doctor->name }}</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Patient:</h3>
                            <p>{{ $appointment->patient->name }}</p>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Session:</h3>
                            <div class="d-block">
                                <p>Session {{ $appointment->session_id }}</p>
                                <p class="lead fs-6"> Time:
                                    {{\Carbon\Carbon::createFromFormat('H:i:s',$appointment->sessions->starttime)->format('g:i
                                    A')}} -
                                    {{\Carbon\Carbon::createFromFormat('H:i:s',$appointment->sessions->endtime)->format('g:i
                                    A')}}</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Date:</h3>
                            <p>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $appointment->schedule->date)->format('M d, Y')  }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Cabin:</h3>
                            <p>Cabin {{ $appointment->cabin }}</p>

                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Description:</h3>
                            <p>{{ $appointment->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection