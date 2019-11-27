var method_1, method_2;
var Id_Karya = 0;
const modal_1 = $('#modal-1');
const modal_2 = $('#modal-2');
const judulModal_1 = $('#title-modal-1');
const judulModal_2 = $('#title-modal-2');
const btnSave_1 = $('#btnSave-1');
const btnSave_2 = $('#btnSave-2');
const clickSave_1 = document.querySelector('#btnSave-1');
const clickSave_2 = document.querySelector('#btnSave-2');
const add_2 = document.querySelector('#btnAdd-2');

$(document).on('click', '.btnLihat', function () {
    $('#nav-2').tab('show');

    Id_Karya = $(this).attr('dataID'); //Id Buku
    $('#Id_Karya').val(Id_Karya);

    console.log(Id_Karya);
    loadData(Id_Karya);
});

$('#Tahun').on('change', function () {
    var Tahun = document.getElementById("Tahun").value;
    getData(Tahun);
});

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

$(document).ready(function () {
    $('.tabel-1').DataTable({
        "scrollX": true
    });

    $('.tabel-2').DataTable();

    var Tahun = document.getElementById("Tahun").value;
    getData(Tahun);

    $('#modal-1').on('hidden.bs.modal', function (e) {
        $(this).find('#form-1').trigger('reset');
    });

    $('#modal-2').on('hidden.bs.modal', function (e) {
        $(this).find('#form-2').trigger('reset');
    });
});

//CRUD
// Cread and Update
$(document).on('click', '#btnAdd-1', function () {
    method_1 = 'tambah';
    judulModal_1.html("Tambah Karya Ilmiah");
    btnSave_1.html("Save Data");
    modal_1.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_1.modal("show");
});

$(document).on('click', '.btnEdit-1', function () {
    method_1 = 'edit';
    judulModal_1.html("Edit Karya Ilmiah");
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
            $('#id').val(result[0].Id_Karya);
            $('#Tahun-1').val(result[0].Tahun);
            $('#Nidn').val(result[0].Nidn);
            $('#Nama').val(result[0].Nama);
            $('#Status').val(result[0].Status);
            $('#Judul').val(result[0].Judul);
            $('#Forum').val(result[0].Forum);
            $('#Institusi').val(result[0].Institusi);
            $('#Tempat').val(result[0].Tempat);
            $('#Halaman').val(result[0].Halaman);
            $('#Publikasi').val(result[0].Publikasi);
        }
    });
});

$(document).on('click', '#btnAdd-2', function () {
    method_2 = 'tambah';
    judulModal_2.html("Tambah Penulis");
    btnSave_2.html("Save Data");
    $('#Id_Karya').attr(Id_Karya);
    modal_2.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_2.modal("show");
});

$(document).on('click', '.btnEdit-2', function () {
    method_2 = 'edit';
    judulModal_2.html("Edit Penulis Karya Ilmiah Penelitian");
    btnSave_2.html("Save Change");
    modal_2.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_2.modal("show");

    var edit_id = $(this).attr('dataID');

    $.ajax({
        url: 'getEditPenulis',
        data: { id: edit_id },
        type: 'POST',
        dataType: 'JSON',
        success: function (result) {
            $('#id-2').val(result[0].Id);
            $('#Id_Karya').val(result[0].Id_Karya);
            $('#Tahun-2').val(result[0].Tahun);
            $('#Nama_Penulis').val(result[0].Nama_Penulis);
            $('#Urut').val(result[0].Urut);
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

clickSave_2.addEventListener('click', function () {
    var url;
    var base_url = $('#form-2').attr('link');
    var form = document.querySelector("#form-2");

    if (method_2 == 'tambah') {
        url = 'save2';
    } else {
        url = 'saveEdit2';
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
                        loadData(Id_Karya);
                    }
                })
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    });
});

//Read 
function draw_data(result) {
    var no = 0;

    for (index in result) {
        var id = result[index].Id_Karya;
        var Tahun = result[index].Tahun;
        var Nidn = result[index].Nidn;
        var Nama = result[index].Nama;
        var Status = result[index].Status;
        var Judul = result[index].Judul;
        var Forum = result[index].Forum;
        var Institusi = result[index].Institusi;
        var Halaman = result[index].Halaman;
        var Tempat = result[index].Tempat;
        var Doc = result[index].Dokumen;

        no += 1;

        var output = '<tr>';
        output += '<td>' + no + '</td>';
        output += '<td>' + Nidn + '</td>';
        output += '<td>' + Nama + '</td>';
        output += '<td>' + Status + '</td>';
        output += '<td>' + Judul + '</td>';
        output += '<td>' + Forum + '</td>';
        output += '<td>' + Institusi + '</td>';
        output += '<td>' + Halaman + '</td>';
        output += '<td>' + Tempat + '</td>';
        if (Doc == null) {
            output += '<td><a title="No Link">PDF</a></td>';
        } else {
            output += '<td><a href="../file/upload/documents/document karya ilmiah/' + Doc + '" target="_blank">PDF</a></td>';
        }
        output += '<td class="text-center">';
        output += '<button dataID="' + id + '" class="btn btn-danger btn-sm btnHapus mr-1"  data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i></button>';
        output += '<button dataID="' + id + '" class="btn btn-info btn-sm btnLihat mr-1"  data-toggle="tooltip" data-placement="buttom" title="Lihat"><i class="fas fa-book"></i></button>';
        output += '<button dataID="' + id + '" class="btn btn-info btn-sm btnEdit-1"  data-toggle="tooltip" data-placement="buttom" title="Lihat"><i class="fas fa-edit"></i></button>';
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
        var Id_Karya = result[index].Id_Karya;
        var Tahun = result[index].Tahun;
        var Nama = result[index].Nama_Penulis;
        var Urut = result[index].Urut;

        no += 1;

        var output = '<tr>';
        output += '<td>' + no + '</td>';
        output += '<td>' + Id_Karya + '</td>';
        output += '<td>' + Nama + '</td>';
        output += '<td>' + Urut + '</td>';
        output += '<td>';
        output += '<button dataID="' + Id + '" class="btn btn-danger btn-sm mb-1 btnHapus-2 mr-1"> <i class="fa fa-trash"></i></button>';
        output += '<button dataID="' + Id + '" class="btn btn-info btn-sm mb-1 btnEdit-2"> <i class="fa fa-edit"></i></button>';
        output += '</td>'
        output += '</tr>'

        $('#body-tabel-2').append(output);
    }

    $('.tabel-2').DataTable();
}

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

function loadData(Id_Karya) {
    $('#body-tabel-2').html('<tr class="animated fadeIn"><td colspan="5" class="text-center"><img src="../file/app/loading-2.gif" alt=""></td></tr>');

    $.ajax({
        url: 'getPenulis/',
        data: { Id_Karya: Id_Karya },
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

            $.ajax({
                url: "deleteDataPenulis/" + id,
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
                                loadData(Id_Karya);
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
                                loadData(Id_Karya);
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