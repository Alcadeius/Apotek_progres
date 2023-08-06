<?php
    include 'koneksi.php';
    session_start();
    $username=$_POST["username"];
    $password=$_POST["password"];
    $leveluser=$_POST["leveluser"];
    $query="INSERT INTO tb_login(username,password,leveluser) VALUES ('$username','$password','$leveluser')";
    $result= mysqli_query($koneksi,$query);

    if(!$result){
        die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }
    else{
        header("Location:index.php?psn=Data Berhasil Ditambahkan");
    }
?>