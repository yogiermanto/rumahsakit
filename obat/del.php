<?php
// load koneksi
require_once "../_config/config.php";
// query delete berdasarkan ID_obat dengan parameter $_get['id']
mysqli_query($con, "DELETE FROM tb_obat WHERE id_obat = '$_GET[id]'") or DIE (mysqli_error($con));
// Lalu di direct
echo "<script>window.location='data.php';</script>";
?>