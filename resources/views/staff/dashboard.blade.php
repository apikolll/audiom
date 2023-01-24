@extends('staff.sidebar')

@section('content1')


<section class="pt-5">
    <div class="container">

        <ul class="nav mb-3">
            <li>
                <h2
                    class="text-light nav-item fs-5 {{ 'staff-dashboard' ==  request()->path() ? 'border-bottom' : '' }}">
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
                                <h5>Total Staff</h5>
                                <h5 class="rounded-2 text-dark fw-bold">{{ $staff }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card rounded-3 shadow-sm mb-3 p-3" style="width: 20rem;">
                <div class="card-body">
                    <div class="card-text">
                        <div class="d-flex justify-content-start gap-4 align-items-center">
                            <img src="{{ asset('img/appointment.png') }}" alt="icon"
                                class="icon-dashboard align-middle">
                            <div class="d-block">
                                <h5>Total Appointment</h5>
                                <h5 class="rounded-2 text-dark fw-bold">{{ $appointment }}</h5>
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
                                <h5>Total Doctor</h5>
                                <h5 class="rounded-2 text-dark fw-bold">{{ $doctor }}</h5>
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
                                <h5 class="rounded-2 text-dark fw-bold">{{ $patient }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3 rounded-4">
            <div class="card-body">
                <canvas id="myChart" style="width:80%;max-width:700px;" class="mx-auto"></canvas>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>

<script>
    var xValues = ["Staff", "Doctors", "Patients", "Appointments"];
    var yValues = [{{ $staff }}, {{ $doctor }}, {{ $patient }}, {{ $appointment }}];
    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#1b5194",
    ];
    
    new Chart("myChart", {
      type: "pie",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
          text: "Total Data"
        }
      }
    });
</script>

@endsection