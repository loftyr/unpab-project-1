var method_1;
var Kd_Jurnal = 0;
const modal_1 = $('#modal-1');
const modal_2 = $('#modal-2');
const judulModal_1 = $('#title-modal-1');
const judulModal_2 = $('#title-modal-2');
const btnSave_1 = $('#btnSave-1');
const btnSave_2 = $('#btnSave-2');
const clickSave_1 = document.querySelector('#btnSave-1');
const clickSave_2 = document.querySelector('#btnSave-2');
const add_2 = document.querySelector('#btnAdd-2');

$(document).on('keypress', '#Nidn', function (e) {
    if (e.keyCode === 13) {
        var id = $('#Nidn').val();

        $.ajax({
            type: "POST",
            url: "../penelitian/ceknidn",
            data: { nidn: id },
            dataType: "JSON",
            success: function (result) {
                if (result.status == true) {
                    $('#result-cek').text(result.ket);
                    $('#Nama').val(result.data);
                } else {
                    $('#result-cek').text(result.ket);
                    $('#Nama').val('');
                }
            },
            error: function (xhr, stat, err) {
                console.log('Tidak Diketahui');
            }
        });
    }
});

$(document).on('keyup', '#Nidn', function (e) {
    var id = $('#Nidn').val();
    if (id == '') {
        $('#result-cek').text('');
        $('#Nama').val('');
    }
});

function draw_data(result) {
    var no = 0;

    for (index in result) {
        var id = result[index].Kd_Jurnal;
        var Tahun = result[index].Tahun;
        var Judul = result[index].Judul;
        var Jurnal = result[index].Jurnal;
        var ISSN = result[index].ISSN;
        var Volume = result[index].Volume;
        var Nomor = result[index].Nomor;
        var Halaman = result[index].Halaman;
        var URL = result[index].Url;
        var Doc = result[index].Dokumen;

        no += 1;

        var output = '<tr>';
        output += '<td>' + no + '</td>';
        output += '<td>' + Judul + '</td>';
        output += '<td>' + Jurnal + '</td>';
        output += '<td>' + ISSN + '</td>';
        output += '<td>' + Volume + '</td>';
        output += '<td>' + Nomor + '</td>';
        output += '<td>' + Halaman + '</td>';
        output += '<td>' + URL + '</td>';
        if (Doc == null) {
            output += '<td><a title="No Link">PDF</a></td>';
        } else {
            output += '<td><a href="../file/upload/documents/document jurnal/' + Doc + '" target="_blank">PDF</a></td>';
        }
        output += '<td class="text-center">';
        output += '<button dataID="' + id + '" class="btn btn-danger btn-sm btnHapus-1 mr-2"  data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i></button>';
        output += '<button dataID="' + id + '" class="btn btn-info btn-sm btnEdit-1"  data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-edit"></i></button>';
        output += '<button dataID="' + id + '" class="btn btn-info btn-sm btnLihat"  data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-book"></i></button>';
        output += '</td>';
        output += '</tr>';

        $('#body-tabel-1').append(output);
    }
    $('.tabel-1').DataTable({
        "scrollX": true
    });
}

function draw_data_2(result) {
    var no = 0;

    for (index in result) {
        var Id = result[index].Id;
        var Kd_Jurnal = result[index].Kd_Jurnal;
        var Nidn = result[index].Nidn;
        var Tahun = result[index].Tahun;
        var Nama = result[index].Nama;

        no += 1;

        var output = '<tr>';
        output += '<td>' + no + '</td>';
        output += '<td>' + Kd_Jurnal + '</td>';
        output += '<td>' + Nidn + '</td>';
        output += '<td>' + Nama + '</td>';
        output += '<td>';
        output += '<div class="row"><div class="col-sm-12"><button dataID="' + Id + '" Kd_Jurnal="' + Kd_Jurnal + '" class="btn btn-danger btn-sm mb-1 btnHapus-2"> <i class="fa fa-trash"></i></button></div></div>';
        output += '</td>'
        output += '</tr>'

        $('#body-tabel-2').append(output);
    }

    $('.tabel-2').DataTable();
}

$(document).on('click', '#btnAdd-1', function () {
    method_1 = 'tambah';
    judulModal_1.html("Tambah Data Pedoman LPPM");
    btnSave_1.html("Save Data");
    modal_1.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_1.modal("show");
});

$(document).on('click', '.btnEdit-1', function () {
    method_1 = 'edit';
    judulModal_1.html("Edit Jurnal Penelitian");
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
            $('#id').val(result[0].Kd_Jurnal);
            $('#Judul').val(result[0].Judul);
            $('#Tahun-1').val(result[0].Tahun);
            $('#Jurnal').val(result[0].Jurnal);
            $('#ISSN').val(result[0].ISSN);
            $('#Volume').val(result[0].Volume);
            $('#No').val(result[0].Nomor);
            $('#Halaman').val(result[0].Halaman);
            $('#Url').val(result[0].Url);
            $('#Publikasi').val(result[0].Publikasi);
        }
    });
});

$(document).on('click', '#btnAdd-2', function () {
    method_2 = 'tambah';
    judulModal_2.html("Tambah Penulis");
    btnSave_2.html("Save Data");
    $('#Kd_Jurnal').attr(Kd_Jurnal);
    modal_2.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_2.modal("show");
});

$('#Tahun').on('change', function () {
    var Tahun = document.getElementById("Tahun").value;
    getData(Tahun);
});

function getData($tahun) {
    $('#body-tabel-1').html('<tr class="animated fadeIn"><td colspan="11" class="text-center"><img src="../file/app/loading-2.gif" alt=""></td></tr>');

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

function loadData(Kd_Jurnal) {
    $('#body-tabel-2').html('<tr class="animated fadeIn"><td colspan="4" class="text-center"><img src="../file/app/loading-2.gif" alt=""></td></tr>');

    $.ajax({
        url: 'getPenulis/',
        data: { Kd_Jurnal: Kd_Jurnal },
        type: 'POST',
        dataType: 'JSON',
        success: function (result) {
            $('.tabel-2').DataTable().destroy(); //Id Tabel
            $('#body-tabel-2').html(''); //Id Tabel Body

            if (result == null) {
                $('#body-tabel-2').html('');
            } else {
                add_2.disabled = false;
                draw_data_2(result);
            }
        }
    });
};

$(document).ready(function () {
    $('.tabel-1').DataTable({
        "scrollX": true
    });
    $('.tabel-2').DataTable();

    $('.nav-link').on('click', function () {
        add_2.disabled = true;
    });

    var Tahun = document.getElementById("Tahun").value;
    getData(Tahun);

    $('#modal-1').on('hidden.bs.modal', function (e) {
        $(this).find('#form-1').trigger('reset');
    });

    $('#modal-2').on('hidden.bs.modal', function (e) {
        $(this).find('#form-2').trigger('reset');
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

$(document).on('click', '.btnHapus-1', function () {
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

$(document).on('click', '.btnHapus-2', function () {
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
            var Kd_Jurnal = $(this).attr('Kd_Jurnal');

            $.ajax({
                url: "deletePenulis/" + id,
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
                                loadData(Kd_Jurnal);
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
                                loadData(Kd_Jurnal);
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

$(document).on('click', '.btnLihat', function () {
    $('#nav-2').tab('show');

    Kd_Jurnal = $(this).attr('dataID'); //Kd_Jurnal
    $('#Kd_Jurnal').val(Kd_Jurnal);
    loadData(Kd_Jurnal);
});

clickSave_2.addEventListener('click', function () {
    var url;
    var base_url = $('#form-2').attr('link');
    var form = document.querySelector("#form-2");

    if (method_2 == 'tambah') {
        url = 'savePenulis';
    } else {
        url = 'saveEditPenulis';
    }

    clickSave_2.disabled = true;

    $.ajax({
        url: url,
        data: new FormData(form),
        type: "POST",
        dataType: "JSON",
        processData: false,
        contentType: false,
        cache: false,
        success: function (result) {
            clickSave_2.disabled = false;

            if (result.Status == false) {
                Swal.fire({
                    position: 'top-end',
                    type: 'error',
                    title: result.Msg,
                    showConfirmButton: false,
                    timer: 1500
                })
            } else {
                modal_2.modal("hide");

                Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: result.Msg,
                    showConfirmButton: false,
                    timer: 1500
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        loadData(Kd_Jurnal);
                    }
                })
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    });
});