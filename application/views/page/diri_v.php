<div class="container back-ground">
    <!--  -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Evaluasi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Diri</li>
        </ol>
    </nav>
    <!--  -->

    <!--  -->
    <div class="pt-3 pl-3">
        <label for="Tahun" class="">Pilih Tahun</label>
        <select class="form-control col-sm-3 select-2" name="" id="Tahun">
            <?php foreach ($Tahun as $key) : ?>
                <option value="<?= $key->Tahun ?>"><?= $key->Tahun; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <!--  -->

    <!--  -->
    <div class="tabel p-4">
        <table class="table table-bordered table-hover tabel-1">
            <thead>
                <tr>
                    <th class="text-center" style="max-width: 250px;" rowspan="2">Nama Dosen</th>
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
    </div>
    <!--  -->
</div>