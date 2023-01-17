<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Date : {{ $date }}</h1>
    <h2>Open Cabin for {{ $date }}</h2>

    @foreach ($appointments as $appointment)
        <h3>Cabin : {{ $appointment->cabin_id }}, {{ $appointment->cabin->status }}</h3>
    @endforeach

    {{-- @foreach ($appointments as $appointment)
    {{ $cabins->status }}
        <h1>Date {{ $appointments->appointment_id }}</h1>
        <h3>Cabin {{ $appointments->cabin_id }} have Session {{ $appointments->session_id }} Open </h3>
    @endforeach --}}
</body>
</html>