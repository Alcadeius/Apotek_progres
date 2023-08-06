<?php
    include 'koneksi.php';
    session_start();
    if(!isset($_SESSION["username"])){
      header("Location:login.php");
      exit();
  }
  else if($_SESSION["leveluser"]=="karyawan"){
    header("Location:login.php");
    exit();
}
    $query="SELECT * FROM tb_login";
    $result= mysqli_query($koneksi,$query);

    if(!$result){
        die("Query error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
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
    <link rel="stylesheet" href="styl.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <title>Dashboard</title>
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
            <div class="col-5" style="margin-top: 70px;margin-left: 455px;"><button id="add" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i> Add Account</button></div>
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
        <a class="duet" href="#"><ol><i class="fas fa-user"></i> Tabel Karyawan</ol></a>
        <a class="duet" href="#"><ol><i class="fas fa-warehouse"></i> Tabel Supplier</ol></a>
        <a class="duet" href="#"><ol style="width: 150px;"><i class="fas fa-user-friends"></i> Tabel Pelanggan</ol></a>
      </div>
        </div>
        </div>
        <div class="row">
          <div class="col-2 awal" style="width: 17%; margin-top: 0px;"> @Copyright Andre</div>
        </div>

        <center><h1>Table Login</h1></center> 

   <table style="margin-top: -450px;width: 80%;margin-left: 230px;height: 300px;">
       <thead>
           <tr>
               <th>Username</th>
               <th>Password</th>
               <th>Ket</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
           <?php
           while($row=mysqli_fetch_assoc($result))
           {
           ?>
        <tr>
           <td><?php echo $row['username']; ?></td>
           <td><?php echo $row['password']; ?></td>
           <td><?php echo $row['leveluser']; ?></td>
           <td style="width: 200px;">
               <a href="edit.php?username=<?php echo $row['username'];?>"class="ed">Edit</a> |
               <a href="delete.php?username=<?php echo $row['username'];?>" id="del">Delete</a>
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
        <h5 class="modal-title" id="exampleModalLabel"><center>Add Account</center> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">          
    <form action="insert.php" method="POST">
        <div class="mb-3">
        <label for="" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id=""  require="">
        </div>
        <div class="mb-3">
        <label for="" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" require="" id="">
        </div>
        <div>
        <label for="" class="same">authority User</label><br>
        <input type="radio" name="leveluser" value="admin" id="admin">
        <label for="admin" id="text">admin</label> 
        <input type="radio" name="leveluser" value="Admin" id="user">
        <label for="user">Karyawan</label>
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
