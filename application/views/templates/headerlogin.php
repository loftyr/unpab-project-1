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
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?= base_url('include/animate.css') ?>">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="<?= base_url('include/fontawesome/css/all.min.css') ?>">
    <!-- Costum CSS -->
    <link rel="stylesheet" href="<?= base_url('include/costum-css/user/base-style.css') ?>">

    <?php if ($css == '') : ?>

    <?php else : ?>
        <link rel="stylesheet" href="<?= base_url('include/costum-css/user/' . $css . '') ?>">
    <?php endif ?>


    <title><?= $judul ?></title>
    <link rel="icon" type="image/png" href="<?= base_url('file/app/logo-unpab.jpg') ?>">
</head>

<body>