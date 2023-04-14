console.log("test")


$(document).ready(function(){

    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        startDate: '0d'
    });
    
    $('.cell').click(function(){
        $('.cell').removeClass('select');
        $(this).addClass('select');
    });
    $('.icon').click(function(){
        $('.icon').removeClass('select');
        $(this).addClass('select');
    });
    
    });
