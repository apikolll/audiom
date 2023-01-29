@extends('staff.sidebar')

@section('content1')

<section class="pt-5">
    <div class="container">

        <ul class="nav mb-3">
            <li> <h2 class="text-light nav-item fs-5 {{ 'doctor' ==  request()->path() ? 'border-bottom' : '' }}">Doctors</h2></li>
         </ul>

        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show text-center fs-6" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between">
                    <span class="fs-5">All Doctors</span>
                    <a href="{{ route('doctor.create') }}" class="text-decoration-none">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newAppointment"><i
                                class="bi bi-plus-lg"></i> Doctor</button>
                    </a>
                </div>
                <div class="card-text">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-start">
                                <th class="text-muted fs-6">DOCTOR</th>
                                <th class="text-muted  fs-6">ADDRESS </th>
                                <th class="text-muted  fs-6">Contact No</th>
                                <th></th>
                            </tr>
                        </thead>

                        @if (count($doctor) > 0)

                        @foreach ($doctor as $doctors)
                        <tbody class="text-start fs-6">
                            <tr>
                                <td>
                                <div class="d-flex gap-3 align-items-center">
                                    @if ($doctors->image)
                                    <img src="{{ Storage::url($doctors->image) }}" alt="dp" class="rounded-circle"
                                        style="width: 50px;height:50px">
                                    @else
                                    <i class="bi bi-person-circle display-6"></i>
                                    @endif
                                    <div class="d-block text-start">
                                        <span class="fs-6 d-block">{{ $doctors->name }}</span>
                                        <span class="fs-6 d-block text-secondary">{{ $doctors->users->email }}</span>
                                    </div>
                                </div>
                            </td>
                                <td class="text-truncate align-middle" style="max-width: 150px;">{{ $doctors->address }}</td>
                                <td class="align-middle">{{ $doctors->contact }}</td>
                                <td>
                                    <form action="{{ route('doctor.destroy', $doctors->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('doctor.show', $doctors->id) }}"
                                            class="text-decoration-none btn btn-outline-success">More details</a>
                                        <a href="{{ route('doctor.edit', $doctors->id) }}"
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
                            <td colspan="5" class="text-center fs-6">No Data Found</td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection