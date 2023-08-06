<?php
    include 'koneksi.php';
    session_start();

    $idtransaksi=$_POST['idtransaksi'];
    // $idkasir=$_SESSION['idkaryawan'];
    $tgltransaksi =$_POST['tgltransaksi'];
    $kategoripelanggan = $_POST['kategoripelanggan'];
    $idpelanggan= $_POST['idpelanggan'];

    $query="INSERT INTO tb_transaksi (idtransaksi, tgltransaksi, idpelanggan, kategoripelanggan) VALUES ('$idtransaksi','$tgltransaksi','$idpelanggan','$kategoripelanggan')";
   
    $result = mysqli_query($koneksi, $query);

    $idbaru= $koneksi -> insert_id;
    // echo $idbaru;

    if($result){
        header("location: transaksi_detail.php?idtransaksi=".$idbaru."&input_obat=true");
        // echo "benar";
    }
    // else showErrorMessage($koneksi);
    else echo "salah".mysqli_connect_error($koneksi);
?>