@extends('patient.sidebar-patient')


@section('content1')

<section class="pt-5">
  <div class="container">
    <ul class="nav mb-3">
      <li>
        <h2 class="text-light nav-item fs-5 {{ 'patient-dashboard' ==  request()->path() ? 'border-bottom' : '' }}">
          Dashboard</h2>
      </li>
    </ul>
    {{-- <div class="d-md-flex gap-3"> --}}
      <div class="card w-100 mb-3">
        <div class="card-body">
          <h3 class="card-title fs-5">Upcoming Appointments</h3>
          <p class="lead fs-6">These are the list of your upcoming appointments</p>

          <table class="table table-hover">
            <thead>
              <tr class="text-muted fs-6">
                <th>Appointment ID</th>
                <th>Time</th>
                <th>Doctor's Name</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr class="align-middle">
                <td><span class="badge bg-info text-dark">APP1</span></td>
                <td>5 AM</td>
                <td> Dadw</td>
                <td>
                  <a href="" class="btn btn-primary">Details</a>
                </td>
                {{-- <td><button class="btn btn-primary">Details</button></td> --}}
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      {{-- <div class="d-block"> --}}
        <div class="card w-100">
          <div class="card-body">
            <h3 class="card-title fs-5">Follow-up Appointments</h3>
            <p class="lead fs-6">These are the list of your follow-up appointments</p>

            <table class="table table-hover">
              <thead>
                <tr class="text-muted fs-6">
                  <th>Appointment ID</th>
                  <th>Time</th>
                  <th>Doctor's Name</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr class="align-middle">
                  <td><span class="badge bg-info text-dark">APP2</span></td>
                  <td>5 AM</td>
                  <td>Dr Syifak</td>
                  <td>
                    <a href="{{ route('patient.detail') }}" class="btn btn-primary">Details</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
  </div>
</section>
@endsection