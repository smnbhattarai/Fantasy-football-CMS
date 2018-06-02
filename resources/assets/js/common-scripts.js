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


var links = $('.navbar ul li a');
$.each(links, function (key, va) {
    if (va.href == document.URL) {
        $(this).parent().addClass('active');
    }
});