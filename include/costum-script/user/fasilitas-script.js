var method;
const modal_1 = $('#modal-1');
const judulModal_1 = $('#title-modal-1');
const btnSave_1 = $('#btnSave-1');
const clickSave_1 = document.querySelector('#btnSave-1');

function draw_data(result) {
    var no = 0;

    for (index in result) {
        var id = result[index].Id;
        var Tahun = result[index].Tahun;
        var No_Surat = result[index].No_Surat;
        var Nama_Unit = result[index].Nama_Unit;
        var Fasilitas = result[index].Fasilitas;
        var Status = result[index].Status;
        var Keterangan = result[index].Keterangan;
        var Doc = result[index].Dokumen;

        no += 1;

        var output = '<tr>';
        output += '<td>' + no + '</td>';
        output += '<td>' + Nama_Unit + '</td>';
        output += '<td>' + No_Surat + '</td>';
        output += '<td>' + Fasilitas + '</td>';
        output += '<td>' + Status + '</td>';
        output += '<td>' + Keterangan.substr(0, 150) + '....</td>';
        if (Doc == null) {
            output += '<td><a title="No Link">PDF</a></td>';
        } else {
            output += '<td><a href="file/upload/documents/document fasilitas pendukung/' + Doc + '" target="_blank">PDF</a></td>';
        }
        output += '<td class="text-center">';
        output += '<button dataID="' + id + '" class="btn btn-danger btn-sm btnHapus" title="Hapus"><i class="fas fa-trash"></i></button>';
        output += '<button dataID="' + id + '" class="btn btn-info btn-sm btnEdit" title="Edit"><i class="fas fa-edit"></i></button>';
        output += '</td>';
        output += '</tr>';

        $('#body-tabel-1').append(output);
    }
    $('.tabel-1').DataTable();
}

$(document).on('click', '#btnAdd-1', function () {
    method = 'tambah';
    judulModal_1.html("Tambah Data Fasilitas Pendukung LPPM");
    btnSave_1.html("Save Data");
    modal_1.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_1.modal("show");
});

$(document).on('click', '.btnEdit', function () {
    method = 'edit';
    judulModal_1.html("Edit Fasilitas Pendukung LPPM");
    btnSave_1.html("Save Change");
    modal_1.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_1.modal("show");

    var edit_id = $(this).attr('dataID');

    $.ajax({
        url: 'Fasilitaspendukung/getEditFasilitas',
        data: { id: edit_id },
        type: 'POST',
        dataType: 'JSON',
        success: function (result) {
            $('#id').val(result[0].Id);
            $('#Tahun-1').val(result[0].Tahun);
            $('#No').val(result[0].No_Surat);
            $('#Unit').val(result[0].Nama_Unit);
            $('#Fasilitas').val(result[0].Fasilitas);
            $('#Status').val(result[0].Status);
            $('#Ket').val(result[0].Keterangan);
        }
    });
});

$('#Tahun').on('change', function () {
    var Tahun = document.getElementById("Tahun").value;
    getData(Tahun);
});

function getData($tahun) {
    $('#body-tabel-1').html('<tr class="animated fadeIn"><td colspan="7" class="text-center"><img src="file/app/loading-2.gif" alt=""></td></tr>');

    $.ajax({
        url: 'Fasilitaspendukung/getData/' + $tahun,
        type: 'POST',
        dataType: 'JSON',
        success: function (result) {
            $('.tabel-1').DataTable().destroy(); //Id Tabel
            $('#body-tabel-1').html(''); //Id Tabel Body
            draw_data(result);
        }
    });
}

$(document).ready(function () {
    $('.tabel-1').DataTable();

    var Tahun = document.getElementById("Tahun").value;
    getData(Tahun);

    $('#modal-1').on('hidden.bs.modal', function (e) {
        $(this).find('#form-1').trigger('reset');
    });
});

clickSave_1.addEventListener('click', function (event) {
    event.preventDefault();
    var url;
    var base_url = $('#form-1').attr('link');
    var form = document.querySelector("#form-1");

    if (method == 'tambah') {
        url = base_url + 'Fasilitaspendukung/save';
    } else {
        url = base_url + 'Fasilitaspendukung/saveEditFasilitas';
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
                url: "Fasilitaspendukung/deleteData/" + id,
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