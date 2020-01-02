var method_1, method_2;
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
                    $('#Pencipta').val(result.data);
                } else {
                    $('#result-cek').text(result.ket);
                    $('#Pencipta').val('');
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
        $('#Pencipta').val('');
    }
});

$(document).on('click', '.btnLihat', function () {
    $('#nav-2').tab('show');

    Id_Buku = $(this).attr('dataID'); //Id Buku
    $('#Id-Buku').val(Id_Buku);

    loadData(Id_Buku);
});

$(document).ready(function () {
    $('.tabel-1').DataTable();
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


// CRUD
// Create and Update
$(document).on('click', '#btnAdd-1', function () {
    method_1 = 'tambah';
    judulModal_1.html("Tambah Buku Ajar/Teks");
    btnSave_1.html("Save Data");
    modal_1.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_1.modal("show");
});

$(document).on('click', '.btnEdit-1', function () {
    method_1 = 'edit';
    judulModal_1.html("Edit Buku Ajar / Teks Penelitian");
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
            $('#id').val(result[0].Id_Buku);
            $('#Judul').val(result[0].Judul);
            $('#Tahun-1').val(result[0].Tahun);
            $('#Isbn').val(result[0].ISBN);
            $('#Penerbit').val(result[0].Penerbit);
            $('#Jml_Hal').val(result[0].Jml_Hal);
            $('#Nidn').val(result[0].Nidn);
            $('#Halaman').val(result[0].Halaman);
            $('#Pencipta').val(result[0].Pencipta);
        }
    });
});

$(document).on('click', '#btnAdd-2', function () {
    method_2 = 'tambah';
    judulModal_2.html("Tambah Penulis Buku Ajar / Teks Penelitian");
    btnSave_2.html("Save Data");
    $('#Id_Buku').attr(Id_Buku);
    modal_2.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_2.modal("show");
});

$(document).on('click', '.btnEdit-2', function () {
    method_2 = 'edit';
    judulModal_2.html("Edit Penulis Buku Ajar / Teks Penelitian");
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
            $('#Id-Buku').val(result[0].Id_Buku);
            $('#Tahun-2').val(result[0].Tahun);
            $('#Nama').val(result[0].Nama);
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
                        loadData(Id_Buku);
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
        var id = result[index].Id_Buku;
        var Tahun = result[index].Tahun;
        var Nidn = result[index].Nidn;
        var Pencipta = result[index].Pencipta;
        var Judul = result[index].Judul;
        var ISBN = result[index].ISBN;
        var Jml_Hal = result[index].Jml_Hal;
        var Penerbit = result[index].Penerbit;
        var Doc = result[index].Dokumen;

        no += 1;

        var output = '<tr>';
        output += '<td>' + no + '</td>';
        output += '<td>' + Nidn + '</td>';
        output += '<td>' + Pencipta + '</td>';
        output += '<td>' + Judul + '</td>';
        output += '<td>' + ISBN + '</td>';
        output += '<td>' + Jml_Hal + '</td>';
        output += '<td>' + Penerbit + '</td>';
        if (Doc == null) {
            output += '<td><a title="No Link">PDF</a></td>';
        } else {
            output += '<td><a href="file/upload/documents/document buku/' + Doc + '" target="_blank">PDF</a></td>';
        }
        output += '<td class="text-center">';
        output += '<button dataID="' + id + '" class="btn btn-danger btn-sm btnHapus-1 mr-2"><i class="fas fa-trash"></i></button>';
        output += '<button dataID="' + id + '" class="btn btn-info btn-sm btnLihat mr-2"><i class="fas fa-book"></i></button>';
        output += '<button dataID="' + id + '" class="btn btn-info btn-sm btnEdit-1"><i class="fas fa-edit"></i></button>';
        output += '</td>';
        output += '</tr>';

        $('#body-tabel-1').append(output);
    }
    $('.tabel-1').DataTable();
}

function draw_data_2(result) {
    var no = 0;

    for (index in result) {
        var Id = result[index].Id;
        var Id_Buku = result[index].Id_Buku;
        var Tahun = result[index].Tahun;
        var Nama = result[index].Nama;
        var Urut = result[index].Urut;

        no += 1;

        var output = '<tr>';
        output += '<td>' + no + '</td>';
        output += '<td>' + Id_Buku + '</td>';
        output += '<td>' + Nama + '</td>';
        output += '<td>' + Urut + '</td>';
        output += '<td>';
        output += '<button Id-Buku="' + Id_Buku + '" dataID="' + Id + '" class="btn btn-info btn-sm btnEdit-2 mr-2"><i class="fas fa-edit"></i></button>';
        output += '<button Id-Buku="' + Id_Buku + '" dataID="' + Id + '" class="btn btn-danger btn-sm btnHapus-2 mr-2"><i class="fas fa-trash"></i></button>';
        output += '</td>'
        output += '</tr>'

        $('#body-tabel-2').append(output);
    }

    $('.tabel-2').DataTable();
}

function getData($tahun) {
    $('#body-tabel-1').html('<tr class="animated fadeIn"><td colspan="9" class="text-center"><img src="../file/app/loading-2.gif" alt=""></td></tr>');

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

function loadData(Id_Buku) {
    $('#body-tabel-2').html('<tr class="animated fadeIn"><td colspan="5" class="text-center"><img src="../file/app/loading-2.gif" alt=""></td></tr>');

    $.ajax({
        url: 'getPenulis/',
        data: { Id_Buku: Id_Buku },
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
            var Id_Buku = $(this).attr('Id-Buku');

            $.ajax({
                url: "deleteData2/" + id,
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
                                loadData(Id_Buku);
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
                                loadData(Id_Buku);
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