@extends('staff.sidebar')

@section('content1')

<a href="{{ URL::previous() }}" class="btn btn-primary"><i class="bi bi-chevron-left"></i> Back</a>

<section class="pt-5">
    <div class="container">

        <ul class="nav mb-3">
            <li>
                <h2
                    class="text-light nav-item fs-5 {{ 'patient/'. $patient->id ==  request()->path() ? 'border-bottom' : '' }}">
                    Patient Details</h2>
            </li>
        </ul>

        <div class="card p-5">
            <div class="card-body fs-6">
                <div class="row mb-3">
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Patient ID:</h3>
                            <p class="badge bg-info text-dark">{{ $patient->id }}</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Patient's Name:</h3>
                            <p>{{ $patient->name }}</p>
                        </div>
                    </div>
                    
                </div>

                <div class="row mb-3">
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Age:</h3>
                            <p>{{ $patient->age }} years old</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Date Of Birth:</h3>
                            <p>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $patient->dob)->format('M d, Y') }}</p>
                        </div>
                    </div>
                    
                </div>

                <div class="row mb-3">
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Race:</h3>
                            <p>{{ $patient->race }}</p>

                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Gender:</h3>
                            <p>{{ $patient->gender }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Image:</h3>
                            @if ($patient->image)
                            <img src="{{ Storage::url($patient->image) }}" alt="dp" class="rounded"
                                style="width: 100px;height:100px">
                            @else
                            <i class="bi bi-person-circle display-6"></i>
                            @endif

                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Contact:</h3>
                            <p>{{ $patient->contact }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div>
                            <h3 class="fs-6 text-muted">Address:</h3>
                            <p>{{ $patient->address }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection