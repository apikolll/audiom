@extends('staff.sidebar')

@section('content1')

<a href="{{ URL::previous() }}" class="btn btn-primary"><i class="bi bi-chevron-left"></i> Back</a>

<section class="pt-5 fs-6">
    <div class="container">

        <ul class="nav mb-3 ">
            <li>
                <h2
                    class="text-light nav-item fs-5 {{ 'doctor/'. $doctor->id ==  request()->path() ? 'border-bottom' : '' }}">
                    Doctor Details</h2>
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
                            <h3 class="fs-6 text-muted">Doctor ID:</h3>
                            <p class="badge bg-info text-dark">{{ $doctor->id }}</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Name:</h3>
                            <p>{{ $doctor->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Contact:</h3>
                            <div class="d-block">
                                <p>{{ $doctor->contact }}</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Race:</h3>
                            <p>{{ $doctor->race }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Gender:</h3>
                            <p>{{ $doctor->gender }}</p>

                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div>
                            <h3 class="fs-6 text-muted">Image:</h3>
                            @if ($doctor->image)
                            <img src="{{ Storage::url($doctor->image) }}" alt="dp" class="rounded-3"
                                style="width: 150px;height:150px">
                            @else
                            <i class="bi bi-person-circle display-4"></i>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h3 class="fs-6 text-muted">Address:</h3>
                        <p>{{ $doctor->address }}</p>
                    </div>
                    <div class="col-6">
                        
                    </div>
                </div>
            </div>
            <h3 class="fs-6 text-muted text-end">
            Join on {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $doctor->created_at)->format('M d,
                Y g:i
                A')}}
            </h3>
        </div>
    </div>
</section>
@endsection