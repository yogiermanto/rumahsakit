<?php 
require_once "../_config/config.php";

// menghapus session user
unset($_SESSION['user']);
//lalu diarahkan ke auth/login.php
echo "<script>window.location='".base_url('auth/login.php')."';</script>"
?>