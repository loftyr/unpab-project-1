<div class="box animated fadeIn">
    <div class="body-box">
        <!--  -->
        <div class="side-left animated">
            <div class="box-1">
                <H4>LEMBAGA PENELITIAN DAN PENGABDIAN MASYARAKAT</H4>
                <H4>UNIVERSITAS PEMBANGUNAN PANCA BUDI</H4>
            </div>

            <div class="box-2">
                <H4>TRI DHARMA PERGURUAN TINGGI</H4>
                <H4>DOSEN TETAP UNPAB</H4>
            </div>

            <div class="box-3">
                <H4>PENELITIAN, PENGABDIAN, JURNAL, PROSIDING, BUKU DAN HA KEKAYAAN INTELEKTUAL SERTA KARYA ILMIYAH LAINNYA</H4>
            </div>

            <div class="row box-4">
                <div class="img">
                    <img src="<?= base_url('file/app/logo unpab.gif') ?>" alt="">
                </div>
                <div class="img">
                    <img src="<?= base_url('file/app/logo unpab 1.jpg') ?>" alt="">
                </div>
                <div class="PressMe col">
                    <button class="btn btninfo btnPressMe">Press Me For Login >>></button>
                </div>
            </div>
            <div class="box-5">
                <h4>KINERJA DOSEN TETAP UNIVERSITAS PEMBANGUNAN PANCA BUDI</h4>
            </div>
        </div>
        <!--  -->

        <!--  -->
        <div class="side-right animated">
            <div class="login col-sm-8">
                <form action="<?= base_url('home/authLogin') ?>" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" autocomplete="off" required placeholder="Username *">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Password *">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary form-control">Login</button>
                    </div>
                    <?= $this->session->flashdata('message'); ?>
                </form>
                <div class="form-group">
                    <button class="btn btninfo btnPressBack form-control">Back</button>
                </div>
            </div>
        </div> <!-- -->
    </div>
</div>