var method_1, method_2;
const modal_1 = $('#modal-1');
const modal_2 = $('#modal-2');
const judulModal_1 = $('#title-modal-1');
const judulModal_2 = $('#title-modal-2');
const btnSave_1 = $('#btnSave-1');
const btnSave_2 = $('#btnSave-2');
const clickSave_1 = document.querySelector('#btnSave-1');
const clickSave_2 = document.querySelector('#btnSave-2');
const add_2 = document.querySelector('#btnAdd-2');

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
        output += '<button dataID="' + id + '" class="btn btn-danger btn-sm btnHapus-1" title="Hapus"><i class="fas fa-trash"></i></button>';
        output += '<button dataID="' + id + '" class="btn btn-info btn-sm btnEdit-1" title="Edit"><i class="fas fa-edit"></i></button>';
        output += '</td>';
        output += '</tr>';

        $('#body-tabel-1').append(output);
    }
    $('.tabel-1').DataTable();
}

function draw_data_2(result) {
    var no = 0;

    for (index in result) {
        var id = result[index].id;
        var Tahun = result[index].Tahun;
        var Nidn = result[index].Nidn;
        var Nama = result[index].Nama;
        var Jk = result[index].Jk;
        var Nama_Prodi = result[index].Nama_Prodi;
        var Jenjang = result[index].Jenjang;

        no += 1;

        var output = '<tr>';
        output += '<td>' + no + '</td>';
        output += '<td>' + Nidn + '</td>';
        output += '<td>' + Nama + '</td>';
        output += '<td>' + Jk + '</td>';
        output += '<td>' + Nama_Prodi + '</td>';
        output += '<td>' + Jenjang + '</td>';
        output += '<td class="text-center">';
        output += '<button dataID="' + id + '" class="btn btn-danger btn-sm btnHapus-2" title="Hapus"><i class="fas fa-trash"></i></button>';
        output += '<button dataID="' + id + '" class="btn btn-info btn-sm btnEdit-2" title="Edit"><i class="fas fa-edit"></i></button>';
        output += '</td>';
        output += '</tr>';

        $('#body-tabel-2').append(output);
    }
    $('.tabel-2').DataTable();
}

$(document).on('click', '#btnAdd-1', function () {
    method_1 = 'tambah';
    judulModal_1.html("Tambah Pegawai");
    btnSave_1.html("Save Data");
    modal_1.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_1.modal("show");
})

$(document).on('click', '#btnAdd-2', function () {
    method_2 = 'tambah';
    judulModal_2.html("Tambah Dosen");
    btnSave_2.html("Save Data");
    modal_2.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_2.modal("show");
})

function getDataPegawai($tahun) {
    $('#body-tabel-1').html('<tr class="animated fadeIn"><td colspan="8" class="text-center"><img src="file/app/loading-2.gif" alt=""></td></tr>');

    $.ajax({
        url: 'Sumberdayalppm/getDataPegawai/' + $tahun,
        type: 'POST',
        dataType: 'JSON',
        success: function (result) {
            $('.tabel-1').DataTable().destroy(); //Id Tabel
            $('#body-tabel-1').html(''); //Id Tabel Body
            draw_data(result);
        }
    });
}

function getDataDosen($tahun) {
    $('#body-tabel-2').html('<tr class="animated fadeIn"><td colspan="7" class="text-center"><img src="file/app/loading-2.gif" alt=""></td></tr>');

    $.ajax({
        url: 'Sumberdayalppm/getDataDosen/' + $tahun,
        type: 'POST',
        dataType: 'JSON',
        success: function (result) {
            $('.tabel-2').DataTable().destroy(); //Id Tabel
            $('#body-tabel-2').html(''); //Id Tabel Body
            draw_data_2(result);
        }
    });
}

$('#Tahun').on('change', function () {
    var Tahun = document.getElementById("Tahun").value;
    getDataPegawai(Tahun);
    getDataDosen(Tahun);
})

$(document).ready(function () {
    $('.tabel-1').DataTable();
    $('.tabel-2').DataTable();

    var Tahun = document.getElementById("Tahun").value;
    getDataPegawai(Tahun);
    getDataDosen(Tahun);

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
        url = base_url + 'Sumberdayalppm/save';
    } else {
        url = base_url + 'Sumberdayalppm/saveEdit';
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

clickSave_2.addEventListener('click', function (event) {
    event.preventDefault();
    var url;
    var base_url = $('#form-2').attr('link');
    var form = document.querySelector("#form-2");

    if (method_2 == 'tambah') {
        url = base_url + 'Sumberdayalppm/save2';
    } else {
        url = base_url + 'Sumberdayalppm/saveEdit2';
    }

    $('.progress').show();
    clickSave_2.disabled = true;

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
                        var Tahun = document.getElementById("Tahun").value;
                        getDataDosen(Tahun);
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
                url: "Sumberdayalppm/deleteData/" + id,
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
            var Id_Dosen = $(this).attr('dataID');
            // console.log(Id_Dosen);
            $.ajax({
                url: "Sumberdayalppm/deleteData/" + Id_Dosen,
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
                                getDataDosen(Tahun);
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
                                getDataDosen(Tahun);
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