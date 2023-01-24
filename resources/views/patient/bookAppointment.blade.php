@extends('patient.sidebar-patient')

@section('content1')

<section class="pt-5">
    <div class="container">
        <ul class="nav mb-3">
            <li>
                <h2
                    class="text-light nav-item fs-5 {{ 'bookappointment' ==  request()->path() ? 'border-bottom' : '' }}">
                    Appointments</h2>
            </li>
        </ul>

        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between">
                    <h3 class="fs-5">Current Appointment</h3>
                    <a href="{{ route('patients.create') }}" class="text-decoration-none">
                        <button class="btn btn-success">Add Appointment</button>
                    </a>
                </div>
                <div class="card-text">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-start">
                                <th class="text-muted fs-6">Appointment ID</th>
                                <th class="text-muted fs-6">DATE </th>
                                <th class="text-muted fs-6">SESSION</th>
                                <th></th>
                            </tr>
                        </thead>
                        {{-- @if (count($patients) > 0)
                        @foreach ($patients as $patient) --}}
                        <tbody class="text-start">
                            <tr class="align-middle">
                                <td>
                                    {{-- <div class="d-flex gap-3 align-items-center">
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
                                    </div> --}}
                                </td>
                                {{-- <td>{{ $patient->name }}</td> --}}
                                {{-- @if ($patient->dob == null)
                                <td>-</td>
                                @else
                                <td class="fs-6">{{ \Carbon\Carbon::parse($patient->dob)->format('j F, Y') }}</td>
                                @endif
                                <td class="fs-6">{{ $patient->age }} years old</td>
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
                                </td> --}}
                            </tr>
                        </tbody>
                        {{-- {!! $patient->links() !!} --}}
                        {{-- @endforeach
                        @else --}}
                        <tr>
                            <td colspan="5" class="text-center fs-6">No Data Found</td>
                        </tr>
                        {{-- @endif --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>



</div>


@endsection