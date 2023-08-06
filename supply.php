<?php
    include 'koneksi.php';

    $idsupplier=$_POST["idsupplier"];
    $perusahaan=$_POST["perusahaan"];
    $telp=$_POST["telp"];
    $alamat=$_POST["alamat"];
    $keterangan=$_POST["keterangan"];

    $query="INSERT INTO tb_supplier(idsupplier,perusahaan,telp,alamat,keterangan) VALUES('$idsupplier','$perusahaan','$telp','$alamat','$keterangan')";
    $result= mysqli_query($koneksi,$query);

    if(!$result){
        die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }
    else{
        header("Location:supplier.php");
    }
?>