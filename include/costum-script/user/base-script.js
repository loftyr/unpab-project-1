$(document).ready(function() {
    $('.menu-icon').click(function(){
        $('.menu-utama').toggleClass('active');
        $('.menu-icon').toggleClass('active');
    })

    $(".select-2").select2();
})