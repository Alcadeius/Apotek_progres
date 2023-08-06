<?php
session_start();
include 'koneksi.php';
if(!isset($_SESSION["username"])){
    header("Location:login.php?warn=gak boleh cross page.");
}else{
session_destroy();
header("Location:login.php?messege=Berhasil Logout.");
}
?>