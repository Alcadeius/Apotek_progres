<?php
    include 'koneksi.php';
    session_start();
    $idtransaksi=$_GET["idtransaksi"];
    $query1="DELETE FROM tb_detail_transaksi WHERE idtransaksi='$idtransaksi'";
    $result= mysqli_query($koneksi,$query1);
    $query="DELETE FROM tb_transaksi WHERE idtransaksi='$idtransaksi'";
    $result= mysqli_query($koneksi,$query);
    

    if(!$result){
        die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }
    else{
        header("Location:viewtransaksi.php?sip=Berhasil Delete"); 
    }
?>