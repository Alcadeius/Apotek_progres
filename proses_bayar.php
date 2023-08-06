<?php
    include 'koneksi.php';
    session_start();

    $total=$_POST["totalbayar"];
    $bayar=$_POST["bayar"];
    $hasil =$bayar - $total;
    $idtransaksi=$_POST["idtransaksi"];

    $query="UPDATE tb_transaksi SET totalbayar='$total', bayar='$bayar', kembali='$hasil' WHERE idtransaksi='$idtransaksi'";
    $result =mysqli_query($koneksi, $query);

    if($result){
        $_SESSION["result"]=$hasil;
        $_SESSION["bayar"]=$bayar;
        $_SESSION["total"]=$total;
    header("location: transaksi_detail.php?idtransaksi=$idtransaksi&&total=$total");
    }
?>