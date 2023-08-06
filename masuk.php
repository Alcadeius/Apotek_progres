<?php
    include 'koneksi.php';
    session_start();
    $idobat=$_POST["idobat"];
    $idsupplier=$_POST["idsupplier"];
    $namaobat=$_POST["namaobat"];
    $kategoriobat=$_POST["kategoriobat"];
    $hargajual=$_POST["hargajual"];
    $hargabeli=$_POST["hargabeli"];
    $stock=$_POST["stock_obat"];
    $ket=$_POST["keterangan"];
    $query="INSERT INTO tb_obat(idobat,idsupplier,namaobat,kategoriobat,hargajual,hargabeli,stock_obat,keterangan) VALUES ('$idobat','$idsupplier','$namaobat','$kategoriobat','$hargajual','$hargabeli','$stock','$ket')";
    $result= mysqli_query($koneksi,$query);

    if(!$result){
        die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }
    else{
        header("Location:obat.php?idobat=$idobat");
    }
?>