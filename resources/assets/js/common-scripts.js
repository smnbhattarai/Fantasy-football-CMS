$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready(function(){
    setTimeout(function(){
        $('.alert').fadeOut('slow');
    }, 5000);
});