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

    <div class="card w-100 mb-3">
      <div class="card-body">
        <h3 class="card-title fs-5">Upcoming Appointments</h3>
        <p class="lead fs-6">These are the list of your upcoming appointments</p>

        <table class="table table-hover">
          <thead>
            <tr class="text-muted fs-6">
              <th>Appointment ID</th>
              <th>Session</th>
              <th>Cabin</th>
              <th>Doctor</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @if (count($upcomingAppointments)>0 )
            @foreach ($upcomingAppointments as $appointment)
            <tr class="align-middle">
              <td><span class="badge bg-info text-dark">{{ $appointment->id }}</span></td>
              <td>
                Session {{ $appointment->session_id }}
                <p class="lead fs-6 text-muted"> Time:
                  {{\Carbon\Carbon::createFromFormat('H:i:s',$appointment->sessions->starttime)->format('g:i
                  A')}} -
                  {{\Carbon\Carbon::createFromFormat('H:i:s',$appointment->sessions->endtime)->format('g:i
                  A')}}</p>
              </td>
              <td>Cabin {{ $appointment->cabin }}</td>
              <td>Dr. {{ $appointment->doctor->name }}</td>
              <td>
                <a href="{{ route('app-patient.show', $appointment->id) }}" class="btn btn-primary">Details</a>
              </td>
              {{-- <td><button class="btn btn-primary">Details</button></td> --}}
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="5" class="text-center fs-6">No Upcoming Appointment</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>



    <div class="card w-100">
      <div class="card-body">
        <h3 class="card-title fs-5">Follow-up Appointments</h3>
        <p class="lead fs-6">These are the list of your follow-up appointments</p>
        <table class="table table-hover">
          <thead>
            <tr class="text-muted fs-6">
              <th>Appointment ID</th>
              <th>Session</th>
              <th>Cabin</th>
              <th>Doctor</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @if (count($followupAppointments)>0 )
            @foreach ($followupAppointments as $appointment)
            <tr class="align-middle">
              <td><span class="badge bg-info text-dark">{{ $appointment->id }}</span></td>
              <td>
                Session {{ $appointment->session_id }}
                <p class="lead fs-6 text-muted"> Time:
                  {{\Carbon\Carbon::createFromFormat('H:i:s',$appointment->sessions->starttime)->format('g:i
                  A')}} -
                  {{\Carbon\Carbon::createFromFormat('H:i:s',$appointment->sessions->endtime)->format('g:i
                  A')}}</p>
              </td>
              <td>Cabin {{ $appointment->cabin }}</td>
              <td>Dr. {{ $appointment->doctor->name }}</td>
              <td>
                <a href="{{ route('app-patient.show', $appointment->id) }}" class="btn btn-primary">Details</a>
              </td>
              {{-- <td><button class="btn btn-primary">Details</button></td> --}}
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="5" class="text-center fs-6">No Follow-up Appointment</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection