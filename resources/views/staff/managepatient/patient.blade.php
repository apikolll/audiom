@extends('staff.sidebar')


@section('content1')

<section class="pt-5">
    <div class="container">

        <ul class="nav mb-3">
            <li>
                <h2 class="text-light nav-item fs-5 {{ 'patient' ==  request()->path() ? 'border-bottom' : '' }}">
                    Patient</h2>
            </li>
        </ul>

        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show text-center fs-6" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card fs-6">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between">
                    <h3 class="fs-5">All Patients</h3>
                    <a href="{{ route('patient.create') }}" class="text-decoration-none">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newAppointment"><i
                                class="bi bi-plus-lg"></i> Patient</button>
                    </a>
                </div>
                <div class="card-text">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-start">
                                <th class="text-muted fs-6">PATIENT</th>
                                <th class="text-muted fs-6">DATE OF BIRTH </th>
                                <th class="text-muted fs-6">AGE</th>
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
                                            style="width: 50px;height:50px">
                                        @else
                                        <i class="bi bi-person-circle display-6"></i>
                                        @endif
                                        <div class="d-block text-start">
                                            <span class="fs-6 d-block">{{ $patient->name }}</span>
                                            <span class="fs-6 d-block text-secondary">{{ $patient->users->email
                                                }}</span>
                                        </div>
                                    </div>
                                </td>
                                {{-- <td>{{ $patient->name }}</td> --}}
                                @if ($patient->dob == null)
                                <td>-</td>
                                @else
                                <td class="fs-6">{{ \Carbon\Carbon::parse($patient->dob)->format('j F, Y') }}</td>
                                @endif
                                @if ($patient->age)
                                <td class="fs-6">{{ $patient->age }} years old</td>
                                @else
                                <td class="fs-6">-</td>
                                @endif

                                <td>
                                    <a href="{{ route('patient.show', $patient->id) }}"
                                        class="text-decoration-none btn btn-outline-success">More details</a>
                                    <a href="{{ route('patient.edit', $patient->id) }}"
                                        class="text-decoration-none btn btn-warning">Edit profile</a>
                                    <a class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#ModalDelete{{ $patient->id }}">Remove</a>
                                </td>
                                @include('staff.managepatient.deletepatient')
                            </tr>
                        </tbody>
                        {{-- {!! $patients->withQueryString()->links('pagination::bootstrap-5') !!} --}}
                        {{-- {!! $patients->links() !!} --}}
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="text-center fs-6">No Data Found</td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
        <div class="text-dark mt-3 fs-6">
            {!! $patients->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>

</section>
@endsection