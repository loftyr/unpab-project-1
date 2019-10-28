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
    
    <div class="row pt-2 justify-content-end">
        <div class="col-sm-1">
            <button class="btn btn-info" id="btnTambah">+</button>
        </div>
    </div>

    <!--  -->
    <div class="tabel p-4">
        <table class="table table-hover tabel-1">
            <thead>
                <tr>
                    <th class="col text-center" style="width: 10%;">No</th>
                    <th class="col text-center" style="width: 15%;">NIK Pegawai</th>
                    <th class="col text-center" style="width: 20%;">Nama</th>
                    <th class="col text-center" style="width: 15%;">Jenis Kelamin</th>
                    <th class="col text-center" style="width: 20%;">Jabatan</th>
                    <th class="col text-center" style="width: 10%;">Unit Kerja</th>
                    <th class="col text-center" style="width: 10%;">Jenjang Pendidikan</th>
                </tr>
            </thead>
            <tbody id="body-tabel-1">
                
            </tbody>
        </table>
    </div>
    <!--  -->
</div>

<!-- Modal -->
<div class="modal fade" tabindex="-1" id="modal-staff" role="dialog">
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
                <form action="" id="form" link="<?= base_url(); ?>" enctype="multipart/form-data">
                    <input type="hidden" value="" id="id" name="id">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Tahun">Tahun</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="Tahun" name="Tahun">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Nik">NIK</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Nik" name="Nik">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Nama">Nama Pegawai</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Nama" name="Nama">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Jk">Jenis Kelamin</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-4">
                            <select name="Jk" id="Jk" class="form-control">
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
                        <label class="col-sm-2 col-form-label" for="UnitKerja">Unit Kerja</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="UnitKerja" name="UnitKerja">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="JenjangPendidikan">Jenjang Pendidikan</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="JenjangPendidikan" name="JenjangPendidikan">
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
                <bnt class="btn btn-primary" id="btnSave">Save</bnt>
            </div>
            <!--  -->
        </div>
        <!-- Akhir Content -->
    </div>
</div>