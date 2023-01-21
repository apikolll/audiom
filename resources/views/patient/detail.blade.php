@extends('patient.sidebar-patient')

@section('content1')

<section class="pt-5">
    <div class="container">

        <ul class="nav mb-3">
            <li>
              <h2 class="text-light nav-item fs-5 {{ 'patient/detail' ==  request()->path() ? 'border-bottom' : '' }}">
                Follow-up Appointment Details</h2>
            </li>
          </ul>

          <div class="card p-5">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Appointment ID:</h3>
                            <p class="badge bg-info text-dark">APP2</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Doctor:</h3>
                            <p>Dr.Danial</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Session:</h3>
                            <div class="d-block">
                                <p>Session 1</p>
                                <p>Time: 9:00 AM - 10:00 AM</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Date:</h3>
                            <p>Jan 23, 2021</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Cabin:</h3>
                            <p>Cabin 1</p>
                            
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <h3 class="fs-6 text-muted">Description:</h3>
                            <p>Speech and Hearing Test</p>
                        </div>
                    </div>
                </div>
            </div>
          </div>

    </div>
</section>
    
@endsection