$(document).ready(function () {
    var wnd = $(window);

    $('.menu-icon').click(function () {
        $('.menu-utama').toggleClass('active');
        $('.menu-icon').toggleClass('active');
        $('.menu-utama').toggleClass('disactive');
    })
    $(".select-2").select2({
        width: '100%',
        theme: "bootstrap"
    });

})

function Angka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function noSpace(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode == 32) {
        return false;
    }
    return true;
}
