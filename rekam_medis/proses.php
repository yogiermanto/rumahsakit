<?php 
// load koneksi
require_once "../_config/config.php";

//load composer ssid
require_once "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if (isset($_POST['add'])) {
    //variabel uuid
    $uuid4 = Uuid::uuid4()->toString();
    //deklarasikan variabel nama dan ket dari inputan user
    // $_POST didapat dari inputan name
    $pasien = trim(mysqli_real_escape_string($con, $_POST['pasien']));
    $keluhan = trim(mysqli_real_escape_string($con, $_POST['keluhan']));
    $dokter = trim(mysqli_real_escape_string($con, $_POST['dokter']));
    $diagnosa = trim(mysqli_real_escape_string($con, $_POST['diagnosa']));
    $poli = trim(mysqli_real_escape_string($con, $_POST['poli']));
    $tgl = trim(mysqli_real_escape_string($con, $_POST['tgl']));
    
    // memasukkan data
    mysqli_query($con, "INSERT INTO tb_rekammedis (id_rm, id_pasien, keluhan, id_dokter, diagnosa, id_poli, tgl_periksa) VALUES ('$uuid4', '$pasien', '$keluhan', '$dokter', '$diagnosa', '$poli', '$tgl') " ) or die(mysqli_error($con));
    
    // karena obat multiple / array, tidak perlu divalidasi
    $obat = $_POST['obat'];    
    //melakukan perulangan untuk mengluarkan obat[]
    foreach ($obat as $ob) {
      // karena id auto increment jadi tidak usah di insert
      // values id_rm adalah uuid4
      // values dari id_obat adalah hasil dari foreach yaitu $ob
      mysqli_query($con, "INSERT INTO tb_rm_obat (id_rm, id_obat) VALUES ('$uuid4', '$ob')") or die(mysqli_error($con));
    }

    // Lalu di direct
    echo "<script>window.location='data.php';</script>";
  } else if (isset($_POST['edit'])) {

}