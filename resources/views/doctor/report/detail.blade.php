@extends('doctor.sidebar-doctor')

@section('content1')
<section class="pt-5">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="card-title text-center">
                    <span>Report's ID: </span>
                    <span class="badge bg-info">{{ $appointment->report->id }}</span>
                </div>
                <div class="card p-2 mb-3">
                    <div class="card-body">
                        <div class="card-title">
                            <span class="fw-bold text-decoration-underline">Patient's Information</span>
                        </div>
                        <div class="card-text">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <span class="text-muted">ID</span><br>
                                    <span class="badge bg-info">{{ $appointment->patient->id }}</span>
                                </div>
                                <div class="col-6">
                                    <span class="text-muted">Name</span><br>
                                    <span>{{ $appointment->patient->name }}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <span>Age</span><br>
                                    <span>{{ $appointment->patient->age }}</span>
                                </div>
                                <div class="col-6">
                                    <span class="text-muted">Date of Birth</span><br>
                                    <span>{{ \Carbon\Carbon::createFromFormat('Y-m-d',
                                        $appointment->patient->dob)->format('M d, Y') }}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <span class="text-muted">Gender</span><br>
                                    <span>{{ $appointment->patient->gender }}</span>
                                </div>
                                <div class="col-6">
                                    <span class="text-muted">Race</span><br>
                                    <span>{{ $appointment->patient->race }}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <span class="text-muted">Contact</span><br>
                                    <span>{{ $appointment->patient->contact }}</span>
                                </div>
                                <div class="col-6">
                                    <span class="text-muted">Address</span><br>
                                    <span>{{ $appointment->patient->address }}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <span class="text-muted">Image</span><br>
                                    @if ($appointment->patient->image)
                                    <img src="{{ Storage::url($appointment->patient->image) }}" alt="dp" class="rounded-3"
                                        style="width: 150px;height:150px">
                                    @else
                                    <i class="bi bi-person-circle display-4"></i>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-2 mb-3">
                    <div class="card-body">
                        <div class="card-title mb-3">
                            <span class="fw-bold text-decoration-underline">Test Report</span>
                        </div>
                        <div class="card-text">
                            <div class="row mb-3">
                                <div class="col-12 text-center">
                                    <img src="{{ Storage::url($appointment->report->testresult) }}" alt="dp" class="rounded-3"
                                        style="width: 350px;height:350px">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <span class="text-muted">Result</span><br>
                                    <span>{{ $appointment->report->result }}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <span class="text-muted">Comments/Recommendation</span><br>
                                    <span>{{ $appointment->report->comment }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span class="text-muted">Tested By:</span><br>
                                    <span>Dr. {{ $appointment->doctor->name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection