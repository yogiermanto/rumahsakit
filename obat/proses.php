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
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $ket = trim(mysqli_real_escape_string($con, $_POST['ket']));
    // memasukkan data
    mysqli_query($con, "INSERT INTO tb_obat (id_obat, nama_obat, ket_obat) VALUES ('$uuid4', '$nama', '$ket')") or die(mysqli_error($con));
    // Lalu di direct
    echo "<script>window.location='data.php';</script>";
} else if (isset($_POST['edit'])) {
    //membuat varibel $id untuk menampung nilai dari $_post[id]
    $id = $_POST['id'];
    //deklarasikan variabel nama dan ket dari inputan user
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $ket = trim(mysqli_real_escape_string($con, $_POST['ket']));
    // mengupdate data
    mysqli_query($con, "UPDATE tb_obat SET nama_obat = '$nama', ket_obat = '$ket' WHERE id_obat = '$id'") or die(mysqli_error($con));
    // Lalu di direct
    echo "<script>window.location='data.php';</script>";
}