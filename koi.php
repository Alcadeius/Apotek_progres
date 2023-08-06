<?php
    include 'koneksi.php';

    $idpelanggan=$_POST["idpelanggan"];
    $namalengkap=$_POST["namalengkap"];
    $alamat=$_POST["alamat"];
    $telp=$_POST["telp"];
    $usia=$_POST["usia"];
    $bukti=$_FILES["buktifotoresep"]["name"];
    $file_tmp=$_FILES['buktifotoresep']['tmp_name'];

    // if($bukti["type"]=="image/png" || $bukti["type"]=="image/jpeg" || $bukti["type"]=="image/mp3"){
    
    
    //     move_uploaded_file($bukti["tmp_name"], "./image/".$photo);

    if($bukti !=""){
        $format_boleh= array('png','jpg','jpeg');
        $pisah=explode('.',$bukti);
        $format=strtolower(end($pisah));
        $gambar=uniqid().'-'.$format;

        if(in_array($format,$format_boleh)===true){
            move_uploaded_file($file_tmp,'image/'.$gambar);

            $query="INSERT INTO tb_pelanggan(idpelanggan,namalengkap,alamat,telp,usia,buktifotoresep) VALUES ('$idpelanggan','$namalengkap','$alamat','$telp','$usia','$gambar')";
            $result= mysqli_query($koneksi,$query);

            if(!$result){
                die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
            }
            else{
                header("Location:pelanggan.php"); 
            }
        }
    }
?>