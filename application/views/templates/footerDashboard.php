<!--  -->
<div class="footer-copyright-area">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="footer-copy-right">
					<p>Copyright © 2019 <a href="facebook.com/lofty.razani">Lofty Razani</a> All rights reserved.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!--  -->
</div>

<!-- jquery
		============================================ -->
<script src="<?= base_url('include/nalika/js/vendor/jquery-1.12.4.min.js') ?>"></script>

<!-- bootstrap JS
		============================================ -->
<script src="<?= base_url('include/nalika/js/bootstrap.min.js') ?>"></script>

<!-- wow JS
		============================================ -->
<script src="<?= base_url('include/nalika/js/wow.min.js') ?>"></script>
<!-- price-slider JS
		============================================ -->
<script src="<?= base_url('include/nalika/js/jquery-price-slider.js') ?>"></script>
<script src="<?= base_url('include/nalika/js/jquery.meanmenu.js') ?>"></script>
<!-- owl.carousel JS
		============================================ -->
<script src="<?= base_url('include/nalika/js/owl.carousel.min.js') ?>"></script>
<!-- sticky JS
		============================================ -->
<script src="<?= base_url('include/nalika/js/jquery.sticky.js') ?>"></script>
<!-- scrollUp JS
		============================================ -->
<script src="<?= base_url('include/nalika/js/jquery.scrollUp.min.js') ?>"></script>
<!-- mCustomScrollbar JS
		============================================ -->
<script src="<?= base_url('include/nalika/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') ?>"></script>
<script src="<?= base_url('include/nalika/js/scrollbar/mCustomScrollbar-active.js') ?>"></script>
<!-- metisMenu JS
		============================================ -->
<script src="<?= base_url('include/nalika/js/metisMenu/metisMenu.min.js') ?>"></script>
<script src="<?= base_url('include/nalika/js/metisMenu/metisMenu-active.js') ?>"></script>
<!-- morrisjs JS
		============================================ -->
<script src="<?= base_url('include/nalika/js/sparkline/jquery.sparkline.min.js') ?>"></script>
<script src="<?= base_url('include/nalika/js/sparkline/jquery.charts-sparkline.js') ?>"></script>
<!-- calendar JS
		============================================ -->
<script src="<?= base_url('include/nalika/js/calendar/moment.min.js') ?>"></script>
<script src="<?= base_url('include/nalika/js/calendar/fullcalendar.min.js') ?>"></script>
<script src="<?= base_url('include/nalika/js/calendar/fullcalendar-active.js') ?>"></script>
<!-- float JS
		============================================ -->
<script src="<?= base_url('include/nalika/js/flot/jquery.flot.js') ?>"></script>
<script src="<?= base_url('include/nalika/js/flot/jquery.flot.resize.js') ?>"></script>
<script src="<?= base_url('include/nalika/js/flot/jquery.flot.pie.js') ?>"></script>
<script src="<?= base_url('include/nalika/js/flot/jquery.flot.tooltip.min.js') ?>"></script>
<script src="<?= base_url('include/nalika/js/flot/jquery.flot.orderBars.js') ?>"></script>
<script src="<?= base_url('include/nalika/js/flot/curvedLines.js') ?>"></script>
<script src="<?= base_url('include/nalika/js/flot/flot-active.js') ?>"></script>
<!-- plugins JS
		============================================ -->
<script src="<?= base_url('include/nalika/js/plugins.js') ?>"></script>
<!-- main JS
		============================================ -->
<script src="<?= base_url('include/nalika/js/main.js') ?>"></script>
<!-- Datatables JS ============================================ -->
<script src="<?= base_url('include/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('include/datatables/dataTables.bootstrap4.min.js') ?>"></script>

<!-- SweetAlert -->
<script src="<?= base_url('include/sweetAlert2/sweetalert2.all.min.js') ?>"></script>

<!-- Costum Script -->
<?php if ($js == '') : ?>

<?php else : ?>
	<script src="<?= base_url('include/costum-script/admin/' . $js . '') ?>"></script>
<?php endif ?>
</body>

</html>