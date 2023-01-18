@extends('patient.sidebar-patient')

@section('content1')
<div class="container">
    <div class="text-center text-light">
        <span class="display-3 fw-bold">Book Appointments</span>
    </div>

    {{-- <div class="d-block"> --}}
        @foreach($times as $time)
        <a href="#" class="btn btn-primary mb-3 mx-2" role="button" data-bs-toggle="button" style="width: 10rem">{{
            $time->time }}</a>
        {{-- <button class="btn btn-primary mb-3 mx-2"></button> --}}
        @endforeach
        {{--
    </div> --}}
</div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    // $(document).ready(function(){
        
    //     // let number = 0
    //     let text = "";
    //     var timer = setInterval(function () {
    //     text = $('input').val()
    //     $('.demo').val(text);
    // }, 250);
        // $('a').each(function(index, value){
        //     $('.demo').text(this.index);
        // });
        // let btn = $('a').on('click', function(){
        //     for( let i = 0; i < btn.)
        //     number = number + btn
        //     $(".demo").text(number)
        // });
    // });
</script>