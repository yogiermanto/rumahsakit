<?php
require_once "../_config/config.php";

//membuat variabel chk yang didapat dari nilai : name = checked[] di file data.php line 47
$chk = $_POST['checked'];
if (!isset($chk)) {
    echo "<script>alert('Tidak ada data yang dipilih!'); location='data.php';</script>";
} else {
    foreach ($chk as $id) {
        $sql = mysqli_query($con, "DELETE FROM tb_poliklinik WHERE id_poli = '$id'") or die (mysqli_error($con));
    }
       // jika sql bernilai true
       if ($sql) {
        echo "<script>alert('".count($chk)." Data berhasil dihapus.');window.location='data.php';</script>";
      } else {
        // jika gagal ditambahkan 
        echo "<script>alert('Gagal hapus data, silahkan coba lagi.');window.location='data.php';</script>";
    }
}