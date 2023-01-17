@extends('staff.sidebar')

@section('content1')

<a href="{{ URL::previous() }}" class="btn btn-primary"><i class="bi bi-chevron-left"></i> Back</a>

<section class="pt-5">
    <div class="card shadow-sm ">
        <div class="card-body fs-3">
            Doctor Details : <b>{{ $doctor->name }}</b>
        </div>
        <div class="card-text fs-5 p-2">
            <table class="table">
                <tbody class="text-center">
                    <tr>
                        @if (!$doctor->image)
                        <td class="text-muted">No image available</td>
                        @else
                        <td>
                            <img src="{{ asset($doctor->image) }}" class="rounded" style="width:100px;height:100px;"
                                alt="IDK">
                        </td>
                        @endif

                    </tr>
                    <tr>
                        <th scope="row">Name</th>
                        <td class="text-muted">{{ $doctor->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Age</th>
                        <td class="text-muted">{{ $doctor->age }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Date of Birth</th>
                        <td colspan="2" class="text-muted">{{ $doctor->dob }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Gender</th>
                        <td colspan="2" class="text-muted">{{ $doctor->gender }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Phone</th>
                        <td colspan="2" class="text-muted">{{ $doctor->contact }}</td>
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