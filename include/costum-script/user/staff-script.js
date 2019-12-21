var method_1;
const modal_1 = $('#modal-1');
const judulModal_1 = $('#title-modal-1');
const btnSave_1 = $('#btnSave');
const clickSave_1 = document.querySelector('#btnSave');

$('#Nip').on('focusout', function () {
    cekNik = document.getElementById("Nip").value;
    if (cekNik == "" || cekNik == null) {
        $('#result-cek').text('Harap isi form ini !!!');
        clickSave_1.disabled = true;
    } else {
        $.ajax({
            type: "POST",
            url: "../penelitian/ceknik",
            data: { nik: cekNik },
            dataType: "JSON",
            success: function (result) {
                if (result.status == true) {
                    clickSave_1.disabled = true;
                    $('#result-cek').text('NIK Telah Digunakan pada Nama ' + result.data);
                } else {
                    clickSave_1.disabled = false;
                    $('#result-cek').text(null);
                }
            },
            error: function (xhr, stat, err) {
                console.log('Tidak Diketahui');
            }
        });
    }

});

$('#Tahun').on('change', function () {
    var Tahun = document.getElementById("Tahun").value;
    getDataPegawai(Tahun);
})

$(document).ready(function () {
    $('.tabel-1').DataTable();

    var Tahun = document.getElementById("Tahun").value;
    getDataPegawai(Tahun);

    $('#modal-1').on('hidden.bs.modal', function (e) {
        $(this).find('#form').trigger('reset');
        $('#result-cek').text('');
        clickSave_1.disabled = false;
    });
});

// CRUD
// Create or Update
$(document).on('click', '#btnAdd', function () {
    method_1 = 'tambah';
    judulModal_1.html("Tambah Pegawai");
    btnSave_1.html("Save Data");
    modal_1.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_1.modal("show");
})

$(document).on('click', '.btnEdit', function () {
    method = 'edit';
    judulModal_1.html("Edit Data Pegawai");
    btnSave_1.html("Save Change");
    modal_1.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_1.modal("show");

    var edit_id = $(this).attr('dataID');

    $.ajax({
        url: 'getEditPegawai',
        data: { id: edit_id },
        type: 'POST',
        dataType: 'JSON',
        success: function (result) {
            $('#id').val(result[0].id);
            $('#Nip').val(result[0].Nip);
            $('#Tahun-1').val(result[0].Tahun);
            $('#Nama_Pegawai').val(result[0].Nama);
            $('#Jk').val(result[0].Jk);
            $('#Jabatan').val(result[0].Jabatan);
            $('#Unit').val(result[0].Unit);
            $('#Pendidikan').val(result[0].Jenjang);
        }
    });
});

clickSave_1.addEventListener('click', function (event) {
    event.preventDefault();
    var url;
    var base_url = $('#form').attr('link');
    var form = document.querySelector("#form");

    if (method_1 == 'tambah') {
        url = 'save';
    } else {
        url = 'saveEdit';
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
                        getDataPegawai(Tahun);
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
        var id = result[index].id;
        var Tahun = result[index].Tahun;
        var Nip = result[index].Nip;
        var Nama = result[index].Nama;
        var Jk = result[index].Jk;
        var Jabatan = result[index].Jabatan;
        var Unit = result[index].Unit;
        var Jenjang = result[index].Jenjang;

        no += 1;

        var output = '<tr>';
        output += '<td>' + no + '</td>';
        output += '<td>' + Nip + '</td>';
        output += '<td>' + Nama + '</td>';
        output += '<td>' + Jk + '</td>';
        output += '<td>' + Jabatan + '</td>';
        output += '<td>' + Unit + '</td>';
        output += '<td>' + Jenjang + '</td>';
        output += '<td class="text-center">';
        output += '<button dataID="' + id + '" class="btn btn-danger btn-sm btnHapus mr-1" title="Hapus"><i class="fas fa-trash"></i></button>';
        output += '<button dataID="' + id + '" class="btn btn-info btn-sm btnEdit" title="Edit"><i class="fas fa-edit"></i></button>';
        output += '</td>';
        output += '</tr>';

        $('#body-tabel-1').append(output);
    }
    $('.tabel-1').DataTable();
}

function getDataPegawai($tahun) {
    $('#body-tabel-1').html('<tr class="animated fadeIn"><td colspan="8" class="text-center"><img src="../file/app/loading-2.gif" alt=""></td></tr>');

    $.ajax({
        url: 'getDataPegawai/' + $tahun,
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
                                getDataPegawai(Tahun);
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
                                getDataPegawai(Tahun);
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