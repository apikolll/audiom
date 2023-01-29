{{-- <img src="{{ asset('img/logo.png') }}" alt="logo" style="width: 100px;">
<h1>IIUM</h1>
<h2>Hearing & Speech Clinic</h2>
<h1>Appointment Approval</h1>
<h4 class="text-success">Your appointment has been approve !</h4>
<p>Here's the details:</p>
<div class="row">
    <div class="col">
        Appoinment ID:
    </div>c
    <div class="col">
        APP001
    </div>
</div> --}}

<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<style>
    #top{
        padding:50px;
        display: flex;
        align-items: center;
        gap: 20px;
        font-family: 'Poppins';
    }
    span{
        font-size: 22px;
    }
    #content{
        font-family:  'Poppins';
        padding:50px;
    }

    #p1{
        font-size: 20px;
        font-weight: bold;
        color: rgb(0, 128, 0);
    }
</style>

<div id="top">
    <img src="{{ asset('img/logo.png') }}" alt="logo" style="width: 100px;">
    <h1>IIUM</h1><span>Hearing & Speech Clinic</span>
</div>

<div id="content">
    <h3>Hi, {{ $datareceived['patient_name'] }} !</h3>
    <p id="p1">Your appointment has been approve!</p>
    <p>Here's the details:</p>
    <div>
        <P>Appoitment ID : {{ $datareceived['id'] }}</P>
        <p>Doctor : Dr. {{ $datareceived['doctor_name'] }}</p>
        <p>Date: {{ $datareceived['date'] }}</p>
        <p>Session : {{ $datareceived['session'] }}</p>
        <p>Time : {{ $datareceived['starttime'] }} -  {{ $datareceived['starttime'] }}</p>
        <p>Cabin : {{ $datareceived['cabin'] }}</p>
    </div>
</div>