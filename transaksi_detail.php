<?php
    include 'koneksi.php';
    session_start();

    // if(!isset($_SESSION["username"])){
    //     header("Location:login.php?not=not");
    //     exit();
    // }
    $idtransaksi=$_GET["idtransaksi"]; //aku taruh disini V:
    $query="SELECT tbt.*, tbp.namalengkap FROM tb_transaksi tbt
    LEFT JOIN tb_pelanggan tbp ON tbp.idpelanggan = tbt.idpelanggan
    WHERE tbt.idtransaksi='$idtransaksi'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
        die("Query error: ".mysqli_errno($koneksi).
        " - ".mysqli_error($koneksi));
    }
    $datatransaksi = mysqli_fetch_assoc($result);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dah.css">
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
            <div class="col-6"><h2 style="margin-left: 400px;">Detail Transaksi</h2></div>
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
          <div class="col-2 awal" style="width: 217px;"> @Copyright Andre</div>
        </div>

    <table class="table table-bordered border-primary table-hover" style="width: 80%;margin-left: 230px;margin-top: -550px;margin-bottom: 450px;">
    <?php
    if(isset($_POST["tgltransaksi"])){ //aku gtw ini fungsinya buat apa V:
    $tgltransaksi=$_POST["tgltransaksi"];
    $namapelanggan=$_POST["namapelanggan"];
    $kategoripelanggan=$_POST["kategoripelanggan"];
    $_SESSION["tgltransaksi"]=$tgltransaksi;
    $_SESSION["namapelanggan"]=$namapelanggan;
    $_SESSION["kategoripelanggan"]=$kategoripelanggan;
    }
    ?>
        <td>Tanggal transaksi</td>
        <td><?php echo $datatransaksi["tgltransaksi"]; ?></td>
        <tr>
            <td>Pelanggan</td>
            <td><?php echo $datatransaksi["namalengkap"]; ?></td>
        </tr>
        <tr>
            <td>Kategori Pelanggan</td>
            <td><?php echo $datatransaksi["kategoripelanggan"]; ?></td>
        </tr>
    </table>
    <table class="table table-bordered border-primary" style="width: 80%;margin-left: 230px;margin-top: -420px;margin-bottom: 450px;">
        <thead>
            <th>Nama Obat</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Total Harga</th>
        </thead>
        <?php
        $query = "SELECT tbo.namaobat, tbd.* FROM tb_detail_transaksi tbd
        LEFT JOIN tb_obat tbo ON tbo.idobat = tbd.idobat WHERE tbd.idtransaksi = '$idtransaksi'";
        $result = mysqli_query($koneksi, $query);

        while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['namaobat'] ?></td>
            <td><?php echo $row['jumlah'] ?></td>
            <td><?php echo $row['hargasatuan'] ?></td>
            <td><?php echo $row['totalharga'] ?></td>
        </tr>
        <?php
            }
        ?>
        <tr>
        <td colspan="3">Grand Total</td>           
        <td>
            <?php
                $query="SELECT totalharga FROM tb_detail_transaksi WHERE idtransaksi='$idtransaksi'";
                $result = mysqli_query($koneksi, $query);
                if(!$result){
                    die("Query error: ".mysqli_errno($koneksi).
                    " - ".mysqli_error($koneksi));
                }
                $grandtotal=0;
                while($row= mysqli_fetch_assoc($result)){
                    $grandtotal=$grandtotal+$row["totalharga"];
                }
                echo $grandtotal; 
            ?>
        </td>
        </tr>
        </tbody>
    </table>

     <!-- VIEW KEMBALI -->
       
     <?php
        if(isset($datatransaksi["totalbayar"])) {
        ?>
                <table class="table table-bordered" style="width: 80%;margin-left: 230px;margin-top: -420px;margin-bottom: 450px;">
                    <td>Total</td>
                    <td><?php echo $datatransaksi["totalbayar"]; ?></td>
                    <tr>
                        <td>Bayar</td>
                        <td><?php echo $datatransaksi["bayar"]; ?></td>
                    </tr>
                    <tr>
                        <td>Hasil</td>
                        <td><?php echo $datatransaksi["kembali"]; ?></td>
                    </tr>
                </table>
                <a href="viewtransaksi.php?oke=Data telah terupdate" class="btn btn-primary" style="width: 10%;margin-left: 240px;margin-top: -430px;margin-bottom: 430px;">Lihat Transaksi</a>
                <button class="btn btn-primary" onclick="window.print()" style="width: 10%;margin-left: 10px;margin-top: -430px;margin-bottom: 430px;">Cetak</button>
            <?php
            } else {
            ?>
            <!-- VIEW KEMBALI END -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#biaya" style="width: 10%;margin-left: 240px;margin-top: -430px;margin-bottom: 430px;">Bayar</button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#obat" style="width: 10%;margin-left: 10px;margin-top: -430px;margin-bottom: 430px;">Masukan Obat</button>
        <?php } ?>

        <!-- Modal Bayar -->
        <div class="modal fade" id="biaya" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php if(isset($grandtotal)){?>    
            <form action="proses_bayar.php" method="POST">
                <label for="">Total</label>
                    <input type="hidden" name="idtransaksi" value="<?php echo $idtransaksi; ?>">
                    <input type="text" class="form-control" name="totalbayar" value="<?php echo $grandtotal; ?>"><br>
                    <label for="" class="form-label">Bayar</label>
                    <input type="text" name="bayar" class="form-control" id="">
            <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Bayar</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    
    
<!-- Modal Obat -->
    <div class="modal fade" id="obat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Tambah Obat</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="proses_transaksi.php" method="post"  enctype="multipart/form-data">
                <input type="hidden" name="idtransaksi" value="<?php echo $idtransaksi; ?>">
                <input type="hidden" name="tgltransaksi" value="<?php echo $row['tgltransaksi']; ?>">
                <input type="hidden" name="idpelanggan" value="<?php echo $row['idpelanggan']; ?>">
                <input type="hidden" name="kategoripelanggan" value="<?php echo $row['kategoripelanggan']; ?>">
                <input type="hidden" name="stock_obat" value="<?php echo $row['stock_obat']; ?>">
                <label for="idobat">Obat</label>
                <select name="idobat">
                    <option disabled selected>Pilih Obat</option>
                    <?php
                        $query = "SELECT * FROM tb_obat";
                        $result = mysqli_query($koneksi, $query);
                        while($row= mysqli_fetch_assoc($result)){
                    ?>
                        <option value="<?php echo $row['idobat']; ?>"><?php echo $row['namaobat']." | ".$row['hargajual']; ?></option>
                    <?php
                        }
                    ?>
                </select>
                <input type="number" name="jumlah">
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Masukan</button>
        </div>
        </div>
    </div>
</div>
 </form>
 <?php } ?>

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
            <div class="col-6"><h2 style="margin-left: 400px;">Detail Transaksi</h2></div>
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
        <a class="duet" href="viewtransaksi.php"><ol style="padding-left: 1px;"><i class="fas fa-file-invoice-dollar"></i> Tabel Transaksi</ol></a>  
        <a class="duet" href="index.php"><ol style="padding-left: 1px;"><i class="fas fa-door-open"></i> Tabel Login</ol></a>
        <a class="duet" href="#"><ol style="padding-left: 1px;"><i class="fas fa-pills"></i> Tabel Obat</ol></a>
        <a class="duet" href="#"><ol style="padding-left: 1px;"><i class="fas fa-user"></i> Tabel Karyawan</ol></a>
        <a class="duet" href="#"><ol style="padding-left: 1px;"><i class="fas fa-warehouse"></i> Tabel Supplier</ol></a>
        <a class="duet" href="#"><ol style="padding-left: 1px;"><i class="fas fa-user-friends"></i> Tabel Pelanggan</ol></a>
      </div>
        </div>
        </div>
        <div class="row">
          <div class="col-2 awal" style="width: 217px;"> @Copyright Andre</div>
        </div>

    <table class="table table-bordered border-primary table-hover" style="width: 80%;margin-left: 230px;margin-top: -550px;margin-bottom: 450px;">
    <?php
    if(isset($_POST["tgltransaksi"])){ //aku gtw ini fungsinya buat apa V:
    $tgltransaksi=$_POST["tgltransaksi"];
    $namapelanggan=$_POST["namapelanggan"];
    $kategoripelanggan=$_POST["kategoripelanggan"];
    $_SESSION["tgltransaksi"]=$tgltransaksi;
    $_SESSION["namapelanggan"]=$namapelanggan;
    $_SESSION["kategoripelanggan"]=$kategoripelanggan;
    }
    ?>
        <td>Tanggal transaksi</td>
        <td><?php echo $datatransaksi["tgltransaksi"]; ?></td>
        <tr>
            <td>Pelanggan</td>
            <td><?php echo $datatransaksi["namalengkap"]; ?></td>
        </tr>
        <tr>
            <td>Kategori Pelanggan</td>
            <td><?php echo $datatransaksi["kategoripelanggan"]; ?></td>
        </tr>
    </table>
    <table class="table table-bordered border-primary" style="width: 80%;margin-left: 230px;margin-top: -420px;margin-bottom: 450px;">
        <thead>
            <th>Nama Obat</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Total Harga</th>
        </thead>
        <?php
        $query = "SELECT tbo.namaobat, tbd.* FROM tb_detail_transaksi tbd
        LEFT JOIN tb_obat tbo ON tbo.idobat = tbd.idobat WHERE tbd.idtransaksi = '$idtransaksi'";
        $result = mysqli_query($koneksi, $query);

        while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['namaobat'] ?></td>
            <td><?php echo $row['jumlah'] ?></td>
            <td><?php echo $row['hargasatuan'] ?></td>
            <td><?php echo $row['totalharga'] ?></td>
        </tr>
        <?php
            }
        ?>
        <tr>
        <td colspan="3">Grand Total</td>           
        <td>
            <?php
                $query="SELECT totalharga FROM tb_detail_transaksi WHERE idtransaksi='$idtransaksi'";
                $result = mysqli_query($koneksi, $query);
                if(!$result){
                    die("Query error: ".mysqli_errno($koneksi).
                    " - ".mysqli_error($koneksi));
                }
                $grandtotal=0;
                while($row= mysqli_fetch_assoc($result)){
                    $grandtotal=$grandtotal+$row["totalharga"];
                }
                echo $grandtotal; 
            ?>
        </td>
        </tr>
        </tbody>
    </table>

     <!-- VIEW KEMBALI -->
     <?php
        if(isset($datatransaksi["totalbayar"])) {
        ?>
                <table class="table table-bordered" style="width: 80%;margin-left: 230px;margin-top: -420px;margin-bottom: 450px;">
                    <td>Total</td>
                    <td><?php echo $datatransaksi["totalbayar"]; ?></td>
                    <tr>
                        <td>Bayar</td>
                        <td><?php echo $datatransaksi["bayar"]; ?></td>
                    </tr>
                    <tr>
                        <td>Hasil</td>
                        <td><?php echo $datatransaksi["kembali"]; ?></td>
                    </tr>
                </table>
                <a href="viewtransaksi.php?oke=Data telah terupdate" class="btn btn-primary" style="width: 10%;margin-left: 240px;margin-top: -430px;margin-bottom: 430px;">Lihat Transaksi</a>
                <button class="btn btn-primary" onclick="window.print()" style="width: 10%;margin-left: 10px;margin-top: -430px;margin-bottom: 430px;">Cetak</button>
            <?php
            } else {
            ?>
            <!-- VIEW KEMBALI END -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#biaya" style="width: 10%;margin-left: 240px;margin-top: -430px;margin-bottom: 430px;">Bayar</button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#obat" style="width: 10%;margin-left: 10px;margin-top: -430px;margin-bottom: 430px;">Masukan Obat</button>
        <?php } ?>

        <!-- Modal Bayar -->
        <div class="modal fade" id="biaya" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php if(isset($grandtotal)){?>    
            <form action="proses_bayar.php" method="POST">
                <label for="">Total</label>
                    <input type="hidden" name="idtransaksi" value="<?php echo $idtransaksi; ?>">
                    <input type="text" class="form-control" name="totalbayar" value="<?php echo $grandtotal; ?>"><br>
                    <label for="" class="form-label">Bayar</label>
                    <input type="text" name="bayar" class="form-control" id="">
            <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Bayar</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    
    
<!-- Modal Obat -->
    <div class="modal fade" id="obat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Tambah Obat</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="proses_transaksi.php" method="post"  enctype="multipart/form-data">
                <input type="hidden" name="idtransaksi" value="<?php echo $idtransaksi; ?>">
                <input type="hidden" name="tgltransaksi" value="<?php echo $row['tgltransaksi']; ?>">
                <input type="hidden" name="idpelanggan" value="<?php echo $row['idpelanggan']; ?>">
                <input type="hidden" name="kategoripelanggan" value="<?php echo $row['kategoripelanggan']; ?>">
                <input type="hidden" name="stock_obat" value="<?php echo $row['stock_obat']; ?>">
                <label for="idobat">Obat</label>
                <select name="idobat">
                    <option disabled selected>Pilih Obat</option>
                    <?php
                        $query = "SELECT * FROM tb_obat";
                        $result = mysqli_query($koneksi, $query);
                        while($row= mysqli_fetch_assoc($result)){
                    ?>
                        <option value="<?php echo $row['idobat']; ?>"><?php echo $row['namaobat']." | ".$row['hargajual']; ?></option>
                    <?php
                        }
                    ?>
                </select>
                <input type="number" name="jumlah">
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Masukan</button>
        </div>
        </div>
    </div>
</div>
 </form>
 <?php } ?>

 <?php 
    if($_SESSION["leveluser"]=="user"){
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
            <div class="col-6"><h2 style="margin-left: 400px;">Detail Transaksi</h2></div>
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
        <a class="duet" href="viewtransaksi.php"><ol style="padding-left: 1px;"><i class="fas fa-file-invoice-dollar"></i> Tabel Transaksi</ol></a>  
        <a class="duet" href="index.php"><ol style="padding-left: 1px;"><i class="fas fa-door-open"></i> Tabel Login</ol></a>
        <a class="duet" href="#"><ol style="padding-left: 1px;"><i class="fas fa-pills"></i> Tabel Obat</ol></a>
        <a class="duet" href="#"><ol style="padding-left: 1px;"><i class="fas fa-user"></i> Tabel Karyawan</ol></a>
        <a class="duet" href="#"><ol style="padding-left: 1px;"><i class="fas fa-warehouse"></i> Tabel Supplier</ol></a>
        <a class="duet" href="#"><ol style="padding-left: 1px;"><i class="fas fa-user-friends"></i> Tabel Pelanggan</ol></a>
      </div>
        </div>
        </div>
        <div class="row">
          <div class="col-2 awal" style="width: 217px;"> @Copyright Andre</div>
        </div>

    <table class="table table-bordered border-primary table-hover" style="width: 80%;margin-left: 230px;margin-top: -550px;margin-bottom: 450px;">
    <?php
    if(isset($_POST["tgltransaksi"])){ //aku gtw ini fungsinya buat apa V:
    $tgltransaksi=$_POST["tgltransaksi"];
    $namapelanggan=$_POST["namapelanggan"];
    $kategoripelanggan=$_POST["kategoripelanggan"];
    $_SESSION["tgltransaksi"]=$tgltransaksi;
    $_SESSION["namapelanggan"]=$namapelanggan;
    $_SESSION["kategoripelanggan"]=$kategoripelanggan;
    }
    ?>
        <td>Tanggal transaksi</td>
        <td><?php echo $datatransaksi["tgltransaksi"]; ?></td>
        <tr>
            <td>Pelanggan</td>
            <td><?php echo $datatransaksi["namalengkap"]; ?></td>
        </tr>
        <tr>
            <td>Kategori Pelanggan</td>
            <td><?php echo $datatransaksi["kategoripelanggan"]; ?></td>
        </tr>
    </table>
    <table class="table table-bordered border-primary" style="width: 80%;margin-left: 230px;margin-top: -420px;margin-bottom: 450px;">
        <thead>
            <th>Nama Obat</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Total Harga</th>
        </thead>
        <?php
        $query = "SELECT tbo.namaobat, tbd.* FROM tb_detail_transaksi tbd
        LEFT JOIN tb_obat tbo ON tbo.idobat = tbd.idobat WHERE tbd.idtransaksi = '$idtransaksi'";
        $result = mysqli_query($koneksi, $query);

        while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['namaobat'] ?></td>
            <td><?php echo $row['jumlah'] ?></td>
            <td><?php echo $row['hargasatuan'] ?></td>
            <td><?php echo $row['totalharga'] ?></td>
        </tr>
        <?php
            }
        ?>
        <tr>
        <td colspan="3">Grand Total</td>           
        <td>
            <?php
                $query="SELECT totalharga FROM tb_detail_transaksi WHERE idtransaksi='$idtransaksi'";
                $result = mysqli_query($koneksi, $query);
                if(!$result){
                    die("Query error: ".mysqli_errno($koneksi).
                    " - ".mysqli_error($koneksi));
                }
                $grandtotal=0;
                while($row= mysqli_fetch_assoc($result)){
                    $grandtotal=$grandtotal+$row["totalharga"];
                }
                echo $grandtotal; 
            ?>
        </td>
        </tr>
        </tbody>
    </table>

     <!-- VIEW KEMBALI -->
     <?php
        if(isset($datatransaksi["totalbayar"])) {
        ?>
                <table class="table table-bordered" style="width: 80%;margin-left: 230px;margin-top: -420px;margin-bottom: 450px;">
                    <td>Total</td>
                    <td><?php echo $datatransaksi["totalbayar"]; ?></td>
                    <tr>
                        <td>Bayar</td>
                        <td><?php echo $datatransaksi["bayar"]; ?></td>
                    </tr>
                    <tr>
                        <td>Hasil</td>
                        <td><?php echo $datatransaksi["kembali"]; ?></td>
                    </tr>
                </table>
                <a href="viewtransaksi.php?oke=Data telah terupdate" class="btn btn-primary" style="width: 10%;margin-left: 240px;margin-top: -430px;margin-bottom: 430px;">Lihat Transaksi</a>
                <button class="btn btn-primary" onclick="window.print()" style="width: 10%;margin-left: 10px;margin-top: -430px;margin-bottom: 430px;">Cetak</button>
            <?php
            } else {
            ?>
            <!-- VIEW KEMBALI END -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#biaya" style="width: 10%;margin-left: 240px;margin-top: -430px;margin-bottom: 430px;">Bayar</button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#obat" style="width: 10%;margin-left: 10px;margin-top: -430px;margin-bottom: 430px;">Masukan Obat</button>
        <?php } ?>

        <!-- Modal Bayar -->
        <div class="modal fade" id="biaya" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php if(isset($grandtotal)){?>    
            <form action="proses_bayar.php" method="POST">
                <label for="">Total</label>
                    <input type="hidden" name="idtransaksi" value="<?php echo $idtransaksi; ?>">
                    <input type="text" class="form-control" name="totalbayar" value="<?php echo $grandtotal; ?>"><br>
                    <label for="" class="form-label">Bayar</label>
                    <input type="text" name="bayar" class="form-control" id="">
            <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Bayar</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    
    
<!-- Modal Obat -->
    <div class="modal fade" id="obat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Tambah Obat</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="proses_transaksi.php" method="post"  enctype="multipart/form-data">
                <input type="hidden" name="idtransaksi" value="<?php echo $idtransaksi; ?>">
                <input type="hidden" name="tgltransaksi" value="<?php echo $row['tgltransaksi']; ?>">
                <input type="hidden" name="idpelanggan" value="<?php echo $row['idpelanggan']; ?>">
                <input type="hidden" name="kategoripelanggan" value="<?php echo $row['kategoripelanggan']; ?>">
                <input type="hidden" name="stock_obat" value="<?php echo $row['stock_obat']; ?>">
                <label for="idobat">Obat</label>
                <select name="idobat">
                    <option disabled selected>Pilih Obat</option>
                    <?php
                        $query = "SELECT * FROM tb_obat";
                        $result = mysqli_query($koneksi, $query);
                        while($row= mysqli_fetch_assoc($result)){
                    ?>
                        <option value="<?php echo $row['idobat']; ?>"><?php echo $row['namaobat']." | ".$row['hargajual']; ?></option>
                    <?php
                        }
                    ?>
                </select>
                <input type="number" name="jumlah">
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Masukan</button>
        </div>
        </div>
    </div>
</div>
 </form>
 <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>  
</body>
</html>