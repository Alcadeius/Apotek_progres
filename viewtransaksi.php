<?php
    include 'koneksi.php';
    session_start();
    if(!isset($_SESSION["username"])){
      header("Location:login.php");
      exit();
  }
    // $query="SELECT * FROM tb_transaksi";
    // $result= mysqli_query($koneksi,$query);

    // if(!$result){
    //     die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    // }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="design.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
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
            <div class="col-5" style="margin-top: 60px;margin-left: 455px;"><button id="add" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i> Add Transaksi</button></div>
        </div>
        <div class="row">
          <div class="col-2 awal"><p id="line"></p></div>
        </div>
        <div class="row">
          <div class="col-2 awal"><div class="wapo"><div class="module"><a href="dashboard.php" style="color: white; text-decoration:none;">Dashboard</a></div></div></div>
        </div>
        <div class="row">
          <div class="col-2 awal" style="height:358px;"><a class="nara" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-tasks"></i> Tables</a>
          <div class="collapse" id="collapseExample">
        <div> <br>
        <a class="duet" href="viewtransaksi.php"><ol><i class="fas fa-file-invoice-dollar"></i> Tabel Transaksi</ol></a>  
        <a class="duet" href="index.php"><ol><i class="fas fa-door-open"></i> Tabel Login</ol></a>
        <a class="duet" href="#"><ol><i class="fas fa-pills"></i> Tabel Obat</ol></a>
        <a class="duet" href="#"><ol><i class="fas fa-user"></i> Tabel Karyawan</ol></a>
        <a class="duet" href="#"><ol><i class="fas fa-warehouse"></i> Tabel Supplier</ol></a>
        <a class="duet" href="#"><ol><i class="fas fa-user-friends"></i> Tabel Pelanggan</ol></a>
      </div>
        </div>
        </div>
        <div class="row">
          <div class="col-2 awal" style="width: 17%;"> @Copyright Andre</div>
        </div>

   <center><h1 style="margin-top: -590px;">Table Transaksi</h1></center>
   <table style="width: 80%;height: 400px;margin-left: 230px;margin-top: -470px;">
       <thead>
           <tr>
               <th>Id Transaksi</th>
               <th>Nama Pelanggan</th>
               <th>Tgl Transaksi</th>
               <th>Kategori Pelanggan</th>
               <th>Total Bayar</th>
               <th>Bayar</th>
               <th>Kembali</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
           <?php
        //    $query="SELECT tbt.*, tbp.namalengkap, tbk.namakaryawan FROM tb_transaksi tbt
        //    LEFT JOIN tb_karyawan tbk on tbt.idpelanggan = tbk.idkaryawan
        //    LEFT JOIN tb_pelanggan tbp on tbt.idpelanggan = tbp.idpelanggan";

            $query="SELECT * FROM tb_transaksi
            LEFT JOIN tb_karyawan ON tb_transaksi.idpelanggan = tb_karyawan.idkaryawan
            LEFT JOIN tb_pelanggan ON tb_transaksi.idpelanggan = tb_pelanggan.idpelanggan";

           $result= mysqli_query($koneksi,$query);

            if(!$result){
                die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
            }
   
            while($row=mysqli_fetch_assoc($result))
           {
           ?>
        <tr>
           <td><?php echo $row['idtransaksi']; ?></td>
           <td><?php echo $row['namalengkap']; ?></td>
           <td><?php echo $row['tgltransaksi']; ?></td>
           <td><?php echo $row['kategoripelanggan']; ?></td>
           <td><?php echo number_format($row['totalbayar'],0, ',','.'); ?></td>
           <td><?php echo number_format($row['bayar'],0, ',','.'); ?></td>
           <td><?php echo number_format($row['kembali'],0, ',','.'); ?></td>
           
           <td>
               <a href="transaksi_detail.php?idtransaksi=<?php echo $row['idtransaksi'];?>"class="ed">Detail Transaksi</a> |
               <a href="deletetransaksi.php?idtransaksi=<?php echo $row['idtransaksi'];?>" id="del">Hapus</a>
           </td>
        </tr>
        <?php
           }
        ?>
       </tbody>
   </table> 
   
   <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form action="proses_insert.php" method="POST">
        <div class="mb-3">
        <label for="" class="form-label">Id Transaksi</label>
        <input type="text" name="idtransaksi" class="form-control" require="" id="">
        </div>
        <div class="mb-3">
        <label for="" class="form-label">Tanggal Transaksi</label>
        <input type="date" name="tgltransaksi" value="<? date('y-m-d') ?>" class="form-control" require="" id="">
        </div>
        <div class="mb-3">
        <label for="" class="form-label">Id Pelanggan</label>
        <select name="idpelanggan" id="">
            <option value="" disabled selected> Pilih Pelanggan</option>
            <?php
            $query = "SELECT * FROM tb_pelanggan";
            $result = mysqli_query($koneksi, $query);
            if (!$result) {
                die("Query error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
            }
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?php echo $row['idpelanggan']; ?>"><?= $row['idpelanggan'] ?> | <?= $row['namalengkap'] ?></option>
            <?php } ?>
        </select>
        </div>
        <div class="mb-3">
        <label for="" class="form-label">Kategori Pelanggan</label>
        <input type="text" name="kategoripelanggan" class="form-control" require="" id="">
        </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </div>
    </div>
</form>   
    <br>
   <button class="btn btn-primary" style="width: 10%;margin-left: 680px; margin-top: -60px;margin-bottom: 20px;" onclick="window.print()">Cetak</button>
   <!-- <a href="stock.php" class="btn btn-primary">Lihat stock</a> -->

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
            <div class="col-2 awal"><div id="img"></div> <p id="sen" style="margin-left: -2px;">Username:<?php echo $_SESSION["username"];?><br>Status:<?php echo $_SESSION["leveluser"];?></p></div>
            <div class="col-5" style="margin-top: 60px;margin-left: 455px;"><button id="add" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i> Add Transaksi</button></div>
        </div>
        <div class="row">
          <div class="col-2 awal"><p id="line"></p></div>
        </div>
        <div class="row">
          <div class="col-2 awal"><div class="wapo"><div class="module"><a href="dashboard.php" style="color: white; text-decoration:none;">Dashboard</a></div></div></div>
        </div>
        <div class="row">
          <div class="col-2 awal" style="height:358px;"><a class="nara" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-tasks"></i> Tables</a>
          <div class="collapse" id="collapseExample">
        <div> <br>
        <a class="duet" href="viewtransaksi.php"><ol style="width: 157;padding-left: 1px;"><i class="fas fa-file-invoice-dollar"></i> Tabel Transaksi</ol></a>  
        <a class="duet" href="#"><ol style="width: 157;padding-left: 1px;"><i class="fas fa-user-friends"></i> Tabel Pelanggan</ol></a>
      </div>
        </div>
        </div>
        <div class="row">
          <div class="col-2 awal" style="width: 17%;"> @Copyright Andre</div>
        </div>

   <center><h1 style="margin-top: -590px;">Table Transaksi</h1></center>
   <table style="width: 80%;height: 400px;margin-left: 230px;margin-top: -470px;">
       <thead>
           <tr>
               <th>Id Transaksi</th>
               <th>Nama Pelanggan</th>
               <th>Tgl Transaksi</th>
               <th>Kategori Pelanggan</th>
               <th>Total Bayar</th>
               <th>Bayar</th>
               <th>Kembali</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
           <?php
        //    $query="SELECT tbt.*, tbp.namalengkap, tbk.namakaryawan FROM tb_transaksi tbt
        //    LEFT JOIN tb_karyawan tbk on tbt.idpelanggan = tbk.idkaryawan
        //    LEFT JOIN tb_pelanggan tbp on tbt.idpelanggan = tbp.idpelanggan";

            $query="SELECT * FROM tb_transaksi
            LEFT JOIN tb_karyawan ON tb_transaksi.idpelanggan = tb_karyawan.idkaryawan
            LEFT JOIN tb_pelanggan ON tb_transaksi.idpelanggan = tb_pelanggan.idpelanggan";

           $result= mysqli_query($koneksi,$query);

            if(!$result){
                die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
            }
   
            while($row=mysqli_fetch_assoc($result))
           {
           ?>
        <tr>
           <td><?php echo $row['idtransaksi']; ?></td>
           <td><?php echo $row['namalengkap']; ?></td>
           <td><?php echo $row['tgltransaksi']; ?></td>
           <td><?php echo $row['kategoripelanggan']; ?></td>
           <td><?php echo number_format($row['totalbayar'],0, ',','.'); ?></td>
           <td><?php echo number_format($row['bayar'],0, ',','.'); ?></td>
           <td><?php echo number_format($row['kembali'],0, ',','.'); ?></td>
           
           <td>
               <a href="transaksi_detail.php?idtransaksi=<?php echo $row['idtransaksi'];?>"class="ed">Detail Transaksi</a> 
               
           </td>
        </tr>
        <?php
           }
        ?>
       </tbody>
   </table> 
   
   <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form action="proses_insert.php" method="POST">
        <div class="mb-3">
        <label for="" class="form-label">Id Transaksi</label>
        <input type="text" name="idtransaksi" class="form-control" require="" id="">
        </div>
        <div class="mb-3">
        <label for="" class="form-label">Tanggal Transaksi</label>
        <input type="date" name="tgltransaksi" value="<? date('y-m-d') ?>" class="form-control" require="" id="">
        </div>
        <div class="mb-3">
        <label for="" class="form-label">Id Pelanggan</label>
        <select name="idpelanggan" class="form-select" id="">
            <option value="" disabled selected> Pilih Pelanggan</option>
            <?php
            $query = "SELECT * FROM tb_pelanggan";
            $result = mysqli_query($koneksi, $query);
            if (!$result) {
                die("Query error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
            }
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?php echo $row['idpelanggan']; ?>"><?= $row['idpelanggan'] ?> | <?= $row['namalengkap'] ?></option>
            <?php } ?>
        </select>
        </div>
        <div class="mb-3">
        <label for="" class="form-label">Kategori Pelanggan</label>
        <input type="text" name="kategoripelanggan" class="form-control" require="" id="">
        </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </div>
    </div>
</form>   
    <br>
   <button class="btn btn-primary" style="width: 10%;margin-left: 680px; margin-top: -60px;margin-bottom: 20px;" onclick="window.print()">Cetak</button>
   <!-- <a href="stock.php" class="btn btn-primary">Lihat stock</a> -->

   <?php
  }
   ?>
   
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php if(isset($_GET["oke"])) {?>
        <script>   
         swal("", "<?php echo $_GET["oke"]?>", "success");    
        </script>
        <?php } ?>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>  
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="print.js"></script>
</body>
</html>