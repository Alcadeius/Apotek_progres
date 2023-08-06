<?php
    include 'koneksi.php';
    session_start();

    if(isset($_GET['idpelanggan'])){
        $idpelanggan=($_GET["idpelanggan"]);
        $query="SELECT * FROM tb_pelanggan WHERE idpelanggan='$idpelanggan'";
        $result= mysqli_query($koneksi,$query);

        if(!$result){
            die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
        }
        $data=mysqli_fetch_assoc($result);
        if(!count($data)){
            header("Location:index.php");
        }
    }else{
            header("Location:pelanggan.php");
        }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="modify.css">
</head>
<body>

        <div class="row">
            <div class="col-2 awal"><i class="fas fa-clinic-medical"></i> Apotek</div>
            <?php
            if(isset($_SESSION["username"])){
            ?>
            <div class="col-10 dua"><a href="logout.php" class="link">Logout</a></div>
            <?php } ?>
            
            <?php
            if(!isset($_SESSION["username"])){
            ?>
            <div class="col-10 dua"><a href="login.php" class="link">Login</a></div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-2 awal"><div class="img"></div> <p id="sen" style="margin-left: -2px;">Username:<?php echo $_SESSION["username"];?><br>Status:<?php echo $_SESSION["leveluser"];?></p></div>
        </div>
        <div class="row">
          <div class="col-2 awal"><p id="line"></p></div>
        </div>
        <div class="row">
          <div class="col-2 awal"><div class="wapo"><div class="module"><a href="dashboard.php" style="color: white;">Dashboard</a></div></div></div>
        </div>
        <div class="row">
          <div class="col-2 awal" style="height:358px;"><a class="nara" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-tasks"></i> Tables</a>
          <div class="collapse" id="collapseExample">
        <div> <br>
        <a class="duet" href="viewtransaksi.php"><ol><i class="fas fa-file-invoice-dollar"></i> Tabel Transaksi</ol></a>  
        <a class="duet active" href="index.php"><ol><i class="fas fa-door-open"></i> Tabel Login</ol></a>
        <a class="duet" href="obat.php"><ol><i class="fas fa-pills"></i> Tabel Obat</ol></a>
        <a class="duet" href="#"><ol style="width: 150px;"><i class="fas fa-user"></i> Tabel Karyawan</ol></a>
        <a class="duet" href="#"><ol><i class="fas fa-warehouse"></i> Tabel Supplier</ol></a>
        <a class="duet" href="#"><ol style="width: 150px;"><i class="fas fa-user-friends"></i> Tabel Pelanggan</ol></a>
      </div>
        </div>
        </div>
        <div class="row">
          <div class="col-2 awal" style="width: 17%; margin-top: 0px;"> @Copyright Andre</div>
        </div>


        <div class="card border-primary mb-3" style="width: 30rem;margin-left: 500px;margin-top: -571px; height:550px;">
        <div class="card-header"><center><h3>Edit Account <?php echo $data['idpelanggan']; ?></h3></center></div>
        <div class="card-body text-primary">
        <form action="por.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="" class="form-label">Nama Lengkap</label>
        <input type="hidden" name="idpelanggan" value="<?php echo $data['idpelanggan'];?>">
        <input type="text" class="form-control" name="namalengkap" value="<?php echo $data['namalengkap'] ?>" require id="">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Alamat</label>
        <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat'] ?>" require id="">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Telpon</label>
        <input type="text" class="form-control" name="telp" value="<?php echo $data['telp'] ?>" require id="">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Usia</label>
        <input type="text" class="form-control" name="usia" value="<?php echo $data['usia'] ?>" require id="">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Foto Resep</label>
        <input type="file" class="form-control" name="buktifotoresep" value="<?php echo $data['buktifotoresep'] ?>" require id="">
    </div>
    <button type="reset" class="btn btn-secondary">Cancel</button>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
        </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
</body>
</html>