<div class="container back-ground">
    <!--  -->
    <div class="pt-2 col-sm-8">
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
    <div class="m-3">
        <!--  -->
        <ul class="nav nav-tabs pl-2 pr-2" id="tab-1" role="tablist">
            <li class="nav-item">
                <a href="#data-penelitian" class="nav-link active" id="nav-penelitian" data-toggle="tab" role="tab">Penelitian</a>
            </li>
            <li class="nav-item">
                <a href="#data-anggota" class="nav-link" id="nav-anggota" data-toggle="tab" role="tab">Anggota Penelitian</a>
            </li>
            <li class="nav-item">
                <a href="#data-tim-pendukung" class="nav-link" id="nav-tim-pendukung" data-toggle="tab" role="tab">Tim Pendukung</a>
            </li>
        </ul>
        <!--  -->

        <!--  -->
        <div class="tab-content" id="content-tabs">

            <!--  -->
            <div class="tab-pane fade show active" id="data-penelitian">
                <div class="row pt-2">
                    <div class="col-sm-1">
                        <button class="btn btn-info btn-sm" id="btnAdd-1">Tambah Penelitian</button>
                    </div>
                </div>
                <!--  -->
                <div class="tabel pt-2">
                    <table class="table table-hover tabel-1">
                        <thead>
                            <tr>
                                <th class="col text-center" style="width: 3%;">No</th>
                                <th class="col text-center" style="width: 15%;">Judul Penelitian</th>
                                <th class="col text-center" style="width: 15%;">Program Studi</th>
                                <th class="col text-center" style="width: 10%;">Dana</th>
                                <th class="col text-center" style="width: 10%;">Dokumen</th>
                                <th class="col text-center" style="width: 10%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="body-tabel-1">

                        </tbody>
                    </table>
                </div>
                <!--  -->
            </div>
            <!--  -->

            <!--  -->
            <div class="tab-pane fade" id="data-anggota">
                <div class="row pt-2">
                    <div class="col-sm-1">
                        <button class="btn btn-info btn-sm" id="btnAdd-2" disabled="" Kd_Penelitian="">Tambah Anggota Penelitian</button>
                    </div>
                </div>
                <!--  -->
                <div class="tabel pt-2">
                    <table class="table table-hover tabel-2">
                        <thead>
                            <tr>
                                <th class="col text-center" style="width: 10%;">No</th>
                                <th class="col text-center" style="width: 15%;">NIDN</th>
                                <th class="col text-center" style="width: 20%;">Nama Anggota</th>
                                <th class="col text-center" style="width: 10%;">Jabatan</th>
                                <th class="col text-center" style="width: 10%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="body-tabel-2">

                        </tbody>
                    </table>
                </div>
                <!--  -->
            </div>
            <!--  -->

            <!--  -->
            <div class="tab-pane fade" id="data-tim-pendukung">
                <div class="row pt-2">
                    <div class="col-sm-1">
                        <button class="btn btn-info btn-sm" id="btnAdd-3" disabled="">Tambah Tim Pendukung</button>
                    </div>
                </div>
                <!--  -->
                <div class="tabel pt-2">
                    <table class="table table-hover tabel-3">
                        <thead>
                            <tr>
                                <th class="col text-center" style="width: 10%;">No</th>
                                <th class="col text-center" style="width: 15%;">Nama TIM Pendukung</th>
                                <th class="col text-center" style="width: 20%;">Jabatan</th>
                                <th class="col text-center" style="width: 10%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="body-tabel-3">

                        </tbody>
                    </table>
                </div>
                <!--  -->
            </div>
            <!--  -->


        </div>
        <!--  -->

    </div>
    <!--  -->

</div>

<!-- Modal 1-->
<div class="modal fade" tabindex="-1" id="modal-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <!-- Content -->
        <div class="modal-content">
            <!-- Judul Modal  -->
            <div class="modal-header">
                <h5 class="modal-title" id="title-modal-1">Modal</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--  -->

            <!-- Modal Body -->
            <div class="modal-body">
                <!--  -->
                <form action="" id="form-1" link="<?= base_url(); ?>" enctype="multipart/form-data">
                    <input type="hidden" value="" id="id" name="id">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Tahun">Tahun</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="Tahun" name="Tahun" value="<?= date('Y'); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Judul">Judul</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Judul" name="Judul">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Skema">Skema</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Skema" name="Skema">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Bidang">Bidang Keilmuan</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-6">
                            <select name="Bidang" id="Bidang" class="form-control">
                                <?php foreach ($Ref_ProgramStudi as $value) : ?>
                                    <option value="<?= $value->Nama_ProgramStudi ?>"><?= $value->Nama_ProgramStudi ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Sumber">Sumber Dana</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-4">
                            <select name="Sumber" id="Sumber" class="form-control">
                                <option value="Pemerintah">Pemerintah</option>
                                <option value="Ristekdikti">Ristekdikti</option>
                                <option value="Internal Perguruan Tinggi">Internal Perguruan Tinggi</option>
                                <option value="Mandiri">Mandiri</option>
                                <option value="Luar Negeri">Luar Negeri</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="JumlahDana">Jumlah Dana</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Rp.</span>
                            </div>
                            <input type="text" class="form-control uang" id="JumlahDana" name="JumlahDana">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="File">File</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="File" name="File">
                            <small id="info" class="form-text text-muted">Max File 1 MB</small>
                        </div>
                    </div>
                </form>
                <!--  -->

                <!-- Loading -->
                <div class="progress" style="display: none;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--  -->
            </div>
            <!-- Akhir Body -->

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button class="btn btn-primary" id="btnSave-1">Save</button>
            </div>
            <!--  -->
        </div>
        <!-- Akhir Content -->
    </div>
</div>
<!--  -->


<!-- Modal Anggota -->
<div class="modal fade" id="modal-2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title-modal-2">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-2" link="<?= base_url(); ?>">
                    <input type="hidden" id="Kd-Penelitian-1" name="Kd-Penelitian-1">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Nidn">NIDN</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Nidn" name="Nidn">
                            <small class="form-text text-muted" id="result-cek"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Nama-1">Nama</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Nama-1" name="Nama-1" readonly="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Jabatan-1">Jabatan</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-8">
                            <select name="Jabatan-1" id="Jabatan-1" class="form-control">
                                <option value="Ketua">Ketua</option>
                                <option value="Wakil Ketua">Wakil Ketua</option>
                                <option value="Anggota">Anggota</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnSave-2">Save</button>
            </div>
        </div>
    </div>
</div>
<!--  -->

<!-- Modal Tim Pendukung -->
<div class="modal fade" id="modal-3" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title-modal-3">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-3" link="<?= base_url(); ?>">
                    <input type="hidden" id="Kd-Penelitian-2" name="Kd-Penelitian-2">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Nama-2">Nama</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Nama-2" name="Nama-2">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Jabatan-2">Jabatan</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-8">
                            <select name="Jabatan-2" id="Jabatan-2" class="form-control">
                                <option value="Staff Lppm">Staff LPPM</option>
                                <option value="Mahasiwa Aktif">Mahasiwa Aktif</option>
                                <option value="Alumni">Alumni</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnSave-3">Save</button>
            </div>
        </div>
    </div>
</div>
<!--  -->