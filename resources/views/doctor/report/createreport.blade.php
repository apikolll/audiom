@extends('doctor.sidebar-doctor')

@section('content1')

<section class="pt-5">
    <div class="container">
        <div class="text-center text-light">
            <h3 class="display-3 fw-bold">Generate Report</h3>
        </div>

        <div class="card mt-5 p-3">
            <div class="card-body">
                <div class="card-text">
                    <form action="{{ route("report.store") }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label for="name" class="form-label">Appointment ID:</label><br>
                                <input type="text" class="form-control" id="id" name="id" value="{{ $appointment->id }}"
                                    readonly>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="image-upload" class="form-label">Patient's ID:</label>
                                    <input class="form-control" type="text" name="patient"
                                        value="{{ $appointment->patient->id }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="image-upload" class="form-label">Test result:</label>
                                    <input class="form-control dropzone" type="file" name="testresult"
                                        id="image-upload">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Results</label>
                                    <input type="text" class="form-control" name="result" id="exampleFormControlInput1"
                                        placeholder="Results">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1"
                                        class="form-label">Comments/Recommendation</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="comment"
                                        rows="3" placeholder="Comments/Recommendation"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <button class="btn btn-outline-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection