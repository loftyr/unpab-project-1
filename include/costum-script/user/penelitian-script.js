var method_1, method_2, method_3;
var Kd_Penelitian_1 = 0;
var Kd_Penelitian_2 = 0;
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

$(document).on('click', '#btnAdd-1', function () {
    method_1 = 'tambah';
    judulModal_1.html("Tambah Data Penelitian");
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
    $('#Kd-Penelitian-1').attr(Kd_Penelitian_1);
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

$(document).on('keypress', '#Nidn', function (e) {
    if (e.keyCode === 13) {
        var id = $('#Nidn').val();

        $.ajax({
            type: "POST",
            url: "penelitian/ceknidn",
            data: { nidn: id },
            dataType: "JSON",
            success: function (result) {
                if (result.status == true) {
                    $('#result-cek').text(result.ket);
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

function draw_data(result) {
    var no = 0;

    for (index in result) {
        var Kode = result[index].Kd_Penelitian;
        var Judul = result[index].Judul;
        var Bidang = result[index].Bidang_Keilmuan;
        var Dana = result[index].Dana;
        var Doc = result[index].Dokumen;

        no += 1;

        var output = '<tr>';
        output += '<td>' + no + '</td>';
        output += '<td>' + Judul + '</td>';
        output += '<td>' + Bidang + '</td>';
        output += '<td>' + formatRupiah(Dana, "Rp. ") + '</td>';
        if (Doc == null) {
            output += '<td><a title="No Link">PDF</a></td>';
        } else {
            output += '<td><a href="file/upload/documents/document penelitian/' + Doc + '" target="_blank">PDF</a></td>';
        }
        output += '<td class="text-center">';
        output += '<button dataID="' + Kode + '" class="btn btn-sm mr-2" id="view-anggota" data-toggle="tooltip" data-placement="top" title="Lihat Anggota"><i class="fas fa-book"></i></button>';
        output += '<button dataID="' + Kode + '" class="btn btn-sm btn-info" id="view-tim-pendukung" data-toggle="tooltip" data-placement="bottom" title="Lihat Tim Pendukung"><i class="fas fa-book"></i></button>'
        output += '</td>'
        output += '</tr>'

        $('#body-tabel-1').append(output);
    }

    $('.tabel-1').DataTable();
    $('[data-toggle="tooltip"]').tooltip();
}

function draw_data_1(result) {
    var no = 0;

    for (index in result) {
        var No_Id = result[index].No_Id;
        var Kd_Penelitian = result[index].Kd_Penelitian;
        var Nidn = result[index].Nidn;
        var Nama = result[index].Nama;
        var Jabatan = result[index].Jabatan;

        no += 1;

        var output = '<tr>';
        output += '<td>' + no + '</td>';
        output += '<td>' + Nidn + '</td>';
        output += '<td>' + Nama + '</td>';
        output += '<td>' + Jabatan + '</td>';
        output += '<td>';
        output += '<div class="row"><div class="col-sm-12"><button Kd_Penelitian="' + Kd_Penelitian + '" dataID="' + No_Id + '" class="btn btn-danger btn-sm mb-1 btnHapus-2"> <i class="fa fa-trash"></i></button></div></div>';
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
        var Kd_Penelitian = result[index].Kd_Penelitian;
        var Nama = result[index].Nama;
        var Jabatan = result[index].Jabatan;

        no += 1;

        var output = '<tr>';
        output += '<td>' + no + '</td>';
        output += '<td>' + Nama + '</td>';
        output += '<td>' + Jabatan + '</td>';
        output += '<td>';
        output += '<div class="row"><div class="col-sm-12"><button Kd_Penelitian="' + Kd_Penelitian + '" dataID="' + No_Id + '" class="btn btn-danger btn-sm mb-1 btnHapus-3"> <i class="fa fa-trash"></i></button></div></div>';
        output += '</td>'
        output += '</tr>'

        $('#body-tabel-3').append(output);
    }

    $('.tabel-3').DataTable();
}

function getData($tahun) {
    $('#body-tabel-1').html('<tr class="animated fadeIn"><td colspan="6" class="text-center"><img src="file/app/loading-2.gif" alt=""></td></tr>');

    $.ajax({
        url: 'Penelitian/getData/' + $tahun,
        type: 'POST',
        dataType: 'JSON',
        success: function (result) {
            $('.tabel-1').DataTable().destroy(); //Id Tabel
            $('#body-tabel-1').html(''); //Id Tabel Body
            draw_data(result);
        }
    });
}

function loadAnggota(Kd_Penelitian) {
    $('#body-tabel-2').html('<tr class="animated fadeIn"><td colspan="5" class="text-center"><img src="file/app/loading-2.gif" alt=""></td></tr>');

    $.ajax({
        url: 'Penelitian/getAnggota/',
        data: { Kd_Penelitian: Kd_Penelitian },
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

function loadPendukung(Kd_Penelitian) {
    $('#body-tabel-3').html('<tr class="animated fadeIn"><td colspan="4" class="text-center"><img src="file/app/loading-2.gif" alt=""></td></tr>');

    $.ajax({
        url: 'Penelitian/getPendukung/',
        data: { Kd_Penelitian: Kd_Penelitian },
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

$(document).on('click', '#view-anggota', function () {
    $('#nav-anggota').tab('show');

    Kd_Penelitian_1 = $(this).attr('dataID'); //Kd_Penelitian
    $('#Kd-Penelitian-1').val(Kd_Penelitian_1);
    loadAnggota(Kd_Penelitian_1);
});

$(document).on('click', '#view-tim-pendukung', function () {
    $('#nav-tim-pendukung').tab('show');

    Kd_Penelitian_2 = $(this).attr('dataID'); //Kd_Penelitian
    $('#Kd-Penelitian-2').val(Kd_Penelitian_2);
    loadPendukung(Kd_Penelitian_2);
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

clickSave_1.addEventListener('click', function (event) {
    event.preventDefault();
    var url;
    var base_url = $('#form-1').attr('link');
    var form = document.querySelector("#form-1");

    if (method_1 == 'tambah') {
        url = base_url + 'Penelitian/save1';
    } else {
        url = base_url + 'Penelitian/saveEdit1';
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
        url = base_url + 'Penelitian/save2';
    } else {
        url = base_url + 'Penelitian/saveEdit2';
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
                        loadAnggota(Kd_Penelitian_1);
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
        url = base_url + 'Penelitian/save3';
    } else {
        url = base_url + 'Penelitian/saveEdit3';
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
                        loadPendukung(Kd_Penelitian_2);
                    }
                })
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    });
});