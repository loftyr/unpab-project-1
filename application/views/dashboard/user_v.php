<!-- Mobile Menu end -->
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="icon nalika-user"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>User LPPM</h2>
                                    <p>Welcome LPPM <span class="bread-ntd">Admin</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="konten">
                <!--  -->
                <button class="btn btn-primary" id="btnAdd"><i class="fa fa-plus"></i></button>
                <div class="tabel pt-2 table-responsive">
                    <table class="table table-hover tabel-1 table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" style="max-width: 30px;">Id User</th>
                                <th class="text-center" style="max-width: 100px">Username</th>
                                <th class="text-center" style="max-width: 50px;">Level</th>
                                <th class="text-center" style="max-width: 100px;">Email</th>
                                <th class="text-center" style="max-width: 50px;">Status</th>
                                <th class="text-center" style="max-width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="body-tabel-1">

                        </tbody>
                    </table>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
</div>



<!-- Modal Anggota -->
<div class="modal fade" id="modal-1" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title-modal-1">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" link="<?= base_url(); ?>">

                    <input type="hidden" value="" id="id" name="id">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Username">Username</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="Username" name="Username">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Password">Password</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="Password" name="Password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="re-password">Re-Password</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="re-password" name="re-password">
                            <small class="form-text text-info" id="result-cek"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Email">Email</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-5">
                            <input type="email" class="form-control" id="Email" name="Email">
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Level">Level</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="Level" id="Level">
                                <option value="">Pilih</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="Status">Status</label>
                        <label for="" class="col-sm-1 col-form-label text-center">:</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="Status" id="Status">
                                <option value="">Pilih</option>
                                <option value="1">Aktif</option>
                                <option value="0">Non Aktif</option>
                            </select>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnSave">Save</button>
            </div>
        </div>
    </div>
</div>
<!--  -->