$(document).ready(function () {
    $('.menu-icon').click(function () {
        $('.menu-utama').toggleClass('active');
        $('.menu-icon').toggleClass('active');
    })

    $(".select-2").select2();
})

function Angka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}