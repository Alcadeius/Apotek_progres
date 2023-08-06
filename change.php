<?php
    include 'koneksi.php';
    session_start();

    if(isset($_GET['idobat'])){
        $idobat=($_GET["idobat"]);
        $query="SELECT * FROM tb_obat WHERE idobat='$idobat'";
        $result= mysqli_query($koneksi,$query);

        if(!$result){
            die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
        }
        $data=mysqli_fetch_assoc($result);
        if(!count($data)){
            header("Location:index.php");
        }
    }else{
            header("Location:obat.php");
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
          <div class="col-2 awal" style="height:490px;"><a class="nara" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-tasks"></i> Tables</a>
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


        <div class="card border-primary mb-3" style="width: 30rem;margin-left: 500px;margin-top: -680px;">
        <div class="card-header"><center><h3>Edit Account <?php echo $data['idobat']; ?></h3></center></div>
        <div class="card-body text-primary">
        <form action="lavo.php" method="POST">
    <div class="mb-3">
        <label for="" class="form-label">Nama Obat</label>
        <input type="hidden" name="idobat" value="<?php echo $data['idobat'];?>">
        <input type="text" class="form-control" name="namaobat" value="<?php echo $data['namaobat'] ?>" require id="">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Kategori Obat</label>
        <input type="text" class="form-control" name="kategoriobat" value="<?php echo $data['kategoriobat'] ?>" require id="">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Harga Jual</label>
        <input type="text" class="form-control" name="hargajual" value="<?php echo $data['hargajual'] ?>" require id="">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Harga Beli</label>
        <input type="text" class="form-control" name="hargabeli" value="<?php echo $data['hargabeli'] ?>" require id="">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Stock_obat</label>
        <input type="text" class="form-control" name="stock_obat" value="<?php echo $data['stock_obat'] ?>" require id="">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Keterangan</label>
        <input type="text" class="form-control" name="keterangan" value="<?php echo $data['keterangan'] ?>" require id="">
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