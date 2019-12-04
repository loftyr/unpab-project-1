$('#Tahun').on('change', function () {
    var Tahun = document.getElementById("Tahun").value;
    getData(Tahun);
});

$(document).on('click', '#export-excel', function () {
    var htmltable = document.getElementById('table-export');
    var html = htmltable.outerHTML;
    window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
});

$(document).ready(function () {
    $('.tabel-1').DataTable();

    var Tahun = document.getElementById("Tahun").value;
    getData(Tahun);
});

function getData($tahun) {
    $('#body-tabel-1').html('<tr class="animated fadeIn"><td colspan="14" class="text-center"><img src="../file/app/loading-2.gif" alt=""></td></tr>');

    $.ajax({
        url: 'getData/' + $tahun,
        type: 'POST',
        // dataType: 'JSON',
        success: function (result) {
            $('.tabel-1').DataTable().destroy(); //Id Tabel
            $('#body-tabel-1').html(''); //Id Tabel Body

            $('#body-tabel-1').html(result);
            $('.tabel-1').DataTable({
                "scrollX": true
            });
        }
    });
}
