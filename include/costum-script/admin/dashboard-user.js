var method_1;
const modal_1 = $('#modal-1');
const judulModal_1 = $('#title-modal-1');
const btnSave_1 = $('#btnSave');
const clickSave_1 = document.querySelector('#btnSave');

$(document).ready(function () {
    $('.tabel-1 thead tr').clone(true).appendTo('.tabel-1 thead');
    $('.tabel-1 thead tr:eq(1) th').each(function (i) {
        var title = $(this).text();
        if (title == 'Aksi') {
            $(this).html('');
        } else {
            $(this).html('<input data-no="' + i + '" class="input-search" type="text" placeholder="Cari ' + title + '" />');
        }

        // $('input').on('keyup change', function () {
        //     if (table.column(i).search() !== this.value) {
        //         table
        //             .column(i)
        //             .search(this.value)
        //             .draw();
        //     }
        // });
    });

    var table = $('.tabel-1').DataTable({
        orderCellsTop: true,
        fixedHeader: true
    });

    $('#modal-1').on('hidden.bs.modal', function (e) {
        $(this).find('#form').trigger('reset');
    });

    getData();
});

$('#re-password').on('keyup', function () {
    if ($('#Password').val() == $('#re-password').val()) {
        $('#result-cek').text('Password Match');
        $('#result-cek').removeClass('text-danger');
        $('#result-cek').addClass('text-info');

        clickSave_1.disabled = false;
    } else {
        clickSave_1.disabled = true;
        $('#result-cek').text('Password Dont Match');
        $('#result-cek').removeClass('text-info');
        $('#result-cek').addClass('text-danger');
    }
});

// Create
$(document).on('click', '#btnAdd', function () {
    method_1 = 'tambah';
    judulModal_1.html("Tambah User");
    btnSave_1.html("Save Data");
    modal_1.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_1.modal("show");
});

$(document).on('click', '.btnEdit', function () {
    method_1 = 'edit';
    judulModal_1.html("Edit User");
    btnSave_1.html("Save Change");
    modal_1.modal({
        backdrop: 'static',
        keyboard: false
    });
    modal_1.modal("show");

    var edit_id = $(this).attr('dataID');

    $.ajax({
        url: 'getEditUser',
        data: { id: edit_id },
        type: 'POST',
        dataType: 'JSON',
        success: function (result) {
            $('#id').val(result[0].id);
            $('#Username').val(result[0].username);
            $('#Email').val(result[0].email);
            $('#Level').val(result[0].Level);
            $('#Status').val(result[0].Status);
        }
    });
});

clickSave_1.addEventListener('click', function (event) {
    event.preventDefault();
    var url;
    var base_url = $('#form').attr('link');
    var form = document.querySelector("#form");

    if (method_1 == 'tambah') {
        url = 'saveData';
    } else {
        url = 'saveEditData';
    }
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
            // $('.progress').hide();
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
                        getData();
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

    for (index in result) {
        var id = result[index].id_user;
        var Level = result[index].Level;
        var username = result[index].username;
        var email = result[index].email;
        var Status = result[index].Status;

        var output = '<tr>';
        output += '<td>' + id + '</td>';
        output += '<td>' + username + '</td>';
        output += '<td>' + Level + '</td>';
        output += '<td>' + email + '</td>';
        if (Status == 1) {
            output += '<td>Aktif</td>';
        } else {
            output += '<td>Non Aktif</td>';
        }
        output += '<td class="text-center">';
        output += '<button dataID="' + id + '" class="btn btn-danger btn-sm btnHapus" title="Hapus"><i class="icon nalika-delete-button"></i></button>';
        output += '<button dataID="' + id + '" class="btn btn-info btn-sm btnEdit" title="Edit"><i class="icon nalika-edit"></i></button>';
        output += '<button dataID="' + id + '" class="btn btn-info btn-sm btnActive" title="Active"><i class="fa fa-check"></i></button>';
        output += '</td>';
        output += '</tr>';

        $('#body-tabel-1').append(output);
    }

    var table = $('.tabel-1').DataTable({
        orderCellsTop: true,
        fixedHeader: true
    });

    $('.input-search').on('keyup change', function (ev) {
        table
            .column($(this).attr('data-no'))
            .search(this.value)
            .draw();
    });

    $('.tabel-1 thead tr:eq(1) th').each(function (i) {

    });


}

function getData() {
    $('#body-tabel-1').html('<tr class="animated fadeIn"><td colspan="6" class="text-center"><img src="../file/app/loading-2.gif" alt=""></td></tr>');

    $.ajax({
        url: 'getDataUser',
        type: 'POST',
        dataType: 'JSON',
        success: function (result) {
            $('.tabel-1').DataTable().destroy(); //Id Tabel
            $('#body-tabel-1').html(''); //Id Tabel Body
            draw_data(result);
        }
    });
}

