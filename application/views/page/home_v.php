<div class="container back-ground">
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
    <div class="row">
        <div class="col-sm-4 pl-4 pt-4 pb-4">
            <div class="card">
                <div class="card-body">
                    <div class="">Dosen Tetap Perguruan Tinggi</div>
                    <h5><?= $data1 ?></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pt-4">
            <div class="card">
                <div class="card-body">
                    <div class="">Sumber Data Staf Pendukung</div>
                    <h5><?= $data2 ?></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pr-4 pt-4 pb-4">
            <div class="card">
                <div class="card-body">
                    <div class="">Sumber Dana Penelitian Ristekdikti</div>
                    <h5><?= $data3 ?></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pl-4 pb-4">
            <div class="card">
                <div class="card-body">
                    <div class="">Sumber Dana Penelitian Internal Perguruan Tinggi</div>
                    <h5><?= $data4 ?></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pb-4">
            <div class="card">
                <div class="card-body">
                    <div class="">Sumber Dana Pengabdian Ristekdikti</div>
                    <h5><?= $data5 ?></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pb-4 pr-4">
            <div class="card">
                <div class="card-body">
                    <div class="">Sumber Dana Pengabdian Internal Perguruan Tinggi</div>
                    <h5><?= $data6 ?></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pl-4 pb-4">
            <div class="card">
                <div class="card-body">
                    <div class="">Data Peneliti Asing</div>
                    <h5><?= $data7 ?></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pb-4">
            <div class="card">
                <div class="card-body">
                    <div class="">Fasilitas Penunjang PPM</div>
                    <h5><?= $data8 ?></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pr-4 pb-4">
            <div class="card">
                <div class="card-body">
                    <div class="">Penyelenggaraan Forum Ilmiah</div>
                    <h5>0</h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pl-4 pb-4">
            <div class="card">
                <div class="card-body">
                    <div class="">Publikasi Jurnal</div>
                    <h5><?= $data10 ?></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pb-4">
            <div class="card">
                <div class="card-body">
                    <div class="">Pemakalah Forum Ilmiah</div>
                    <h5><?= $data9 ?></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pr-4 pb-4">
            <div class="card">
                <div class="card-body">
                    <div class="">Buku Ajar / Teks</div>
                    <h5><?= $data11 ?></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pl-4 pb-4">
            <div class="card">
                <div class="card-body">
                    <div class="">Hak Kekayaan Intelektual</div>
                    <h5><?= $data12 ?></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pb-4">
            <div class="card">
                <div class="card-body">
                    <div class="">Perjanjian Kerjasama</div>
                    <h5><?= $data13 ?></h5>
                </div>
            </div>
        </div>
    </div>
    <!--  -->

    <!--  -->
    <div class="row pt-5">
        <div class="col-sm-4 pb-4 pl-4">
            <div class="card">
                <div class="card-body">
                    <div>Manajemen Penelitian</div>
                    <h5>Jumlah</h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pb-4">
            <div class="card">
                <div class="card-body">
                    <div>Evaluasi Diri</div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pb-4 pr-4">
            <div class="card">
                <div class="card-body">
                    <div>Manajemen Pengabdian Masyarakat</div>
                    <h5>Jumlah</h5>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
</div>