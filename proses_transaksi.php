<?php
    include 'koneksi.php';
    session_start();
   
    $idtransaksi=$_POST["idtransaksi"];
    insertDetailTransaksi($koneksi);
    header("Location:transaksi_detail.php?idtransaksi=$idtransaksi");

    function insertDetailTransaksi($koneksi){
        $idtransaksi    =$_POST['idtransaksi'];
    
        if(isset($_POST['idobat']) && isset($_POST['jumlah'])){
            $idobat     =$_POST['idobat'];
            $jumlah     =$_POST['jumlah'];
            $hargasatuan=getHargaSatuanObat($koneksi, $idobat);
            $totalharga =(float)$jumlah * (float)$hargasatuan;
            // validasiKetersediaanStokObat($mysqli, $idtransaksi,$idobat,$jumlah);
    
            $query = "INSERT INTO tb_detail_transaksi (idtransaksi, idobat, jumlah, hargasatuan, totalharga) VALUES ('$idtransaksi', '$idobat', '$jumlah', '$hargasatuan','$totalharga')";
            $result= mysqli_query($koneksi, $query);
    
            // updateStokObat($mysqli, $idobat, $jumlah);
            
        }
    }
    function getHargaSatuanObat($koneksi, $idobat){
        $query = "SELECT * FROM tb_obat WHERE idobat = $idobat";
        return mysqli_fetch_assoc(mysqli_query($koneksi, $query))['hargajual'];
    }
?>