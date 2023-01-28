@extends('doctor.sidebar-doctor')

@section('content1')

<section class="pt-5">
    <div class="container">

        <ul class="nav mb-3">
            <li>
                <h2 class="text-light nav-item fs-5 {{ 'doctors/todayappointment/index' ==  request()->path() ? 'border-bottom' : '' }}">
                    Today Appointments</h2>
            </li>
        </ul>

        <div class="card mt-3 rounded-4">
            <div class="card-body">
                {{-- <div class="card-title">Today Appointment</div> --}}
                <table class="table table-hover">
                    <thead>
                        <th>APPOINTMENT ID</th>
                        <th>PATIENT'S NAME</th>
                        <th>DATE</th>
                        <th></th>
                    </thead>
                    @if(count($apps))
                    <tbody>
                        @foreach ($apps as $app)
                        <tr class="align-middle">
                            <td><span class="badge bg-info text-dark">{{ $app->id }}</span></td>
                            <td>{{ $app->patient->name }}</td>
                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $app->schedule->date)->format('M d,
                                Y') }}</td>
                            <td>
                                <a href="{{ route('doc.app', $app->id) }}"
                                    class="btn btn-outline-primary">Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @else
                    <tr>
                        <td class="colspan-5">No Appointment today</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
</section>

@endsection