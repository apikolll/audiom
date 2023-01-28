@extends('staff.sidebar')

@section('content1')


<section class="pt-5 fs-6">
    <div class="container">

        <ul class="nav mb-3">
            <li>
                <h2
                    class="text-light nav-item fs-5 {{ 'patient/'. $patient->id ==  request()->path() ? 'border-bottom' : '' }}">
                    Patient's Details</h2>
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
                            <h3 class="fs-6 text-muted">Patient ID:</h3>
                            <p class="badge bg-info text-dark">{{ $patient->id }}</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Name:</h3>
                            <p>{{ $patient->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div>
                            <h3 class="fs-6 text-muted">Age:</h3>
                            @if ($patient->age)
                            <p>{{ $patient->age }}</p>
                            @endif
                            <p>-</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Date of Birth:</h3>
                            @if ($patient->dob)
                            <p>{{\Carbon\Carbon::createFromFormat('Y-m-d', $patient->dob)->format('M d, Y')}}</p>
                            @endif
                            <p>-</p>         
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Gender:</h3>
                            @if ($patient->gender)
                            <p>{{ $patient->gender }}</p>
                            @endif
                            <p>-</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Race:</h3>
                            @if ($patient->race)
                            <p>{{ $patient->race }}</p>
                            @endif
                            <p>-</p>

                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Contact:</h3>
                            @if ($patient->contact)
                            <p>{{ $patient->contact }}</p>
                            @endif
                            <p>-</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Image:</h3>
                            @if ($patient->image)
                            <img src="{{ Storage::url($patient->image) }}" alt="dp" class="rounded-3"
                                style="width: 150px;height:150px">
                            @else
                            <i class="bi bi-person-circle display-4"></i>
                            @endif

                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Address:</h3>
                            @if ($patient->address)
                            <p>{{ $patient->address }}</p>
                            @endif
                            <p>-</p>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="fs-6 text-muted text-end">
                Join on {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $patient->created_at)->format('M d,
                Y g:i
                A')}}
            </h3>
        </div>

    </div>
</section>
@endsection