<?php
    include 'koneksi.php';

    $idpelanggan=$_POST["idpelanggan"];
    $namalengkap=$_POST["namalengkap"];
    $alamat=$_POST["alamat"];
    $telp=$_POST["telp"];
    $usia=$_POST["usia"];
    $bukti=$_FILES["buktifotoresep"]["name"]; 
    $file_tmp=$_FILES['buktifotoresep']['tmp_name'];

    if($bukti !=""){
        $format_boleh= array('png','jpg','jpeg');
        $pisah=explode('.',$bukti);
        $format=strtolower(end($pisah));   
        $gambar=$bukti;
        $gambar=uniqid();
        $gambar.=".";
        $gambar.=$format;
        // $gambar=uniqid().'-'.$format;
        print($gambar);

        if(in_array($format,$format_boleh)===true){
            move_uploaded_file($file_tmp,'image/'.$gambar);

            $query="UPDATE tb_pelanggan SET namalengkap='$namalengkap',alamat='$alamat',telp='$telp',usia='$usia',buktifotoresep='$gambar' WHERE idpelanggan='$idpelanggan'";
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