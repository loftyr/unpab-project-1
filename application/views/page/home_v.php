<div class="container back-ground">
    <!--  -->
    <div class="pt-2 col-sm-12">
        <label for="Tahun" class="col">Pilih Tahun</label>
        <div class="col-sm-12">
            <select class="form-control col-sm-4 select-2" name="" id="Tahun">
                <?php foreach ($Tahun as $key) : ?>
                    <option value="<?= $key->Tahun ?>"><?= $key->Tahun; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <!--  -->

    <!--  -->
    <div class="row">
        <div class="col-sm-4 pl-4 pt-4 pb-4">
            <div class="card animated fadeIn">
                <div class="card-body">
                    <div class="">Dosen Tetap Perguruan Tinggi</div>
                    <h5 id="data-1" class="Place-Data"></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pt-4">
            <div class="card animated fadeIn">
                <div class="card-body">
                    <div class="">Sumber Data Staf Pendukung</div>
                    <h5 id="data-2" class="Place-Data"></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pr-4 pt-4 pb-4">
            <div class="card animated fadeIn">
                <div class="card-body">
                    <div class="">Sumber Dana Penelitian Ristekdikti</div>
                    <h5 id="data-3" class="Place-Data"></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pl-4 pb-4">
            <div class="card animated fadeIn">
                <div class="card-body">
                    <div class="">Sumber Dana Penelitian Internal Perguruan Tinggi</div>
                    <h5 id="data-4" class="Place-Data"></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pb-4">
            <div class="card animated fadeIn">
                <div class="card-body">
                    <div class="">Sumber Dana Pengabdian Ristekdikti</div>
                    <h5 id="data-5" class="Place-Data"></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pb-4 pr-4">
            <div class="card animated fadeIn">
                <div class="card-body">
                    <div class="">Sumber Dana Pengabdian Internal Perguruan Tinggi</div>
                    <h5 id="data-6" class="Place-Data"></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pl-4 pb-4">
            <div class="card animated fadeIn">
                <div class="card-body">
                    <div class="">Data Peneliti Asing</div>
                    <h5 id="data-7" class="Place-Data"></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pb-4">
            <div class="card animated fadeIn">
                <div class="card-body">
                    <div class="">Fasilitas Penunjang PPM</div>
                    <h5 id="data-8" class="Place-Data"></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pr-4 pb-4">
            <div class="card animated fadeIn">
                <div class="card-body">
                    <div class="">Penyelenggaraan Forum Ilmiah</div>
                    <h5 id="data-9" class="Place-Data"></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pl-4 pb-4">
            <div class="card animated fadeIn">
                <div class="card-body">
                    <div class="">Publikasi Jurnal</div>
                    <h5 id="data-10" class="Place-Data"></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pb-4">
            <div class="card animated fadeIn">
                <div class="card-body">
                    <div class="">Pemakalah Forum Ilmiah</div>
                    <h5 id="data-11" class="Place-Data"></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pr-4 pb-4">
            <div class="card animated fadeIn">
                <div class="card-body">
                    <div class="">Buku Ajar / Teks</div>
                    <h5 id="data-12" class="Place-Data"></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pl-4 pb-4">
            <div class="card animated fadeIn">
                <div class="card-body">
                    <div class="">Hak Kekayaan Intelektual</div>
                    <h5 id="data-13" class="Place-Data"></h5>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pb-4">
            <div class="card animated fadeIn">
                <div class="card-body">
                    <div class="">Perjanjian Kerjasama</div>
                    <h5 id="data-14" class="Place-Data"></h5>
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