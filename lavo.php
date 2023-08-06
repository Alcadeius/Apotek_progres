<?php
    include 'koneksi.php';
    session_start();
    $idobat=$_POST["idobat"];
    $namaobat=$_POST["namaobat"];
    $kategoriobat=$_POST["kategoriobat"];
    $hargajual=$_POST["hargajual"];
    $hargabeli=$_POST["hargabeli"];
    $stock=$_POST["stock_obat"];
    $ket=$_POST["keterangan"];
    
    $query="UPDATE tb_obat SET namaobat='$namaobat',kategoriobat='$kategoriobat',hargajual='$hargajual',hargabeli='$hargabeli',stock_obat='$stock',keterangan='$ket' WHERE idobat='$idobat'";
    $result= mysqli_query($koneksi,$query);

    if(!$result){
        die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }
    else{
        header("Location:obat.php");
    }
?>