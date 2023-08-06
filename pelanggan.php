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
    <link rel="stylesheet" href="moda.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <title>Dashboard</title>
  </head>
  <body>
    <?php
    if($_SESSION["leveluser"]=="admin"){
    ?>
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
            <div class="col-5" style="margin-top: 70px;margin-left: 430px;"><button id="add" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Pelanggan</button></div>
            <!-- Modal Insert -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><center>Tambah Pelanggan</center> </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">          
              <form action="koi.php" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                  <label for="" class="form-label">Id Pelanggan</label>
                  <input type="text" name="idpelanggan" class="form-control" require="" id="">
                  </div>
                  <div class="mb-3">
                  <label for="" class="form-label">Nama Lengkap</label>
                  <input type="text" name="namalengkap" class="form-control" id=""  require="">
                  </div>
                  <div class="mb-3">
                  <label for="" class="form-label">Alamat</label>
                  <input type="text" name="alamat" class="form-control" require="" id="">
                  </div>
                  <div class="mb-3">
                  <label for="" class="form-label">Telpon</label>
                  <input type="text" name="telp" class="form-control" require="" id="">
                  </div>
                  <div class="mb-3">
                  <label for="" class="form-label">Usia</label>
                  <input type="text" name="usia" class="form-control" require="" id="">
                  </div>
                  <div class="mb-3">
                  <label for="" class="form-label">Foto Resep</label>
                  <input type="file" name="buktifotoresep" class="form-control" require="" id="">
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
          </form>
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
        <a class="duet" href="#"><ol><i class="fas fa-user"></i> Tabel Karyawan</ol></a>
        <a class="duet" href="#"><ol><i class="fas fa-warehouse"></i> Tabel Supplier</ol></a>
        <a class="duet active" href="#"><ol><i class="fas fa-user-friends"></i> Tabel Pelanggan</ol></a>
      </div>
        </div>
        </div>
        <div class="row">
          <div class="col-2 awal" style="width: 17.3%; margin-top: 0px;"> @Copyright Andre</div>
        </div>

        <center><h1>Table Pelanggan</h1></center> 

   <table style="margin-top: -450px;width: 80%;margin-left: 230px;height: 300px;">
       <thead>
           <tr>
               <th>Id Pelanggan</th>
               <th>Nama Lengkap</th>
               <th>Alamat</th>
               <th>Telpon</th>
               <th style="width: 80px;">Usia</th>
               <th>Foto Resep</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
           <?php
           $query="SELECT * FROM tb_pelanggan";
           $result= mysqli_query($koneksi,$query);
       
           if(!$result){
               die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
           }
           while($row=mysqli_fetch_assoc($result))
           {
           ?>
        <tr>
           <td><?php echo $row['idpelanggan']; ?></td>
           <td><?php echo $row['namalengkap']; ?></td>
           <td><?php echo $row['alamat']; ?></td>
           <td><?php echo $row['telp']; ?></td>
           <td><?php echo $row['usia']; ?></td>
           <td><img style="width: 100px; height: 100px;" src="image/<?php echo $row['buktifotoresep']; ?>" alt=""></td>
           <td style="width: 200px;">
           <a href="ed.php?idpelanggan=<?php echo $row['idpelanggan'] ?>" class="ed">Edit</a> |
           <a href="de.php?idpelanggan=<?php echo $row['idpelanggan'] ?>" id="del">Delete</a>
           </td>
        </tr>
        <?php
           }
        ?>
       </tbody>
   </table>
    <?php
    }
    ?>

    <?php
    if($_SESSION["leveluser"]=="karyawan"){
    ?>
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
            <div class="col-2 awal"><div id="img">a</div> <p id="sen" style="margin-left: -2px;">Username:<?php echo $_SESSION["username"];?><br>Status:<?php echo $_SESSION["leveluser"];?></p></div>
            <div class="col-5" style="margin-top: 70px;margin-left: 430px;"><button id="add" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Pelanggan</button></div>
            <!-- Modal Insert -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><center>Tambah Pelanggan</center> </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">          
              <form action="koi.php" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                  <label for="" class="form-label">Id Pelanggan</label>
                  <input type="text" name="idpelanggan" class="form-control" require="" id="">
                  </div>
                  <div class="mb-3">
                  <label for="" class="form-label">Nama Lengkap</label>
                  <input type="text" name="namalengkap" class="form-control" id=""  require="">
                  </div>
                  <div class="mb-3">
                  <label for="" class="form-label">Alamat</label>
                  <input type="text" name="alamat" class="form-control" require="" id="">
                  </div>
                  <div class="mb-3">
                  <label for="" class="form-label">Telpon</label>
                  <input type="text" name="telp" class="form-control" require="" id="">
                  </div>
                  <div class="mb-3">
                  <label for="" class="form-label">Usia</label>
                  <input type="text" name="usia" class="form-control" require="" id="">
                  </div>
                  <div class="mb-3">
                  <label for="" class="form-label">Foto Resep</label>
                  <input type="file" name="buktifotoresep" class="form-control" require="" id="">
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
          </form>
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
        <a class="duet" href="#"><ol style="width: 150px;"><i class="fas fa-user-friends"></i> Tabel Pelanggan</ol></a>
      </div>
        </div>
        </div>
        <div class="row">
          <div class="col-2 awal" style="width: 17.3%; margin-top: 0px;"> @Copyright Andre</div>
        </div>

        <center><h1>Table Pelanggan</h1></center> 

   <table style="margin-top: -450px;width: 80%;margin-left: 230px;height: 300px;">
       <thead>
           <tr>
               <th>Id Pelanggan</th>
               <th>Nama Lengkap</th>
               <th>Alamat</th>
               <th>Telpon</th>
               <th style="width: 80px;">Usia</th>
               <th>Foto Resep</th>
           </tr>
       </thead>
       <tbody>
           <?php
           $query="SELECT * FROM tb_pelanggan";
           $result= mysqli_query($koneksi,$query);
       
           if(!$result){
               die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
           }
           while($row=mysqli_fetch_assoc($result))
           {
           ?>
        <tr>
           <td><?php echo $row['idpelanggan']; ?></td>
           <td><?php echo $row['namalengkap']; ?></td>
           <td><?php echo $row['alamat']; ?></td>
           <td><?php echo $row['telp']; ?></td>
           <td><?php echo $row['usia']; ?></td>
           <td><img style="width: 100px; height: 100px;" src="image/<?php echo $row['buktifotoresep']; ?>"></td>
        </tr>
        <?php
           }
        ?>
       </tbody>
   </table>
    <?php
    }
    ?>
        
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php if(isset($_GET["msg"])) {?>
        <script>   
         swal("Yey", "<?php echo $_GET["msg"]?>", "success");    
        </script>
    <?php } ?>
    <?php if(isset($_GET["psn"])) {?>
        <script>   
         swal("Yey", "<?php echo $_GET["psn"]?>", "success");    
        </script>
    <?php } ?>
    <?php if(isset($_GET["note"])) {?>
        <script>   
         swal("Yey", "<?php echo $_GET["note"]?>", "success");    
        </script>
    <?php } ?>
    <?php if(isset($_GET["leak"])) {?>
        <script>   
         swal("Yey", "<?php echo $_GET["leak"]?>", "success");    
        </script>
    <?php } ?>
</body>
</html>
