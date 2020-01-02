var method_1, method_2, method_3;
var Kd_Pengabdian_1 = 0;
var Kd_Pengabdian_2 = 0;
const modal_1 = $('#modal-1');
const modal_2 = $('#modal-2');
const modal_3 = $('#modal-3');
const judulModal_1 = $('#title-modal-1');
const judulModal_2 = $('#title-modal-2');
const judulModal_3 = $('#title-modal-3');
const btnSave_1 = $('#btnSave-1');
const btnSave_2 = $('#btnSave-2');
const btnSave_3 = $('#btnSave-3');
const clickSave_1 = document.querySelector('#btnSave-1');
const clickSave_2 = document.querySelector('#btnSave-2');
const clickSave_3 = document.querySelector('#btnSave-3');
const add_2 = document.querySelector('#btnAdd-2');
const add_3 = document.querySelector('#btnAdd-3');
const SelectTahun = document.querySelector('#Tahun');


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
    // return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
    return prefix == undefined ? rupiah : prefix + rupiah;
}

$(document).on('keypress', '#Nidn', function (e) {
    if (e.keyCode === 13) {
        var id = $('#Nidn').val();
        if (id == '') {
            $('#result-cek').text('Mohon Isi NIDN Pegawai');
            $('#Nama-1').val('');
        } else {
            $.ajax({
                type: "POST",
                url: "ceknidn",
                data: { nidn: id },
                dataType: "JSON",
                success: function (result) {
                    if (result.status == true) {
                        $('#result-cek').text(null);
                        $('#Nama-1').val(result.data);
                    } else {
                        $('#result-cek').text(result.ket);
                        $('#Nama-1').val('');
                    }
                },
                error: function (xhr, stat, err) {
                    console.log('Tidak Diketahui');
                }
            });
        }
    }
});

$(document).on('focusout', '#Nidn', function (e) {
    var id = $('#Nidn').val();
    if (id == '') {
        $('#result-cek').text('Mohon Isi NIDN Pegawai');
        $('#Nama-1').val('');
    } else {
        $.ajax({
            type: "POST",
            url: "ceknidn",
            data: { nidn: id },
            dataType: "JSON",
            success: function (result) {
                if (result.status == true) {
                    $('#result-cek').text(null);
                    $('#Nama-1').val(result.data);
                } else {
                    $('#result-cek').text(result.ket);
                    $('#Nama-1').val('');
                }
            },
            error: function (xhr, stat, err) {
                console.log('Tidak Diketahui');
            }
        });
    }
});

$(document).on('click', '#view-anggota', function () {
    $('#nav-2').tab('show');

    SelectTahun.disabled = true;

    Kd_Pengabdian_1 = $(this).attr('dataID'); //Kd_Pengabdian
    $('#Kd-Pengabdian-1').val(Kd_Pengabdian_1);
    loadAnggota(Kd_Pengabdian_1);
});

$(document).on('click', '#view-tim-pendukung', function () {
    $('#nav-3').tab('show');

    SelectTahun.disabled = true;

    Kd_Pengabdian_2 = $(this).attr('dataID'); //Kd_Pengabdian
    $('#Kd-Pengabdian-2').val(Kd_Pengabdian_2);
    loadPendukung(Kd_Pengabdian_2);
});

$('#Tahun').on('change', function () {
    var Tahun = document.getElementById("Tahun").value;
    getData(Tahun);
});

$(document).ready(function () {
    $('.tabel-1').DataTable();
    $('.tabel-2').DataTable();
    $('.tabel-3').DataTable();

    var Tahun = document.getElementById("Tahun").value;
    getData(Tahun);


    $('.nav-link').on('click', function () {
        add_2.disabled = true;
        add_3.disabled = true;
    });

    $('#nav-1').on('click', function () {
        SelectTahun.disabled = false;
    })

    $('#modal-1').on('hidden.bs.modal', function (e) {
        $(this).find('#form-1').trigger('reset');
    });

    $('#modal-2').on('hidden.bs.modal', function (e) {
        $(this).find('#form-2').trigger('reset');
    });

    $('#modal-3').on('hidden.bs.modal', function (e) {
        $(this).find('#form-3').trigger('reset');
    });

    $('.uang').mask('000.000.000.000.000', { reverse: true });
    var count = 0;

});

// CRUD
// Create and Update
// Create and Update Pengabdian Asing 
$(document).on('click', '#btnAdd-1', function () {
    method_1 = 'tambah';
    judulModal_1.html("Tambah Data Pengabdian");
    btnSave_1.html("Save Data");
    modal_1.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_1.modal("show");
});

$(document).on('click', '#btnAdd-2', function () {
    method_2 = 'tambah';
    judulModal_2.html("Tambah Anggota");
    btnSave_2.html("Save Data");
    $('#Kd-Pengabdian-1').attr(Kd_Pengabdian_1);
    modal_2.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_2.modal("show");
});

$(document).on('click', '#btnAdd-3', function () {
    method_3 = 'tambah';
    judulModal_3.html("Tambah Tim Pendukung");
    btnSave_3.html("Save Data");
    modal_3.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_3.modal("show");
});

$(document).on('click', '.btnEdit-1', function () {
    method_1 = 'edit';
    judulModal_1.html("Edit Dosen");
    btnSave_1.html("Save Change");
    modal_1.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_1.modal("show");

    var edit_id = $(this).attr('dataID');

    $.ajax({
        url: 'getEditInternal',
        data: { id: edit_id },
        type: 'POST',
        dataType: 'JSON',
        success: function (result) {
            $('#id').val(result[0].Kd_Pengabdian);
            $('#Tahun-1').val(result[0].Tahun);
            $('#Judul').val(result[0].Judul);
            $('#Skema').val(result[0].Skema);
            $('#Prodi').val(result[0].Kd_Fakultas + '.' + result[0].Kd_Prodi);
            $('#Sumber').val(result[0].Sumber_Dana);
            $('#JumlahDana').val(formatRupiah(result[0].Dana, null));
        }
    });
});

$(document).on('click', '.btnEdit-2', function () {
    method_2 = 'edit';
    judulModal_2.html("Edit Anggota");
    btnSave_2.html("Save Change");
    modal_2.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_2.modal("show");

    var edit_id = $(this).attr('dataID');

    $.ajax({
        url: 'getEditAnggota',
        data: { id: edit_id },
        type: 'POST',
        dataType: 'JSON',
        success: function (result) {
            $('#id-2').val(result[0].No_Id);
            $('#Kd-Pengabdian-1').val(result[0].Kd_Pengabdian);
            $('#Nidn').val(result[0].Nidn);
            $('#Nama-1').val(result[0].Nama);
            $('#Jabatan-1').val(result[0].Jabatan);
        }
    });
});

$(document).on('click', '.btnEdit-3', function () {
    method_3 = 'edit';
    judulModal_3.html("Edit Pendukung");
    btnSave_3.html("Save Change");
    modal_3.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_3.modal("show");

    var edit_id = $(this).attr('dataID');

    $.ajax({
        url: 'getEditPendukung',
        data: { id: edit_id },
        type: 'POST',
        dataType: 'JSON',
        success: function (result) {
            $('#id-3').val(result[0].No_Id);
            $('#Kd-Pengabdian-2').val(result[0].Kd_Pengabdian);
            $('#Nama-2').val(result[0].Nama);
            $('#Jabatan-2').val(result[0].Jabatan);
        }
    });
});

clickSave_1.addEventListener('click', function (event) {
    event.preventDefault();
    var url;
    var form = document.querySelector("#form-1");

    if (method_1 == 'tambah') {
        url = 'saveDataInternal';
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

clickSave_2.addEventListener('click', function () {
    var url;
    var base_url = $('#form-2').attr('link');
    var form = document.querySelector("#form-2");

    if (method_2 == 'tambah') {
        url = 'saveAnggota';
    } else {
        url = 'saveEditAnggota';
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
                        loadAnggota(Kd_Pengabdian_1);
                    }
                })
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    });
});

clickSave_3.addEventListener('click', function () {
    var url;
    var base_url = $('#form-3').attr('link');
    var form = document.querySelector("#form-3");

    if (method_3 == 'tambah') {
        url = 'savePendukung';
    } else {
        url = 'saveEditPendukung';
    }

    clickSave_3.disabled = true;

    $.ajax({
        url: url,
        data: new FormData(form),
        type: "POST",
        dataType: "JSON",
        processData: false,
        contentType: false,
        cache: false,
        success: function (result) {
            clickSave_3.disabled = false;

            if (result.Status == false) {
                Swal.fire({
                    position: 'top-end',
                    type: 'error',
                    title: result.Msg,
                    showConfirmButton: false,
                    timer: 1500
                })
            } else {
                modal_3.modal("hide");

                Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: result.Msg,
                    showConfirmButton: false,
                    timer: 1500
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        loadPendukung(Kd_Pengabdian_2);
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
        var Kode = result[index].Kd_Pengabdian;
        var Judul = result[index].Judul;
        var Nama_Prodi = result[index].Nama_Prodi;
        var Dana = result[index].Dana;
        var Doc = result[index].Dokumen;

        no += 1;

        var output = '<tr>';
        output += '<td>' + no + '</td>';
        output += '<td>' + Judul + '</td>';
        output += '<td>' + Nama_Prodi + '</td>';
        output += '<td>' + formatRupiah(Dana, "Rp. ") + '</td>';
        if (Doc == null) {
            output += '<td><a title="No Link">PDF</a></td>';
        } else {
            output += '<td><a href="../file/upload/documents/document pengabdian/' + Doc + '" target="_blank">PDF</a></td>';
        }
        output += '<td class="text-center">';
        output += '<button dataID="' + Kode + '" class="btn btn-sm mr-1" id="view-anggota" data-toggle="tooltip" data-placement="top" title="Lihat Anggota"><i class="fas fa-book"></i></button>';
        output += '<button dataID="' + Kode + '" class="btn btn-sm mr-1 btn-info" id="view-tim-pendukung" data-toggle="tooltip" data-placement="bottom" title="Lihat Tim Pendukung"><i class="fas fa-book"></i></button>';
        output += '<button dataID="' + Kode + '" class="btn btn-sm mr-1 btn-danger btnHapus-1"><i class="fas fa-trash"></i></button>';
        output += '<button dataID="' + Kode + '" class="btn btn-sm mr-1 btn-info btnEdit-1"><i class="fas fa-edit"></i></button>';
        output += '</td>';
        output += '</tr>';

        $('#body-tabel-1').append(output);
    }

    $('.tabel-1').DataTable();
    $('[data-toggle="tooltip"]').tooltip();
}

function draw_data_1(result) {
    var no = 0;

    for (index in result) {
        var No_Id = result[index].No_Id;
        var Kd_Pengabdian = result[index].Kd_Pengabdian;
        var Nidn = result[index].Nidn;
        var Nama = result[index].Nama;
        var Jabatan = result[index].Jabatan;

        no += 1;

        var output = '<tr>';
        output += '<td>' + no + '</td>';
        output += '<td>' + Nidn + '</td>';
        output += '<td>' + Nama + '</td>';
        output += '<td>' + Jabatan + '</td>';
        output += '<td class="text-center">';
        output += '<button Kd_Pengabdian="' + Kd_Pengabdian + '" dataID="' + No_Id + '" class="btn btn-danger btn-sm mb-1 btnHapus-2 mr-1"> <i class="fa fa-trash"></i></button>';
        output += '<button Kd_Pengabdian="' + Kd_Pengabdian + '" dataID="' + No_Id + '" class="btn btn-info btn-sm mb-1 btnEdit-2"> <i class="fa fa-edit"></i></button>';
        output += '</td>'
        output += '</tr>'

        $('#body-tabel-2').append(output);
    }

    $('.tabel-2').DataTable();
}

function draw_data_2(result) {
    var no = 0;

    for (index in result) {
        var No_Id = result[index].No_Id;
        var Kd_Pengabdian = result[index].Kd_Pengabdian;
        var Nama = result[index].Nama;
        var Jabatan = result[index].Jabatan;

        no += 1;

        var output = '<tr>';
        output += '<td>' + no + '</td>';
        output += '<td>' + Nama + '</td>';
        output += '<td>' + Jabatan + '</td>';
        output += '<td class="text-center">';
        output += '<button Kd_Pengabdian="' + Kd_Pengabdian + '" dataID="' + No_Id + '" class="btn btn-danger btn-sm mb-1 btnHapus-3 mr-1"> <i class="fa fa-trash"></i></button>';
        output += '<button Kd_Pengabdian="' + Kd_Pengabdian + '" dataID="' + No_Id + '" class="btn btn-info btn-sm mb-1 btnEdit-3"> <i class="fa fa-edit"></i></button>';
        output += '</td>'
        output += '</tr>'

        $('#body-tabel-3').append(output);
    }

    $('.tabel-3').DataTable();
}

function getData($tahun) {
    $('#body-tabel-1').html('<tr class="animated fadeIn"><td colspan="6" class="text-center"><img src="../file/app/loading-2.gif" alt=""></td></tr>');

    $.ajax({
        url: 'getDataInternal/' + $tahun,
        type: 'POST',
        dataType: 'JSON',
        success: function (result) {
            $('.tabel-1').DataTable().destroy(); //Id Tabel
            $('#body-tabel-1').html(''); //Id Tabel Body
            draw_data(result);
        }
    });
}

function loadAnggota(Kd_Pengabdian) {
    $('#body-tabel-2').html('<tr class="animated fadeIn"><td colspan="5" class="text-center"><img src="../file/app/loading-2.gif" alt=""></td></tr>');

    $.ajax({
        url: 'getAnggota/',
        data: { Kd_Pengabdian: Kd_Pengabdian },
        type: 'POST',
        dataType: 'JSON',
        success: function (result) {
            $('.tabel-2').DataTable().destroy(); //Id Tabel
            $('#body-tabel-2').html(''); //Id Tabel Body

            if (result == null) {
                $('#body-tabel-2').html('');
            } else {
                add_2.disabled = false;
                draw_data_1(result);
            }
        }
    });
};

function loadPendukung(Kd_Pengabdian) {
    $('#body-tabel-3').html('<tr class="animated fadeIn"><td colspan="4" class="text-center"><img src="../file/app/loading-2.gif" alt=""></td></tr>');

    $.ajax({
        url: 'getPendukung/',
        data: { Kd_Pengabdian: Kd_Pengabdian },
        type: 'POST',
        dataType: 'JSON',
        success: function (result) {
            $('.tabel-3').DataTable().destroy(); //Id Tabel
            $('#body-tabel-3').html(''); //Id Tabel Body

            if (result == null) {
                $('#body-tabel-3').html('');
            } else {
                add_3.disabled = false;
                draw_data_2(result);
            }
        }
    });
};

// Delete
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
            var Kd_Pengabdian = $(this).attr('Kd_Pengabdian');

            $.ajax({
                url: "deleteAnggota/" + id,
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
                                loadAnggota(Kd_Pengabdian);
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
                                loadAnggota(Kd_Pengabdian);
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

$(document).on('click', '.btnHapus-3', function () {
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
            var Kd_Pengabdian = $(this).attr('Kd_Pengabdian');


            $.ajax({
                url: "deletePendukung/" + id,
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
                                loadPendukung(Kd_Pengabdian);
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
                                loadPendukung(Kd_Pengabdian);
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