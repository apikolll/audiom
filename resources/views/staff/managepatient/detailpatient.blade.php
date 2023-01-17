@extends('staff.sidebar')

@section('content1')

<a href="{{ URL::previous() }}" class="btn btn-primary"><i class="bi bi-chevron-left"></i> Back</a>

<section class="pt-5">
    <div class="card shadow-sm ">
        <div class="card-body fs-3">
            Patient Details : <b>{{ $patient->name }}</b>
        </div>
        <div class="card-text fs-5 p-2">
            <table class="table">
                <tbody class="text-center">
                    <tr>
                        <th scope="row">Name</th>
                        <td class="text-muted">{{ $patient->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Age</th>
                        <td class="text-muted">{{ $patient->age }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Date of Birth</th>
                        <td colspan="2" class="text-muted">{{ $patient->dob }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Gender</th>
                        <td colspan="2" class="text-muted">{{ $patient->gender }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Phone</th>
                        <td colspan="2" class="text-muted">{{ $patient->contact }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Follow-up</th>
                        <td colspan="2" class="text-muted">N/A</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection