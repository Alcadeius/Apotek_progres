<?php
    include 'koneksi.php';
    session_start();
    $idobat=$_GET["idobat"];
    $query="DELETE FROM tb_obat WHERE idobat='$idobat'";
    $result= mysqli_query($koneksi,$query);

    if(!$result){
        die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }
    else{
        header("Location:obat.php?msg=Berhasil Delete"); 
    }
?>