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
                    <h3>All Doctors</h3>
                    <a href="{{ route('doctor.create') }}" class="text-decoration-none">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newAppointment"><i
                                class="bi bi-plus-lg"></i> Doctor</button>
                    </a>
                </div>
                <div class="card-text">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th class="text-muted">NAME</th>
                                <th class="text-muted">ADDRESS </th>
                                <th class="text-muted">Contact No</th>
                                <th></th>
                            </tr>
                        </thead>

                        @if (count($doctor) > 0)

                        @foreach ($doctor as $doctors)
                        <tbody class="text-center">
                            <tr>
                                <td class="text-start text-center">
                                    @if ($doctors->image)
                                    <img src="{{ asset($doctors->image) }}" class="rounded-circle ms border border-dark" style="width: 40px;height:39px; margin-right:10px;">
                                    @endif
                                    {{ $doctors->name }}
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