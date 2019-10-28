var method;
const modalStaff    = $('#modal-staff');
const judulModal    = $('#title-modal');
const btnSave       = $('#btnSave');
const clickSave     = document.querySelector('#btnSave');


$(document).on('click', '#btnTambah', function(){
    method = 'tambah';
    judulModal.html("Tambah Data Staff Pendukung");
    btnSave.html("Save Data Staff");
    modalStaff.modal("show");
})

function getData($tahun){
    $('.tabel-1').DataTable().destroy();
    $('#body-tabel-1').html('<tr class="animated fadeIn"><td colspan="7" class="text-center"><img src="file/app/loading-2.gif" alt=""></td></tr>');
    
    $.ajax({
        url: 'Sumberdayalppm/getData/'+$tahun,
        type: 'POST',
        success:function(result){
            $('#body-tabel-1').html(result);
            $('.tabel-1').DataTable();
        }
    });
}

$('#Tahun').on('change', function() {
    var Tahun = document.getElementById("Tahun").value;
    getData(Tahun);
})

$(document).ready(function(){
    var Tahun = document.getElementById("Tahun").value;
    getData(Tahun);

    $('.modal').on('hidden.bs.modal', function(e){
        $(this).find('form').trigger('reset');
    });
});

clickSave.addEventListener('click', function(event) {
    event.preventDefault();
    var url;
    var base_url    = $('#form').attr('link');
    var form        = document.querySelector("#form");

    if (method == 'tambah') {
        url = base_url+'Sumberdayalppm/save';
    }else {
        url = base_url+'Sumberdayalppm/saveEdit';
    }

    $('.progress').show();
    clickSave.disabled = true;

    $.ajax({
        xhr : function() {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener('progress', function(e) {
                if(e.lengthComputable) {
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
        success:function(result){

            $('.progress').hide();
            clickSave.disabled = false;

            if (result.Status == false) {
                Swal.fire({
                    position: 'top-end',
                    type: 'error',
                    title: result.Msg,
                    showConfirmButton: false,
                    timer: 1500
                })
            }else{
                modalStaff.modal("hide");

                Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: result.Msg,
                    showConfirmButton: false,
                    timer: 1500
                }).then((result) => {
                    if(result.dismiss === Swal.DismissReason.timer) {
                        var Tahun = document.getElementById("Tahun").value;
                        getData(Tahun);
                    }
                })
            }
        },
        error:function(jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    });
});