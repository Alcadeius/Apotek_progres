<?php
    session_start();
    include 'koneksi.php';

    $username=$_POST["username"];
    $password=$_POST["password"];

    $result=mysqli_query($koneksi,"SELECT * FROM tb_login where username='$username' AND  password='$password'");
    $cek=mysqli_num_rows($result);
    if($cek > 0){  
        $data=mysqli_fetch_assoc($result);
        if($data["leveluser"]=="admin"){
        $_SESSION["username"]=$username;
        $_SESSION["password"]=$password;
        $_SESSION["leveluser"]=$leveluser;
        $_SESSION["leveluser"]="admin";
        $_SESSION["idkaryawan"]=$data["idkaryawan"];
        $_SESSION["namaobat"]=$data["namaobat"];
        $_SESSION["idobat"]=$data["idobat"];
        header("Location:dashboard.php");
        }
        else if($data["leveluser"]=="karyawan"){
            $_SESSION["username"]=$username;
            $_SESSION["password"]=$password;
            $_SESSION["leveluser"]="karyawan";
            $_SESSION["idkaryawan"]=$data["idkaryawan"];
            $_SESSION["namaobat"]=$data["namaobat"];
            $_SESSION["idobat"]=$data["idobat"];
            header("Location:dashboard.php");
        }else if($data["leveluser"]=="user"){
            $_SESSION["username"]=$username;
            $_SESSION["password"]=$password;
            $_SESSION["leveluser"]="user";
            $_SESSION["idkaryawan"]=$data["idkaryawan"];
            $_SESSION["namaobat"]=$data["namaobat"];
            $_SESSION["idobat"]=$data["idobat"];
            header("Location:dashboard.php");
        }
    }
    else{
        header("Location:login.php?msg=Data tidak ditemukan.");
    }
?>