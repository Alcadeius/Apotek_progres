<?php
    include 'koneksi.php';
    session_start();
    $idpelanggan=$_GET["idpelanggan"];
    $query="DELETE FROM tb_pelanggan WHERE idpelanggan='$idpelanggan'";
    $result= mysqli_query($koneksi,$query);

    if(!$result){
        die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }
    else{
        header("Location:pelanggan.php?msg=Berhasil Delete"); 
    }
?>