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
    {{-- <img src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fupload.wikimedia.org%2Fwikipedia%2Fen%2Fthumb%2F8%2F8f%2FInternational_Islamic_University_Malaysia_logo.svg%2F1200px-International_Islamic_University_Malaysia_logo.svg.png&imgrefurl=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FInternational_Islamic_University_Malaysia&tbnid=fhaMVtX3uLCeBM&vet=12ahUKEwjHjdWTnO_8AhU7-XMBHWOaChEQMygCegUIARDYAQ..i&docid=BNMcW0l5BrRWRM&w=1200&h=1200&q=iium%20logo&client=opera&ved=2ahUKEwjHjdWTnO_8AhU7-XMBHWOaChEQMygCegUIARDYAQ" alt="logo" style="width: 100px;"> --}}
    <h1>IIUM Hearing & Speech Clinic</h1>
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
        <p>Time : {{ $datareceived['starttime'] }} -  {{ $datareceived['endtime'] }}</p>
        <p>Cabin : {{ $datareceived['cabin'] }}</p>
    </div>
</div>