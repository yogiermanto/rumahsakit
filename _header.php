<?php 
// load koneksi
require_once "_config/config.php";

//load composer ssid
require_once "_assets/libs/vendor/autoload.php";

// jika ada session user maka arahkan ke base_url (index.php)
if (!isset($_SESSION['user'])) {
    echo "<script>window.location='".base_url('auth/login.php')."';</script>";
} ?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Aplikasi - Rumah Sakit</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?=base_url('_assets/css/bootstrap.min.css')?>" rel="stylesheet">
        <link href="<?=base_url('_assets/css/simple-sidebar.css')?>" rel="stylesheet">
        <!-- Data Table -->
        <link href="<?=base_url('_assets/libs/DataTables/datatables.min.css')?>" rel="stylesheet">
        <link rel="icon" href="<?= base_url()?>/assets/yukcoding.png">
        
        <style>
        
        .hide2 {
            display: none;
        }
        </style>
    </head>
    <body>
        <!-- JQuery -->
        <script src="<?=base_url('_assets/js/jquery.js');?>"></script>
        <script src="<?=base_url('_assets/js/boostrap.min.js');?>"></script>
        <!-- Data Tables -->
        <script src="<?=base_url('_assets/libs/DataTables/datatables.min.js');?>"></script>
        
        <!-- Tampilan Menu -->
        <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#"><span class="text-primary"><b>Rumah Sakit</b></span></a>
                </li>
                <li>
                    <a href="<?= base_url('dashboard')?>">Dashboard</a>
                </li>
                <li>
                    <a href="<?= base_url('pasien/data.php')?>">Data Pasien</a>
                </li>
                <li>
                    <a href="<?= base_url('dokter/data.php')?>">Data Dokter</a>
                </li>
                <li>
                    <a href="<?= base_url('poliklinik/data.php')?>">Data Poliklinik</a>
                </li>
                <li>
                    <a href="<?= base_url('obat/data.php')?>">Data Obat</a>
                </li>
                <li>
                    <a href="<?= base_url('rekam_medis/data.php')?>">Rekam Medis</a>
                </li>
                <li>
                    <a href="<?= base_url('auth/logout.php')?>"><span class="text-danger">Logout</span></a>
                </li>
            </ul>
        </div>
        <!-- akhir sidebar -->

         <!-- Page Content -->
         <div id="page-content-wrapper">
            <div class="container-fluid">
            <div class="row">
                <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
            