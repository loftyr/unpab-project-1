        <div class="container">
            <div class="footer">
                <h4>&copy; Universitas Pembangunan Panca Budi</h4>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="<?= base_url('include/jquery-3.3.1.min.js') ?>"></script>
        <script src="<?= base_url('include/popper.min.js') ?>"></script>
        <script src="<?= base_url('include/bootstrap/js/bootstrap.js') ?>"></script>
        <script src="<?= base_url('include/jquery.timeago.js') ?>"></script>
        <script src="<?= base_url('include/JqueryUI/jquery-ui.js') ?>"></script>
        <script src="<?= base_url('include/sweetAlert2/sweetalert2.all.min.js') ?>"></script>
        <script src="<?= base_url('include/jquery.easing.1.3.js') ?>"></script>
        <script src="<?= base_url('include/jquery.mask.min.js') ?>"></script>
        <script src="<?= base_url('include/select2/js/select2.js') ?>"></script>
        <script src="<?= base_url('include/datatables/jquery.dataTables.min.js') ?>"></script>
        <script src="<?= base_url('include/datatables/dataTables.bootstrap4.min.js') ?>"></script>
        <script src="<?= base_url('include/costum-script/user/base-script.js') ?>"></script>
        <!-- Costum Script -->
        <?php if ($js == '') : ?>

        <?php else : ?>
            <script src="<?= base_url('include/costum-script/user/' . $js . '') ?>"></script>
        <?php endif ?>
        </body>

        </html>