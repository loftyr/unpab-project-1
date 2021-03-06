<div class="container back-ground">
    <!--  -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">LPPM</a></li>
            <li class="breadcrumb-item active" aria-current="page">Fasilitas Pendukung</li>
        </ol>
    </nav>
    <!--  -->

    <!--  -->
    <div class="Tahun">
        <label for="Tahun" class="col">Pilih Tahun</label>
        <div class="col-sm-3">
            <select class="form-control col-sm-4 select-2" name="" id="Tahun">
                <?php foreach ($Tahun as $key) : ?>
                    <option value="<?= $key->Tahun ?>"><?= $key->Tahun; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <!--  -->

    <div class="row pt-2 justify-content-end">
        <div class="col-sm-1">
            <button class="btn btn-info" id="btnAdd-1"><i class="fas fa-plus"></i></button>
        </div>
    </div>

    <!--  -->
    <div class="tabel pt-2">
        <table class="table table-hover tabel-1 table-responsive-sm">
            <thead>
                <tr>
                    <th class="text-center" style="width: 4%;">No</th>
                    <th class="text-center" style="width: 15%;">Unit Pendukung</th>
                    <th class="text-center" style="width: 10%;">No. SK</th>
                    <th class="text-center" style="width: 25%;">Fasilitas & Peralatan Pendukung</th>
                    <th class="text-center" style="width: 10%;">Status</th>
                    <th class="text-center" style="width: 20%;">Keterangan</th>
                    <th class="text-center" style="width: 6%;">Dokumen</th>
                    <th class="text-center" style="min-width: 80px;">Aksi</th>
                </tr>
            </thead>
            <tbody id="body-tabel-1">

            </tbody>
        </table>
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
                <form action="" id="form-1" link="<?= base_url(); ?>" enctype="multipart/form-data">
                    <input type="hidden" value="" id="id" name="id">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Tahun-1">Tahun</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="Tahun-1" name="Tahun-1" value="<?= date('Y'); ?>">
                        </div>
                    </div>

                    <div class=" form-group row">
                        <label class="col-sm-2 col-form-label" for="No">No. Surat Keputusan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="No" name="No" onkeypress="return noSpace(event);">
                        </div>
                    </div>

                    <div class=" form-group row">
                        <label class="col-sm-2 col-form-label" for="Unit">Nama Unit Pendukung</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="Unit" name="Unit">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Fasilitas">Fasilitas / Peralatan Penunjang</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="Fasilitas" rows="3" name="Fasilitas"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Status">Status</label>
                        <div class="col-sm-4">
                            <select name="Status" id="Status" class="form-control">
                                <option value="">Pilih</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Berlangsung">Berlangsung</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Ket">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="Ket" rows="3" name="Ket"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="File">File</label>
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
<!-- Akhir Modal -->