<div class="container back-ground">
    <!--  -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">LPPM</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kegiatan Unit/Institusi</li>
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

    <div class="row pt-2 justify-content-end">
        <div class="col-sm-1">
            <button class="btn btn-info" id="btnAdd-1">+</button>
        </div>
    </div>

    <!--  -->
    <div class="tabel p-4">
        <table class="table table-hover tabel-1">
            <thead>
                <tr>
                    <th class="col text-center" style="width: 4%;">No</th>
                    <th class="col text-center" style="max-width: 150px;">Tingkat Forum Ilmiah</th>
                    <th class="col text-center" style="max-width: 250px;">Nama Kegiatan</th>
                    <th class="col text-center" style="max-width: 150px;">Unit Pelaksana</th>
                    <th class="col text-center" style="max-width: 10%;">Mitra / Sponsorship</th>
                    <th class="col text-center" style="max-width: 15%;">Tempat Pelaksanaan</th>
                    <th class="col text-center" style="max-width: 80px;">Tanggal Mulai</th>
                    <th class="col text-center" style="max-width: 80px;">Tanggal Berakhir</th>
                    <th class="col text-center" style="max-width: 10%;">Narasumber / Pembicara</th>
                    <th class="col text-center" style="max-width: 5%;">Aksi</th>
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
                        <label class="col-sm-2 col-form-label" for="Tahun">Tahun</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="Tahun" name="Tahun" value="<?= date('Y'); ?>">
                        </div>
                    </div>

                    <div class=" form-group row">
                        <label class="col-sm-2 col-form-label" for="Nama-Keg">Nama Kegiatan</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="Nama-Keg" id="Nama-Keg" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Tingkat">Tingkat Forum Ilmiah</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-4">
                            <select name="Tingkat" id="Tingkat" class="form-control">
                                <option value="">Pilih</option>
                                <option value="Nasional">Nasional</option>
                                <option value="Internasional">Internasional</option>
                            </select>
                        </div>
                    </div>

                    <div class=" form-group row">
                        <label class="col-sm-2 col-form-label" for="Unit">Nama Unit Pelaksana</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="Unit" id="Unit" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Mitra">Mitra / Sponsorship</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Mitra" name="Mitra">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Tempat">Tempat Pelaksanaan</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Tempat" name="Tempat">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Tgl-Start">Tanggal Mulai</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control tgl-picker" id="Tgl-Start" name="Tgl-Start" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Tgl-End">Tanggal Berakhir</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control tgl-picker" id="Tgl-End" name="Tgl-End" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Narasumber">Narasumber / Pembicara</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="Narasumber" name="Narasumber">
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