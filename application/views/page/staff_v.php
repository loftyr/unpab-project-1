<div class="container back-ground">
    <!--  -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">LPPM</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sumber Daya Staff LPPM</li>
        </ol>
    </nav>
    <!--  -->

    <!--  -->
    <div class="Tahun">
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
    <div class="field">
        <!--  -->
        <ul class="nav nav-tabs pl-2 pr-2" id="tab-1" role="tablist">
            <li class="nav-item">
                <a href="#data-tab-1" class="nav-link active" id="nav-1" data-toggle="tab" role="tab">Data Pegawai</a>
            </li>
        </ul>
        <!--  -->

        <!--  -->
        <div class="tab-content" id="content-tabs">

            <!--  -->
            <div class="tab-pane fade show active" id="data-tab-1">
                <div class="row pt-2">
                    <div class="col-sm-1">
                        <button class="btn btn-info btn-sm" id="btnAdd">Tambah Pegawai</button>
                    </div>
                </div>
                <!--  -->
                <div class="tabel pt-2">
                    <table class="table table-hover tabel-1 table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center" style="max-width: 35px;">No</th>
                                <th class="text-center" style="">NIK Pegawai</th>
                                <th class="text-center" style="min-width: 150px;">Nama</th>
                                <th class="text-center" style="">Jenis Kelamin</th>
                                <th class="text-center" style="">Jabatan</th>
                                <th class="text-center" style="min-width: 200px;">Unit Kerja</th>
                                <th class="text-center" style="">Jenjang Pendidikan</th>
                                <th class="text-center" style="min-width: 80px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="body-tabel-1">

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
                <h5 class="modal-title" id="title-modal-1">Modal</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--  -->

            <!-- Modal Body -->
            <div class="modal-body">
                <!--  -->
                <form action="" id="form" link="<?= base_url(); ?>" enctype="multipart/form-data">
                    <input type="hidden" value="" id="id" name="id">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Tahun">Tahun</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="Tahun-1" name="Tahun-1" value="<?= date('Y'); ?>">
                        </div>
                    </div>

                    <div class=" form-group row">
                        <label class="col-sm-2 col-form-label" for="Nip">Nip</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="Nip" name="Nip" onkeypress="return Angka(event)">
                            <small class="form-text text-muted" id="result-cek"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Nama_Pegawai">Nama Pegawai</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Nama_Pegawai" name="Nama_Pegawai">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Jk">Jenis Kelamin</label>
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
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Jabatan" name="Jabatan">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Unit">Unit Kerja</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Unit" name="Unit">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Pendidikan">Jenjang Pendidikan</label>
                        <div class="col-sm-4">
                            <select name="Pendidikan" id="Pendidikan" class="form-control">
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
                <button class="btn btn-primary" id="btnSave">Save</button>
            </div>
            <!--  -->
        </div>
        <!-- Akhir Content -->
    </div>
</div>
<!--  -->