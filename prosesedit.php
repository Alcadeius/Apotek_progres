<?php
    include 'koneksi.php';
    session_start();
    $username=$_POST["username"];
    $password=$_POST["password"];
    $leveluser=$_POST["leveluser"];
    // $level=$_POST["leveluser"];
    
    $query="UPDATE tb_login SET password='$password',leveluser='$leveluser' WHERE username='$username'";
    $result= mysqli_query($koneksi,$query);

    if(!$result){
        die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }
    else{
        header("Location: index.php?note=Berhasil edit");
    }
?>