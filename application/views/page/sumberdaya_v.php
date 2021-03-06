<div class="container back-ground">
    <!--  -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">LPPM</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sumber Daya LPPM</li>
        </ol>
    </nav>
    <!--  -->

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
    <div class="ml-3 mr-3 pb-2 pt-2">
        <!--  -->
        <ul class="nav nav-tabs pl-2 pr-2" id="tab-1" role="tablist">
            <li class="nav-item">
                <a href="#data-tab-1" class="nav-link active" id="nav-1" data-toggle="tab" role="tab">Data Pegawai</a>
            </li>
            <li class="nav-item">
                <a href="#data-tab-2" class="nav-link" id="nav-2" data-toggle="tab" role="tab">Data Dosen</a>
            </li>
        </ul>
        <!--  -->

        <!--  -->
        <div class="tab-content" id="content-tabs">

            <!--  -->
            <div class="tab-pane fade show active" id="data-tab-1">
                <div class="row pt-2">
                    <div class="col-sm-1">
                        <button class="btn btn-info btn-sm" id="btnAdd-1">Tambah Pegawai</button>
                    </div>
                </div>
                <!--  -->
                <div class="tabel p-4">
                    <table class="table table-hover tabel-1">
                        <thead>
                            <tr>
                                <th class="text-center" style="max-width: 35px;">No</th>
                                <th class="text-center" style="width: 15%;">NIK Pegawai</th>
                                <th class="text-center" style="width: 20%;">Nama</th>
                                <th class="text-center" style="width: 15%;">Jenis Kelamin</th>
                                <th class="text-center" style="width: 20%;">Jabatan</th>
                                <th class="text-center" style="width: 10%;">Unit Kerja</th>
                                <th class="text-center" style="width: 10%;">Jenjang Pendidikan</th>
                                <th class="text-center" style="width: 10%;">Aksi</th>
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
            <div class="tab-pane fade" id="data-tab-2">
                <div class="row pt-2">
                    <div class="col-sm-1">
                        <button class="btn btn-info btn-sm" id="btnAdd-2">Tambah Penulis</button>
                    </div>
                </div>
                <!--  -->
                <div class="tabel pt-2">
                    <table class="table table-hover tabel-2">
                        <thead>
                            <tr>
                                <th class="text-center" style="max-width: 30px;">No</th>
                                <th class="text-center" style="width: 15%;">Nidn Dosen</th>
                                <th class="text-center" style="max-width: 150px;">Nama</th>
                                <th class="text-center" style="max-width: 75px;">Jenis Kelamin</th>
                                <th class="text-center" style="width: 20%;">Prodi</th>
                                <th class="text-center" style="max-width: 80px;">Jenjang Pendidikan</th>
                                <th class="text-center" style="width: 10%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="body-tabel-2">

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

<!-- Modal -->
<div class="modal fade" tabindex="-1" id="modal-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <!-- Content -->
        <div class="modal-content">
            <!-- Judul Modal  -->
            <div class="modal-header">
                <h5 class="modal-title" id="title-modal">Modal</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--  -->

            <!-- Modal Body -->
            <div class="modal-body">
                <!--  -->
                <form action="" id="form-1" link="<?= base_url(); ?>" enctype="multipart/form-data">
                    <input type="hidden" value="" id="id-1" name="id-1">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Tahun">Tahun</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="Tahun-1" name="Tahun-1" value="<?= date('Y'); ?>">
                        </div>
                    </div>

                    <div class=" form-group row">
                        <label class="col-sm-2 col-form-label" for="Nip">Nip</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="Nip" name="Nip" onkeypress="return Angka(event)">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Nama_Pegawai">Nama Pegawai</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Nama_Pegawai" name="Nama_Pegawai">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Jk-1">Jenis Kelamin</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-4">
                            <select name="Jk" id="Jk" class="form-control">
                                <option value="">Pilih</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Jabatan">Jabatan</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Jabatan" name="Jabatan">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Unit">Unit Kerja</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Unit" name="Unit">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Pendidikan-1">Jenjang Pendidikan</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-4">
                            <select name="Pendidikan-1" id="Pendidikan-1" class="form-control">
                                <option value="">Pilih</option>
                                <option value="S-3">S-3</option>
                                <option value="S-2">S-2</option>
                                <option value="S-1">S-1</option>
                                <option value="D-III">D-III</option>
                                <option value="D-II">D-II</option>
                                <option value="D-I">D-I</option>
                            </select>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title-modal-2">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-2" link="<?= base_url(); ?>">

                    <input type="hidden" value="" id="id-2" name="id-2">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Tahun-2">Tahun</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="Tahun-2" name="Tahun-2" value="<?= date('Y'); ?>">
                        </div>
                    </div>

                    <div class=" form-group row">
                        <label class="col-sm-2 col-form-label" for="Nidn">NIDN</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="Nidn" name="Nidn" onkeypress="return Angka(event)">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Nama_Dosen">Nama Dosen</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Nama_Dosen" name="Nama_Dosen">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Prodi">Prodi</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-6">
                            <select name="Prodi" id="Prodi" class="form-control">
                                <option value="">Pilih</option>
                                <?php foreach ($Ref_Prodi as $val) : ?>
                                    <option value="<?= $val->Kd_Fakultas ?>.<?= $val->Kd_Prodi ?>"><?= $val->Nama_Prodi; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <label class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Jk-2">Jenis Kelamin</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-4">
                            <select name="Jk-2" id="Jk-2" class="form-control">
                                <option value="">Pilih</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </label>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Pendidikan-2">Jenjang Pendidikan</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-4">
                            <select name="Pendidikan-2" id="Pendidikan-2" class="form-control">
                                <option value="">Pilih</option>
                                <option value="S-3">S-3</option>
                                <option value="S-2">S-2</option>
                                <option value="S-1">S-1</option>
                                <option value="D-III">D-III</option>
                                <option value="D-II">D-II</option>
                                <option value="D-I">D-I</option>
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