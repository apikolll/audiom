@extends('patient.sidebar-patient')


@section('content1')
<div class="container">
  {{-- <div class="d-md-flex gap-3"> --}}
    <div class="card w-100 mb-3">
      <div class="card-body">
        <h3 class="card-title">Upcoming Appointments</h3>
        <p class="lead">These are the list of your upcoming appointments</p>

        <table class="table table-hover">
          <thead>
            <tr class="text-center">
              <th>Appointment ID</th>
              <th>Time</th>
              <th>Doctor's Name</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr class="text-center align-middle">
              <td>A1</td>
              <td>5 AM</td>
              <td>Dr Syifak</td>
              <td><button class="btn btn-primary">Details</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    {{-- <div class="d-block"> --}}
      <div class="card w-100">
        <div class="card-body">
          <h3 class="card-title">Follow-up Appointments</h3>
          <p class="lead">These are the list of your follow-up appointments</p>

          <table class="table table-hover">
            <thead>
              <tr class="text-center">
                <th>Appointment ID</th>
                <th>Time</th>
                <th>Doctor's Name</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr class="text-center align-middle">
                <td>A1</td>
                <td>5 AM</td>
                <td>Dr Syifak</td>
                <td><button class="btn btn-primary">Details</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      {{-- <div class="card w-100">
        <div class="card-body">
          <h3 class="card-title">To-Do List</h3>
          <p class="lead">Insert you to-do list before your forget</p>

        </div>
      </div> --}}
      {{--
    </div> --}}

  {{-- </div> --}}
</div>
@endsection