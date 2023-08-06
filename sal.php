<?php
    include 'koneksi.php';

    $idkaryawan=$_POST["idkaryawan"];
    $namakaryawan=$_POST["namakaryawan"];
    $alamat=$_POST["alamat"];
    $telp=$_POST["telp"];
    $query="UPDATE tb_karyawan SET idkaryawan='$idkaryawan',namakaryawan='$namakaryawan',alamat='$alamat',telp=$telp WHERE idkaryawan='$idkaryawan'";
    $result= mysqli_query($koneksi,$query);

    if(!$result){
        die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }
    else{
        header("Location:karyawan.php");
    }
?>