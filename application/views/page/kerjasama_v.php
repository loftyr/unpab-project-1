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
            <button class="btn btn-info" id="btnAdd-1"><i class="fas fa-plus"></i></button>
        </div>
    </div>

    <!--  -->
    <div class="tabel p-4">
        <table class="table table-hover tabel-1">
            <thead>
                <tr>
                    <th class="col text-center" style="width: 4%;">No</th>
                    <th class="text-center" style="max-width: 150px;">Unit Pelaksana</th>
                    <th class="text-center" style="max-width: 250px;">Nama Kegiatan</th>
                    <th class="text-center" style="width: 15%;">Institusi Mitra</th>
                    <th class="text-center" style="width: 20%;">No. Kontrak</th>
                    <th class="text-center" style="width: 10%;">Nilai Kontrak</th>
                    <th class="text-center" style="width: 10%;">Dokumen</th>
                    <th class="text-center" style="width: 10%;">Aksi</th>
                </tr>
            </thead>
            <tbody id="body-tabel-1">

            </tbody>
        </table>
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
                        <label class="col-sm-2 col-form-label" for="Unit">Unit Pelaksana</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Unit" name="Unit">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Nama_Keg">Nama Kegiatan</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="Nama_Keg" id="Nama_Keg" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Institusi_Mitra">Institusi Mitra Keilmuan</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Institusi_Mitra" name="Institusi_Mitra">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="No_Kontrak">No. Kontrak</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="No_Kontrak" name="No_Kontrak">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Nilai">Nilai Kontrak</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Rp.</span>
                            </div>
                            <input type="text" class="form-control uang" id="Nilai" name="Nilai">
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