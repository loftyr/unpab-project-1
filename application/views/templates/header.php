<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Lembaga Penelitian dan Pengabdian Masyarakat">
    <meta name="author" content="ShiroNeko">
    <meta name="category" content="Universitas">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('include/bootstrap/css/bootstrap.css') ?>">
    <!-- Sweet Alert 2 CSS -->
    <link rel="stylesheet" href="<?= base_url('include/sweetAlert2/sweetalert2.min.css') ?>">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?= base_url('include/animate.css') ?>">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="<?= base_url('include/fontawesome/css/all.min.css') ?>">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="<?= base_url('include/select2/css/select2.css') ?>">
    <link rel="stylesheet" href="<?= base_url('include/select2/css/select2-bootstrap.css') ?>">
    <!-- Custom styles for this page -->
    <link rel="stylesheet" href="<?= base_url('include/datatables/dataTables.bootstrap4.min.css') ?>">
    <!-- Jquery UI -->
    <link rel="stylesheet" href="<?= base_url('include/JqueryUI/jquery-ui.css') ?>">
    <!-- Costum CSS -->
    <link rel="stylesheet" href="<?= base_url('include/costum-css/user/base-style.css') ?>">

    <?php if ($css == '') : ?>

    <?php else : ?>
        <link rel="stylesheet" href="<?= base_url('include/costum-css/user/' . $css . '') ?>">
    <?php endif ?>


    <title><?= $judul ?></title>
    <link rel="icon" type="image/png" href="<?= base_url('file/app/logo unpab 1.jpg') ?>">
</head>

<body>

    <!-- Header -->
    <div class="header-1">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="img-left">
                    <img class="" src="<?= base_url('file/app/logo unpab.gif') ?>" alt="">
                </div>
                <div class="judul-header text-center">
                    <h3 class="">TRI DHARMA PERGURUAN TINGGI</h3>
                    <h3>LEMBAGA PENELITIAN DAN PENGABDIAN MASYARAKAT</h3>
                    <h3>UNIVERSITAS PEMBANGUNAN PANCA BUDI</h3>
                </div>
                <div class="img-right">
                    <img class="" src="<?= base_url('file/app/logo unpab 1.png') ?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <!--  -->

    <!-- Batas -->
    <div class="batas-menu">

    </div>
    <!--  -->


    <!-- Menu -->
    <div class="container sticky">
        <div class="menu">
            <ul class="menu-utama disactive">
                <li><a href="<?= base_url('Home') ?>">Beranda</a></li>
                <li>
                    <a href="#">Sumberdaya Penelitian dan Pengabdian</a>
                    <ul class="sub-menu-1">
                        <li><a href="<?= base_url('Sumberdayalppm/Dosen') ?>">Dosen Tetap Perguruan Tinggi</a></li>
                        <li><a href="<?= base_url('Sumberdayalppm/Staff') ?>">Sumber Daya Staf Pendukung</a></li>
                        <li><a href="<?= base_url('Penelitian/asing') ?>">Peneliti Asing</a></li>
                        <li>
                            <a href="#">Sumber Dana PPM Ristekdikti</a>
                            <ul class="sub-menu-2">
                                <li><a href="<?= base_url('Penelitian/ristekdikti') ?>">Penelitian</a></li>
                                <li><a href="<?= base_url('Pengabdian/ristekdikti') ?>">Pengabdian Masyarakat</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Sumber Dana PPM Internal Perguruan Tinggi</a>
                            <ul class="sub-menu-2">
                                <li><a href="<?= base_url('Penelitian/internal') ?>">Penelitian</a></li>
                                <li><a href="<?= base_url('Pengabdian/internal') ?>">Pengabdian Masyarakat</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= base_url('fasilitaspendukung') ?>">Fasilitas Penunjang PPM</a></li>
                        <li><a href="#">Evaluasi Diri</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Manajemen Penelitian dan Pengabdian</a>
                    <ul class="sub-menu-1">
                        <li>
                            <a href="#">Pedoman</a>
                            <ul class="sub-menu-2">
                                <li><a href="<?= base_url('Pedoman/Penelitian') ?>">Penelitian</a></li>
                                <li><a href="<?= base_url('Pedoman/Pengabdian') ?>">Pengabdian</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Income Generating</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Luaran Penelitian dan Pengabdian</a>
                    <ul class="sub-menu-1">
                        <li>
                            <a href="#">Penelitian</a>
                            <ul class="sub-menu-2">
                                <li><a href="<?= base_url('Jurnal/penelitian') ?>">Publikasi Jurnal</a></li>
                                <li><a href="<?= base_url('Buku/penelitian') ?>">Buku Ajar / Teks</a></li>
                                <li><a href="<?= base_url('Karyailmiah/penelitian') ?>">Pemakalah Forum Ilmiah</a></li>
                                <li><a href="<?= base_url('Hki/penelitian') ?>">Hak Kekayaan Intelektual (HKI)</a></li>
                                <li><a href="<?= base_url('Kegiatan/penelitian') ?>">Luaran Lainnya</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Pengabdian Masyarakat</a>
                            <ul class="sub-menu-2">
                                <li><a href="<?= base_url('Jurnal/pengabdian') ?>">Publikasi Jurnal</a></li>
                                <li><a href="<?= base_url('Buku/pengabdian') ?>">Buku Ajar / Teks</a></li>
                                <li><a href="<?= base_url('Karyailmiah/pengabdian') ?>">Pemakalah Forum Ilmiah</a></li>
                                <li><a href="<?= base_url('Hki/pengabdian') ?>">Hak Kekayaan Intelektual (HKI)</a></li>
                                <li><a href="<?= base_url('Kegiatan/pengabdian') ?>">Luaran Lainnya</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Perjanjian Kerjasama</a>
                    <ul class="sub-menu-1">
                        <li><a href="<?= base_url('Kerjasama/memo') ?>">Perjanjian Kerjasama (MoU/MoA)</a></li>
                        <li><a href="<?= base_url('Kerjasama/hasil') ?>">Unit Bisnis Hasil Riset</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Evaluasi Diri</a>
                    <ul class="sub-menu-1">
                        <li><a href="<?= base_url('Evaluasi/Prodi') ?>">Rekapitulasi Kinerja Perprodi</a></li>
                        <li><a href="<?= base_url('Evaluasi/Diri') ?>">Rekapitulasi Kinerja Keseluruhan</a></li>
                    </ul>
                </li>
                <li><a href="<?= base_url('home/logout') ?>">Log Out <i class="fas fa-sign-out-alt"></i></a></li>
            </ul>

            <div class="menu-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>