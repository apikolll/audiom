@extends('doctor.sidebar-doctor')

@section('content1')

<section class="pt-5">
    <div class="container">
        <div class="text-center text-light">
            <h3 class="display-3 fw-bold">Report</h3>
        </div>

        <div class="card mt-5">
            <div class="card-body">
                <div class="card-text">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Appointment ID</th>
                                <th>Patient ID</th>
                                <th>Date</th>
                                <th>Report Status</th>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($appointments) > 0)
                            @foreach ($appointments as $appointment)
                            <tr class="align-middle">
                                <td><span class="badge bg-info">{{ $appointment->id }}</span></td>
                                <td><span class="badge bg-info">{{ $appointment->patient_id }}</span></td>
                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d',
                                    $appointment->schedule->date)->format("M d, Y") }}</td>
                                @if (!$appointment->report_id)
                                <td><span class="badge bg-warning">N/A</span></td>
                                <td>
                                    <a href="{{ route('report.create', $appointment->id) }}"
                                        class="btn btn-primary">Generate</a>
                                </td>
                                @else
                                <td><span class="badge bg-success">Generated</span></td>
                                <td>
                                    <a href="" class="btn btn-primary disabled">Generate</a>
                                    <a href="{{ route('report.detail', $appointment->id) }}"
                                        class="btn btn-info">View</a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td class="text-center" colspan="5">No Appointment available</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-dark mt-3 fs-6">
            {!! $appointments->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</section>

@endsection