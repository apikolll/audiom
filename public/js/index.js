
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

// $(document).ready(function(){
//     $("#open").on('click', function(){
//         alert("jadi bodo");
//         $("#open").css("opacity", "0");
//         $(".sidebar").addClass('enter');
//     })
// })

$(document).ready(function(){

    $('#appointment').on('click', function(){
        $('#hr1').addClass('active');
        $('#hr2').removeClass('active');
        $('#hr1').removeClass('unactive');
        $('#hr2').addClass('unactive');
    });

    $('#appointmenttime').on('click', function(){
        $('#hr2').addClass('active');
        $('#hr1').removeClass('active');
        $('#hr2').removeClass('unactive');
        $('#hr1').addClass('unactive');
    });
    
});