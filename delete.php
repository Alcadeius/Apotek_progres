<?php
    include 'koneksi.php';
    session_start();
    $username=$_GET["username"];
    $query="DELETE FROM tb_login WHERE username='$username'";
    $result= mysqli_query($koneksi,$query);

    if(!$result){
        die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }
    else{
        header("Location:index.php?msg=Berhasil Delete"); 
    }
?>