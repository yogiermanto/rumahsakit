<?php
// Setting default timezone
date_default_timezone_set('Asia/Jakarta');
session_start();

// untuk memanggil koneksi database datatable
include_once "conn.php";

//koneksi
// $con['host'] berarti dia menaggil nilai array dari index host di variabel $con.
$con = mysqli_connect($con['host'], $con['user'], $con['pass'], $con['db']);
if(mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

// membuat base_url
function base_url($url = null) {
    $base_url = "http://localhost/rumahsakit";
    //jika url tidak kosong
    if($url !=null ) {
        return $base_url."/".$url;
    } else {
        return $base_url;
    }
}

//membuat fungsi tanggal indo
function tgl_indo($tgl) {
    //kita pecah tanggalnya menjadi string (substring)
    //lalu kita ambil stringnya di index ke 8 sebanyak 2 karakter
    $tanggal  = substr($tgl, 8, 2);
    $bulan = substr($tgl, 5, 2);
    $tahun = substr($tgl, 0, 4);
    return $tanggal ."/".$bulan."/".$tahun;
}
?>