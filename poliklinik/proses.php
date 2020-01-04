<?php 
// load koneksi
require_once "../_config/config.php";

//load composer ssid
require_once "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if (isset($_POST['add'])) {
    
    // variabel total didapat dari input hidden id
    $total = $_POST['total'];
    // looping
    for ($i=1; $i<=$total  ; $i++) { 
        //variabel uuid
        $uuid4 = Uuid::uuid4()->toString();
        //deklarasikan variabel nama- dan variabel $i,$i didapat dari name="nama-<?=$i? > " di file add.php
        $nama = trim(mysqli_real_escape_string($con, $_POST['nama-'.$i]));
        $gedung = trim(mysqli_real_escape_string($con, $_POST['gedung-'.$i]));
        $sql = mysqli_query($con, "INSERT INTO tb_poliklinik (id_poli, nama_poli, gedung) VALUES ('$uuid4', '$nama', '$gedung')") or die(mysqli_error($con));
    }

    // jika sql bernilai true
    if ($sql) {
        echo "<script>alert('".$total." data berhasil ditambahkan.');window.location='data.php';</script>";
      } else {
        // jika gagal ditambahkan 
        echo "<script>alert('Gagal tambah data, silahkan coba lagi.');window.location='generate.php';</script>";
    }
    
    // Lalu di direct
    echo "<script>window.location='data.php';</script>";

} else if (isset($_POST['edit'])) {
  // $_post['id] didapat dari name = id di file edit.php line 39
  // i jika lebih kecil dari count($_POST[id]) maka looping.
  //count = total dari post_id
  for ($i=0; $i<count($_POST['id']); $i++) { 
    //deklarasikan variabel nama dengan nilai dari $_POST['nama] / name = nama, yang didapat dari file edit.php line40
    $id = $_POST['id'][$i];
    $nama = $_POST['nama'][$i];
    $gedung = $_POST['gedung'][$i];
    $sql = mysqli_query($con, "UPDATE tb_poliklinik SET nama_poli = '$nama', gedung = '$gedung' WHERE id_poli = '$id'") or die(mysqli_error($con));
  } 
  echo "<script>alert('Data berhasil ditambahkan.');window.location='data.php';</script>";

}