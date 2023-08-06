<?php
    include 'koneksi.php';

    $idsupplier=$_POST["idsupplier"];
    $perusahaan=$_POST["perusahaan"];
    $telp=$_POST["telp"];
    $alamat=$_POST["alamat"];

    $query="UPDATE tb_supplier SET idsupplier='$idsupplier',perusahaan='$perusahaan',telp='$telp',alamat='$alamat'";
    $result= mysqli_query($koneksi,$query);

    if(!$result){
        die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }
    else{
        header("Location:supplier.php"); 
    }
?>