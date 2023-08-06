<?php
    include 'koneksi.php';

    $idkaryawan=$_POST["idkaryawan"];
    $namakaryawan=$_POST["namakaryawan"];
    $alamat=$_POST["alamat"];
    $telp=$_POST["telp"];
    $query="INSERT INTO tb_karyawan(idkaryawan,namakaryawan,alamat,telp) VALUES ('$idkaryawan','$namakaryawan','$alamat','$telp')";
    $result= mysqli_query($koneksi,$query);

    if(!$result){
        die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }
    else{
        header("Location:karyawan.php?psn=Data Berhasil Ditambahkan");
    }
?>