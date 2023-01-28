@extends('doctor.sidebar-doctor')

@section('content1')

<div class="text-end">
    <span class="text-light badge bg-primary" id="ct6"></span>
</div>


<section class="pt-5">
    <div class="container">

        <ul class="nav mb-3">
            <li>
                <h2 class="text-light nav-item fs-5 {{ 'doctors' ==  request()->path() ? 'border-bottom' : '' }}">
                    Dashboard</h2>
            </li>
        </ul>


        <div class="d-lg-flex gap-3 justify-content-between">
            <div class="card rounded-3 shadow-sm mb-3 p-3" style="width: 20rem;">
                <div class="card-body">
                    <div class="card-text">
                        <div class="d-flex justify-content-start gap-4 align-items-center">
                            <img src="{{ asset('img/appointment.png') }}" alt="icon"
                                class="icon-dashboard align-middle">
                            <div class="d-block">
                                <h5>Total Appointment</h5>
                                <h5 class="rounded-2 text-dark fw-bold">{{ count($patients) }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card rounded-3 shadow-sm mb-3 p-3" style="width: 20rem;">
                <div class="card-body">
                    <div class="card-text">
                        <div class="d-flex justify-content-start gap-4 align-items-center">
                            <img src="{{ asset('img/doctor.png') }}" alt="icon" class="icon-dashboard align-middle">
                            <div class="d-block">
                                <a href="{{ route('todayappointment.index') }}" class="btn btn-body">
                                    <h5 class="text-start">Today Appointment</h5>
                                    <h5 class="rounded-2 text-dark fw-bold text-start">{{ $todayAppointments }}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card rounded-3 shadow-sm mb-3 p-3" style="width: 20rem;">
                <div class="card-body">
                    <div class="card-text">
                        <div class="d-flex justify-content-start gap-4 align-items-center">
                            <img src="{{ asset('img/medical.png') }}" alt="icon" class="icon-dashboard align-middle">
                            <div class="d-block">
                                <h5>Total Patients</h5>
                                <h5 class="rounded-2 text-dark fw-bold">{{ count($patients) }}</h5>
                                {{-- {{ dd($pat) }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-light fs-5">Your list of Appointments</h2>
        <div class="card mt-3 rounded-4">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <th>APPOINTMENT ID</th>
                        <th>PATIENT'S NAME</th>
                        <th>DATE</th>
                        <th></th>
                    </thead>
                    @if(count($patients))
                    <tbody>
                        @foreach ($patients as $patient)
                        <tr class="align-middle">
                            <td><span class="badge bg-info text-dark">{{ $patient->id }}</span></td>
                            <td>{{ $patient->patient->name }}</td>
                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $patient->schedule->date)->format('M d,
                                Y') }}</td>
                            <td>
                                <a href="{{ route('doc.app', $patient->id) }}"
                                    class="btn btn-outline-primary">Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
</section>


<script>
    function display_ct6() {
        var x = new Date()
        var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
        hours = x.getHours( ) % 12;
        hours = hours ? hours : 12;
        var x1= x.getDate() + "/" + x.getMonth() + 1 + "/" + x.getFullYear(); 
        x2 = "Date: " + x1 + "<br>" + "Time: " + hours + ":" +  x.getMinutes() +  ampm;
        document.getElementById('ct6').innerHTML = x2;
        display_c6();
     }

    function display_c6(){
        var refresh=1000; // Refresh rate in milli seconds
        mytime=setTimeout('display_ct6()',refresh)
    }
    display_c6()
</script>

@endsection