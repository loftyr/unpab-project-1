<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= base_url('include/jquery-3.3.1.min.js') ?>"></script>
<script src="<?= base_url('include/popper.min.js') ?>"></script>
<script src="<?= base_url('include/bootstrap/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('include/jquery.easing.1.3.js') ?>"></script>
<!-- Costum Script -->
<?php if ($js == '') : ?>

<?php else : ?>
    <script src="<?= base_url('include/costum-script/user/' . $js . '') ?>"></script>
<?php endif ?>
</body>

</html>