<?php
    include 'koneksi.php';
    session_start();
    $idsupplier=$_GET["idsupplier"];
    $query="DELETE FROM tb_supplier WHERE idsupplier='$idsupplier'";
    $result= mysqli_query($koneksi,$query);

    if(!$result){
        die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }
    else{
        header("Location:supplier.php?msg=Berhasil Delete"); 
    }
?>