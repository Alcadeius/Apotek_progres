<?php
  include 'koneksi.php';
  session_start();
  if(!isset($_SESSION["username"])){
    header("Location:login.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="dash.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <title>Dashboard</title>
  </head>
  <?php
  if($_SESSION["leveluser"]=="admin"){
  ?>
  <body>
    <div class="toast" style="position:absolute; bottom:0; right:0; width: 25%;">
      <div class="toast-header">
        <img src="image/hecker.jpeg" style="width: 30px; height:30px" class="rounded me-2" alt="...">
        <strong class="me-auto">Selamat Datang <?php echo $_SESSION["username"] ?> </strong>
      </div>
      <div class="toast-body">
        Terima Kasih Telah Login
      </div>
    </div>
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
        <a class="duet" href="index.php"><ol><i class="fas fa-door-open"></i> Tabel Login</ol></a>
        <a class="duet" href="obat.php"><ol><i class="fas fa-pills"></i> Tabel Obat</ol></a>
        <a class="duet" href="karyawan.php"><ol><i class="fas fa-user"></i> Tabel Karyawan</ol></a>
        <a class="duet" href="supplier.php"><ol><i class="fas fa-warehouse"></i> Tabel Supplier</ol></a>
        <a class="duet" href="pelanggan.php"><ol style="width: 150px;"><i class="fas fa-user-friends"></i> Tabel Pelanggan</ol></a>
      </div>
        </div>
        </div>
        <div class="row">
          <div class="col-2 awal" style="width: 217px;"> @Copyright Andre</div>
        </div>
        <div style="margin-left: 210px;margin-top: -550px;width: 300px;height: 100px;">
        <a href="obat.php"><h2 class="ushu"> Tabel Obat</h2>
        <span class="material-icons lai">medical_services</span><p class="pajang"></p><p class="awas">Lihat Disini</p></a>  
        </div>
        <div style="margin-left: 60px;margin-top: -550px;width: 300px;height: 100px;">
        <a href="karyawan.php"><h2 class="ushu"> Tabel Karyawan</h2>
        <span class="material-icons ius">people</span><p class="pajang"></p><p class="awas">Lihat Disini</p></a>  
        </div>
        <div style="margin-left: 930px;margin-top: -550px;width: 300px;height: 100px;">
        <a href="viewtransaksi.php"><h2 class="ushu"> Tabel Transaksi</h2>
        <span class="material-icons awq">payments</span><p class="pajang"></p><p class="awas">Lihat Disini</p></a>  
        </div>
        <div style="margin-left: 210px;margin-top: -300px;width: 300px;height: 100px;">
        <a href="index.php"><h2 class="ushu"> Tabel Login</h2>
        <span class="material-icons lol">login</span><p class="pajang"></p><p class="awas">Lihat Disini</p></a>  
        </div>
        <div style="margin-left: 60px;margin-top: -300px;width: 300px;height: 100px;">
        <a href="pelanggan.php"><h2 class="ushu"> Tabel Pelanggan</h2>
        <span class="material-icons lel">person_add</span><p class="pajang"></p><p class="awas">Lihat Disini</p></a>  
        </div>
        <div style="margin-left: 930px;margin-top: -300px;width: 300px;height: 100px;">
        <a href="supplier.php"><h2 class="ushu"> Tabel Supplier</h2>
        <span class="material-icons lul">list_alt</span><p class="pajang"></p><p class="awas">Lihat Disini</p></a>  
        </div>
    <?php
      }
    ?>
    
  <?php
  if($_SESSION["leveluser"]=="karyawan"){
  ?>
  <body>
  <div class="toast" style="position:absolute; bottom:0; right:0; width: 25%;">
      <div class="toast-header">
        <img src="image/foto.jpg" style="width: 30px; height:30px" class="rounded me-2" alt="...">
        <strong class="me-auto">Selamat Datang Karyawan <?php echo $_SESSION["username"] ?> </strong>
      </div>
      <div class="toast-body">
        Silahkan Bekerja Dengan Giat
      </div>
    </div>
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
            <div class="col-2 awal"><div id="img"></div> <p id="sen" style="margin-left: -2px;">Username:<?php echo $_SESSION["username"];?><br>Status:<?php echo $_SESSION["leveluser"];?></p></div>
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
        <a class="duet" href="pelanggan.php"><ol style="width: 150px;"><i class="fas fa-user-friends"></i> Tabel Pelanggan</ol></a>
      </div>
        </div>
        </div>
        <div class="row">
          <div class="col-2 awal" style="width: 217px;"> @Copyright Andre</div>
        </div>  
        <div style="margin-left: 210px;margin-top: -550px;width: 300px;height: 100px;">
        <a href="viewtransaksi.php"><h2 class="ushu"> Tabel Transaksi</h2>
        <span class="material-icons awq">payments</span><p class="pajang"></p><p class="awas">Lihat Disini</p></a>  
        </div>
        
        <div style="margin-left: 60px;margin-top: -550px;width: 300px;height: 100px;">
        <a href="pelanggan.php"><h2 class="ushu"> Tabel Pelanggan</h2>
        <span class="material-icons lel">person_add</span><p class="pajang"></p><p class="awas">Lihat Disini</p></a>  
        </div>
    <?php
      }else if($_SESSION["leveluser"]=='user'){
    ?>
  <div class="toast" style="position:absolute; bottom:0; right:0; width: 25%;">
      <div class="toast-header">
        <img src="image/foto.jpg" style="width: 30px; height:30px" class="rounded me-2" alt="...">
        <strong class="me-auto">Selamat Datang user <?php echo $_SESSION["username"] ?> </strong>
      </div>
      <div class="toast-body">
        Silahkan Bekerja Dengan Giat
      </div>
    </div>
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
            <div class="col-2 awal"><div id="img"></div> <p id="sen" style="margin-left: -2px;">Username:<?php echo $_SESSION["username"];?><br>Status:<?php echo $_SESSION["leveluser"];?></p></div>
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
        <!-- <a class="duet" href="pelanggan.php"><ol style="width: 150px;"><i class="fas fa-user-friends"></i> Tabel Pelanggan</ol></a> -->
      </div>
        </div>
        </div>
        <div class="row">
          <div class="col-2 awal" style="width: 217px;"> @Copyright Andre</div>
        </div>  
        <div style="margin-left: 210px;margin-top: -550px;width: 300px;height: 100px;">
        <a href="viewtransaksi.php"><h2 class="ushu"> Tabel Transaksi</h2>
        <span class="material-icons awq">payments</span><p class="pajang"></p><p class="awas">Lihat Disini</p></a>  
        </div>
    <?php
      }
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    
    <script>
      $(document).ready(function(){
        $('.toast').toast('show');
      })
    </script>
  
</body>
</html>
