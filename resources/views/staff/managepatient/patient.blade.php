@extends('staff.sidebar')


@section('content1')

<section class="pt-5">
    <div class="container">

        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between">
                    <h3>All Patients</h3>
                    <a href="{{ route('patient.create') }}" class="text-decoration-none">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newAppointment"><i
                                class="bi bi-plus-lg"></i> Patient</button>
                    </a>
                </div>
                <div class="card-text">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-start">
                                <th class="text-muted">PATIENT</th>
                                <th class="text-muted">DATE OF BIRTH </th>
                                <th class="text-muted">AGE</th>
                                <th></th>
                            </tr>
                        </thead>
                        @if (count($patients) > 0)

                        @foreach ($patients as $patient)
                        <tbody class="text-start">
                            <tr class="align-middle">
                                <td>
                                    <div class="d-flex gap-3 align-items-center">
                                        @if ($patient->image)
                                        <img src="{{ Storage::url($patient->image) }}" alt="dp" class="rounded-circle"
                                            style="width: 60px;height:60px">
                                        @else
                                        <i class="bi bi-person-circle display-5"></i>
                                        @endif
                                        <div class="d-block text-start">
                                            <span class="fs-6 d-block">{{ $patient->name }}</span>
                                            <span class="fs-6 d-block text-secondary">{{ $patient->user->email }}</span>
                                        </div>
                                    </div>
                                </td>
                                {{-- <td>{{ $patient->name }}</td> --}}
                                @if ($patient->dob == null)
                                <td>-</td>
                                @else
                                <td>{{ \Carbon\Carbon::parse($patient->dob)->format('j F, Y') }}</td>
                                @endif
                                <td>{{ $patient->age }} years old</td>
                                <td>
                                    <form action="{{ route('patient.destroy', $patient->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('patient.show', $patient->id) }}"
                                            class="text-decoration-none btn btn-outline-success">More details</a>
                                        <a href="{{ route('patient.edit', $patient->id) }}"
                                            class="text-decoration-none btn btn-warning">Edit profile</a>
                                        <button class="btn btn-danger" type="submit">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        {{-- {!! $patient->links() !!} --}}
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="text-center">No Data Found</td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection