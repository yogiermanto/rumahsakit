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
    // post disesuaikan dengan inputan name = 
    $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));

    // Membuat validasi
    // buat sql query diselect berdasarkan nomor_identitas
    $sql_cek_identitas = mysqli_query($con, "SELECT * FROM tb_pasien WHERE nomor_identitas = '$identitas'") OR DIE(mysqli_error($con));
    // lalu jika isi nomor_identitas sudah lebih dari 1 maka akan muncul echo....
    if (mysqli_num_rows($sql_cek_identitas) > 0) {
      echo "<script>alert('Nomor Identitas sudah pernah di input!.'); window.location='add.php';</script>";
    } else {
      // memasukkan data
      mysqli_query($con, "INSERT INTO tb_pasien (id_pasien, nomor_identitas, nama_pasien, jenis_kelamin, alamat, no_telp) VALUES ('$uuid4', '$identitas', '$nama', '$jk', '$alamat', '$telp')") or die(mysqli_error($con));
      // Lalu di direct
      echo "<script>window.location='data.php';</script>";
    }

    // insert into tb_pasien(), parameter tb_pasien disesuaikan dengan field yang ada dalam database.
    // values sesuaikan dengan variabel yang telah kita buat diatas
    // $_POST[''] isi post disesuaikan dengan name yang ada pada table.

} else if (isset($_POST['edit'])) {
  $id = $_POST['id'];
  //variabel uuid
  $uuid4 = Uuid::uuid4()->toString();
  //deklarasikan variabel nama dan ket dari inputan user
  // post disesuaikan dengan inputan name = 
  $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
  $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
  $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
  $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
  $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));

  // Membuat validasi
  // buat sql query select berdasarkan nomor_identitas sesuai dengan variabel identitas DAN id_pasien tidak sama dengan $id.
  $sql_cek_identitas = mysqli_query($con, "SELECT * FROM tb_pasien WHERE nomor_identitas = '$identitas' AND id_pasien != '$id'") OR DIE (mysqli_error($con));
  // lalu jika isi nomor_identitas sudah lebih dari 1 maka akan muncul echo....
  if (mysqli_num_rows($sql_cek_identitas) > 0) {
    echo "<script>alert('Nomor Identitas sudah pernah di input!.'); window.location='edit.php?id=$id';</script>";
  } else {
    // memasukkan data
    mysqli_query($con, "UPDATE tb_pasien SET nomor_identitas = '$identitas', nama_pasien = '$nama', jenis_kelamin = '$jk', alamat = '$alamat', no_telp = '$telp' WHERE id_pasien = '$id'") or die (mysqli_error($con));
    // Lalu di direct
    echo "<script>window.location='data.php';</script>";
  }

  // insert into tb_pasien(), parameter tb_pasien disesuaikan dengan field yang ada dalam database.
  // values sesuaikan dengan variabel yang telah kita buat diatas
  // $_POST[''] isi post disesuaikan dengan name yang ada pada table.
}