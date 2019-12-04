<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=hasil.xls");
?>

<table class="table table-bordered table-hover tabel-1">
    <thead>
        <tr>
            <th class="text-center" style="max-width: 250px;" rowspan="2">Program Studi</th>
            <th class="text-center" colspan="2">Hibah Dikti</th>
            <th class="text-center" colspan="2">Hibah Internal</th>
            <th class="text-center" colspan="2">Mandiri</th>
            <th class="text-center" colspan="8">Karya Ilmiah</th>
            <th class="text-center" rowspan="2">Kegiatan Institusi</th>
        </tr>
        <tr>
            <th class="text-center">Penelitian</th>
            <th class="text-center">Pengabdian</th>
            <th class="text-center">Penelitian</th>
            <th class="text-center">Pengabdian</th>
            <th class="text-center">Penelitian</th>
            <th class="text-center">Pengabdian</th>
            <th class="text-center">Buku</th>
            <th class="text-center">Hki</th>
            <th class="text-center">Jurnal Internasional</th>
            <th class="text-center">Jurnal Nasional Terakreditasi</th>
            <th class="text-center">Jurnal Nasional Tidak Terakreditasi</th>
            <th class="text-center">Prosiding Internasional</th>
            <th class="text-center">Prosiding Nasional</th>
            <th class="text-center">Prosiding Regional</th>
        </tr>
    </thead>
    <tbody id="body-tabel-1">

    </tbody>
</table>


<script src="<?= base_url('include/jquery-3.3.1.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        getData(2019);
    });

    function getData($tahun) {
        $.ajax({
            url: 'getData/' + $tahun,
            type: 'POST',
            // dataType: 'JSON',
            success: function(result) {
                $('#body-tabel-1').html(''); //Id Tabel Body

                $('#body-tabel-1').html(result);

            }
        });
    }
</script>