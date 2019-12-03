$(document).ready(function () {
    var Tahun = document.getElementById("Tahun").value;
    getData(Tahun);
})

$('#Tahun').on('change', function () {
    var Tahun = document.getElementById("Tahun").value;
    getData(Tahun);
});

function getData($tahun) {
    $('.Place-Data').html('<img height="35px" src="file/app/loading-3.gif" alt="">');

    $.ajax({
        url: 'home/getAllData/' + $tahun,
        type: 'POST',
        dataType: 'JSON',
        success: function (result) {
            $('#data-1').html(result.data1);
            $('#data-2').html(result.data2);
            $('#data-3').html(result.data3);
            $('#data-4').html(result.data4);
            $('#data-5').html(result.data5);
            $('#data-6').html(result.data6);
            $('#data-7').html(result.data7);
            $('#data-8').html(result.data8);
            $('#data-9').html(result.data9);
            $('#data-10').html(result.data10);
            $('#data-11').html(result.data11);
            $('#data-12').html(result.data12);
            $('#data-13').html(result.data13);
            $('#data-14').html(result.data14);
        }
    });
}