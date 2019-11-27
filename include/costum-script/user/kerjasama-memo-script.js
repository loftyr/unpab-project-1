var method_1;
const modal_1 = $('#modal-1');
const judulModal_1 = $('#title-modal-1');
const btnSave_1 = $('#btnSave-1');
const clickSave_1 = document.querySelector('#btnSave-1');


/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

$('#Tahun').on('change', function () {
    var Tahun = document.getElementById("Tahun").value;
    getData(Tahun);
});

$(document).ready(function () {
    $('.tabel-1').DataTable();

    var Tahun = document.getElementById("Tahun").value;
    getData(Tahun);

    $('#modal-1').on('hidden.bs.modal', function (e) {
        $(this).find('#form-1').trigger('reset');
    })

    $('.uang').mask('000.000.000.000.000', { reverse: true });
    var count = 0;

});



//CRUD
// Create and Update
$(document).on('click', '#btnAdd-1', function () {
    method_1 = 'tambah';
    judulModal_1.html("Tambah Perjanjian Kontrak");
    btnSave_1.html("Save Data");
    modal_1.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_1.modal("show");
});

$(document).on('click', '.btnEdit', function () {
    method = 'edit';
    judulModal_1.html("Edit Kerjasama MoU/MoA");
    btnSave_1.html("Save Change");
    modal_1.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_1.modal("show");

    var edit_id = $(this).attr('dataID');

    $.ajax({
        url: 'getEditMemo',
        data: { id: edit_id },
        type: 'POST',
        dataType: 'JSON',
        success: function (result) {
            $('#id').val(result[0].Id);
            $('#Tahun-1').val(result[0].Tahun);
            $('#Unit').val(result[0].Unit);
            $('#Nama_Keg').val(result[0].Nama_Keg);
            $('#Institusi_Mitra').val(result[0].Institusi_Mitra);
            $('#No_Kontrak').val(result[0].No_Kontrak);
            $('#Nilai').val(formatRupiah(result[0].Nilai_Kontrak, null));
        }
    });
});

clickSave_1.addEventListener('click', function (event) {
    event.preventDefault();
    var url;
    var base_url = $('#form-1').attr('link');
    var form = document.querySelector("#form-1");

    if (method_1 == 'tambah') {
        url = 'saveMemo';
    } else {
        url = 'saveEditData';
    }

    $('.progress').show();
    clickSave_1.disabled = true;

    $.ajax({
        xhr: function () {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener('progress', function (e) {
                if (e.lengthComputable) {
                    var percent = Math.round((e.loaded / e.total) * 100);

                    $('.progress-bar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
                }
            });
            return xhr;
        },

        url: url,
        data: new FormData(form),
        type: "POST",
        dataType: "JSON",
        processData: false,
        contentType: false,
        cache: false,
        success: function (result) {

            $('.progress').hide();
            clickSave_1.disabled = false;

            if (result.Status == false) {
                Swal.fire({
                    position: 'top-end',
                    type: 'error',
                    title: result.Msg,
                    showConfirmButton: false,
                    timer: 1500
                })
            } else {
                modal_1.modal("hide");

                Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: result.Msg,
                    showConfirmButton: false,
                    timer: 1500
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        var Tahun = document.getElementById("Tahun").value;
                        getData(Tahun);
                    }
                })
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    });
});

// Read
function draw_data(result) {
    var no = 0;

    for (index in result) {
        var Id = result[index].Id;
        var Tahun = result[index].Tahun;
        var Unit = result[index].Unit;
        var Nama_Keg = result[index].Nama_Keg;
        var Institusi_Mitra = result[index].Institusi_Mitra;
        var No_Kontrak = result[index].No_Kontrak;
        var Nilai_Kontrak = result[index].Nilai_Kontrak;
        var Doc = result[index].Dokumen;

        no += 1;

        var output = '<tr>';
        output += '<td>' + no + '</td>';
        output += '<td>' + Unit + '</td>';
        output += '<td>' + Nama_Keg + '</td>';
        output += '<td>' + Institusi_Mitra + '</td>';
        output += '<td>' + No_Kontrak + '</td>';
        output += '<td>' + formatRupiah(Nilai_Kontrak, "Rp. ") + '</td>';
        if (Doc == null) {
            output += '<td><a title="No Link">PDF</a></td>';
        } else {
            output += '<td><a href="../file/upload/documents/document kerjasama/' + Doc + '" target="_blank">PDF</a></td>';
        }
        output += '<td class="text-center">';
        output += '<button dataID="' + Id + '" class="btn btn-danger btn-sm mr-2 btnHapus"><i class="fas fa-trash"></i></button>';
        output += '<button dataID="' + Id + '" class="btn btn-info btn-sm mr-2 btnEdit"><i class="fas fa-edit"></i></button>';
        output += '</td>';
        output += '</tr>';

        $('#body-tabel-1').append(output);
    }

    $('.tabel-1').DataTable();
}

function getData($tahun) {
    $('#body-tabel-1').html('<tr class="animated fadeIn"><td colspan="8" class="text-center"><img src="../file/app/loading-2.gif" alt=""></td></tr>');

    $.ajax({
        url: 'getDataMemo/' + $tahun,
        type: 'POST',
        dataType: 'JSON',
        success: function (result) {
            $('.tabel-1').DataTable().destroy(); //Id Tabel
            $('#body-tabel-1').html(''); //Id Tabel Body
            draw_data(result);
        }
    });
}

//Delete
$(document).on('click', '.btnHapus', function () {
    var Tahun = document.getElementById("Tahun").value;

    Swal.fire({
        title: 'Are You Sure?',
        text: 'Delete This Data !!!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            var id = $(this).attr('dataID');

            $.ajax({
                url: "deleteData/" + id,
                type: 'GET',
                dataType: 'JSON',
                success: function (result) {
                    if (result.Status == true) {
                        Swal.fire({
                            position: 'top-end',
                            type: 'success',
                            title: result.Msg,
                            showConfirmButton: false,
                            timer: 1000
                        }).then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer) {
                                getData(Tahun);
                            }
                        })
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            type: 'error',
                            title: result.Msg,
                            showConfirmButton: false,
                            timer: 1000
                        }).then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer) {
                                getData(Tahun);
                            }
                        })
                    }
                }
            });

        } else {
            Swal.fire({
                position: 'top-end',
                type: 'info',
                title: 'Data will be keep . . .',
                showConfirmButton: false,
                timer: 1000
            })
        }
    })
});