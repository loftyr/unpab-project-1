$('#Tahun').on('change', function () {
    var Tahun = document.getElementById("Tahun").value;
    getDiri(Tahun);
});

$(document).ready(function () {
    $('.tabel-1').DataTable();

    var Tahun = document.getElementById("Tahun").value;
    getDiri(Tahun);
});

function getDiri($tahun) {
    $('#body-tabel-1').html('<tr class="animated fadeIn"><td colspan="14" class="text-center"><img src="../file/app/loading-2.gif" alt=""></td></tr>');

    $.ajax({
        url: 'getDiri/' + $tahun,
        type: 'POST',
        // dataType: 'JSON',
        success: function (result) {
            $('.tabel-1').DataTable().destroy(); //Id Tabel
            $('#body-tabel-1').html(''); //Id Tabel Body

            $('#body-tabel-1').html(result);
            $('.tabel-1').DataTable({
                "scrollX": true,
                dom: 'Bfrtip',
                buttons: [
                    { extend: 'print', className: 'btn btn-primary btn-sm', orientation: 'landscape', pageSize: 'LEGAL' },
                    // { extend: 'pdf', className: 'btn btn-primary btn-sm', orientation: 'landscape', pageSize: 'LEGAL' },
                    { extend: 'excel', className: 'btn btn-primary btn-sm', orientation: 'landscape', pageSize: 'LEGAL' }
                ]
            });
        }
    });
}
