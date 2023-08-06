<?php
    include 'koneksi.php';
    session_start();
    $idkaryawan=$_GET["idkaryawan"];
    $query="DELETE FROM tb_karyawan WHERE idkaryawan='$idkaryawan'";
    $result= mysqli_query($koneksi,$query);

    if(!$result){
        die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }
    else{
        header("Location:karyawan.php?msg=Berhasil Delete"); 
    }
?>