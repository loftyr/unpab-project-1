var method_1;
const modal_1 = $('#modal-1');
const judulModal_1 = $('#title-modal-1');
const btnSave_1 = $('#btnSave-1');
const clickSave_1 = document.querySelector('#btnSave-1');

$('#Tahun').on('change', function () {
    var Tahun = document.getElementById("Tahun").value;
    getData(Tahun);
});

$(document).ready(function () {
    $('.tabel-1').DataTable({
        "scrollX": true
    });

    $('.tgl-picker').datepicker({ dateFormat: 'yy-mm-dd', maxDate: '0' });

    var Tahun = document.getElementById("Tahun").value;
    getData(Tahun);

    $('#modal-1').on('hidden.bs.modal', function (e) {
        $(this).find('#form-1').trigger('reset');
    });
});

//CRUD
//Create and Update
$(document).on('click', '#btnAdd-1', function () {
    method_1 = 'tambah';
    judulModal_1.html("Tambah Data Kegiatan Unit/Instansi");
    btnSave_1.html("Save Data");
    modal_1.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_1.modal("show");
});

$(document).on('click', '.btnEdit', function () {
    method_1 = 'edit';
    judulModal_1.html("Edit Kegiatan");
    btnSave_1.html("Save Change");
    modal_1.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_1.modal("show");

    var edit_id = $(this).attr('dataID');

    $.ajax({
        url: 'getEditPenelitian',
        data: { id: edit_id },
        type: 'POST',
        dataType: 'JSON',
        success: function (result) {
            $('#id').val(result[0].Id);
            $('#Tahun-1').val(result[0].Tahun);
            $('#Nama-Keg').val(result[0].Nama_Keg);
            $('#Tingkat').val(result[0].Tingkat_Forum);
            $('#Prodi').val(result[0].Kd_Fakultas + '.' + result[0].Kd_Prodi);
            $('#Mitra').val(result[0].Mitra);
            $('#Tempat').val(result[0].Tempat);
            $('#Tgl-Start').val(result[0].Tgl_Start);
            $('#Tgl-End').val(result[0].Tgl_End);
            $('#Narasumber').val(result[0].Narasumber);
        }
    });
});

clickSave_1.addEventListener('click', function (event) {
    event.preventDefault();
    var url;
    var base_url = $('#form-1').attr('link');
    var form = document.querySelector("#form-1");

    if (method_1 == 'tambah') {
        url = 'savePenelitian';
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
                    type: 'info',
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
        var id = result[index].Id;
        var Tahun = result[index].Tahun;
        var Tingkat_Forum = result[index].Tingkat_Forum;
        var Nama_Keg = result[index].Nama_Keg;
        var Nama_Prodi = result[index].Nama_Prodi;
        var Mitra = result[index].Mitra;
        var Tempat = result[index].Tempat;
        var Tgl_Start = result[index].Tgl_Start;
        var Tgl_End = result[index].Tgl_End;
        var Narasumber = result[index].Narasumber;

        no += 1;

        var output = '<tr>';
        output += '<td>' + no + '</td>';
        output += '<td>' + Tingkat_Forum + '</td>';
        output += '<td>' + Nama_Keg + '</td>';
        output += '<td>' + Nama_Prodi + '</td>';
        output += '<td>' + Mitra + '</td>';
        output += '<td>' + Tempat + '</td>';
        output += '<td>' + Tgl_Start + '</td>';
        output += '<td>' + Tgl_End + '</td>';
        output += '<td>' + Narasumber + '</td>';
        output += '<td class="text-center">';
        output += '<button dataID="' + id + '" class="btn btn-danger btn-sm btnHapus mr-1"  id="btnHapus" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i></button>';
        output += '<button dataID="' + id + '" class="btn btn-info btn-sm btnEdit" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-edit"></i></button>';
        output += '</td>';
        output += '</tr>';

        $('#body-tabel-1').append(output);
    }
    $('.tabel-1').DataTable({
        "scrollX": true
    });
}

function getData($tahun) {
    $('#body-tabel-1').html('<tr class="animated fadeIn"><td colspan="10" class="text-center"><img src="../file/app/loading-2.gif" alt=""></td></tr>');

    $.ajax({
        url: 'getDataPenelitian/' + $tahun,
        type: 'POST',
        dataType: 'JSON',
        success: function (result) {
            $('.tabel-1').DataTable().destroy(); //Id Tabel
            $('#body-tabel-1').html(''); //Id Tabel Body
            draw_data(result);
        }
    });
}

// Delete
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