<div class="container back-ground">
    <!--  -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">LPPM</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buku Ajar / Teks Penelitian</li>
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

    <!--  -->
    <div class="field">
        <!--  -->
        <ul class="nav nav-tabs pl-2 pr-2" id="tab-1" role="tablist">
            <li class="nav-item">
                <a href="#data-tab-1" class="nav-link active" id="nav-1" data-toggle="tab" role="tab">Buku Ajar / Teks</a>
            </li>
            <li class="nav-item">
                <a href="#data-tab-2" class="nav-link" id="nav-2" data-toggle="tab" role="tab">Penulis Buku Ajar / Teks</a>
            </li>
        </ul>
        <!--  -->

        <!--  -->
        <div class="tab-content" id="content-tabs">

            <!--  -->
            <div class="tab-pane fade show active" id="data-tab-1">
                <div class="row pt-2 pb-2">
                    <div class="col-sm-1">
                        <button class="btn btn-info btn-sm" id="btnAdd-1">Tambah Buku Ajar / Teks</button>
                    </div>
                </div>
                <!--  -->
                <div class="tabel">
                    <table class="table table-hover tabel-1 table-responsive">
                        <thead>
                            <tr>
                                <th class="col text-center" style="width: 50px;">No</th>
                                <th class="text-center" style="min-width: 150px;">NIDN</th>
                                <th class="text-center" style="min-width: 150px;">Nama</th>
                                <th class="text-center" style="min-width: 260px;">Judul</th>
                                <th class="text-center">ISBN</th>
                                <th class="text-center">Jumlah Halaman</th>
                                <th class="text-center">Penerbit</th>
                                <th class="text-center">Berkas Jurnal </th>
                                <th class="text-center" style="min-width: 100px;">Aksi</th>
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
                <div class="row pt-2 pb-2">
                    <div class="col-sm-1">
                        <button class="btn btn-info btn-sm" id="btnAdd-2" disabled="" Kd_Jurnal="">Tambah Penulis</button>
                    </div>
                </div>
                <!--  -->
                <div class="tabel pt-2">
                    <table class="table table-hover tabel-2 table-responsive">
                        <thead>
                            <tr>
                                <th class="col text-center" style="width: 10%;">No</th>
                                <th class="text-center" style="width: 15%;">Id Buku</th>
                                <th class="text-center" style="width: 20%;">Nama Penulis</th>
                                <th class="text-center" style="width: 20%;">Penulis Ke.</th>
                                <th class="text-center" style="min-width: 80px;">Aksi</th>
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
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="Tahun-1" name="Tahun-1" value="<?= date('Y'); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Judul">Judul</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="Judul" id="Judul" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Isbn">ISBN</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Isbn" name="Isbn">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Penerbit">Penerbit</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="Penerbit" name="Penerbit">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Jml_Hal">Jumlah Halaman</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="Jml_Hal" name="Jml_Hal">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Nidn">NIDN</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="Nidn" name="Nidn">
                            <small id="info" class="form-text text-muted">*Press Enter For Search NIDN</small>
                            <small class="form-text text-muted" id="result-cek"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Pencipta">Pencipta</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="Pencipta" name="Pencipta" readonly>
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
                    <input type="hidden" id="Id-Buku" name="Id-Buku">
                    <input type="hidden" id="id-2" name="id-2">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Tahun-2">Tahun</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="Tahun-2" name="Tahun-2" value="<?= date('Y'); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Nama">Nama Penulis</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Nama" name="Nama">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Urut">Penulis Ke.</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Urut" name="Urut">
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