<?php
include 'koneksi.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="debug.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>

<body>
    <center>
        <h3>Tambah Transaksi</h3>
    </center>
    <div id="bg">
        <form action="proses_insert.php" method="POST">
            <br>
            <div>
                <label for="" class="same">Id transaksi</label>
                <input type="text" name="idtransaksi" placeholder="auto-increment" id="">
            </div>
            <div>
                <label for="" class="same">Tanggal transaksi</label> <br>
                <input type="date" name="tgltransaksi" value="<? date('Y-m-d') ?>" required="" id=""><i class="fas fa-calendar-alt"></i>
            </div>
            <div>
                <label for="" class="form-control same">Id Pelanggan</label> <br>
                <select name="idpelanggan" id="">
                    <option value="" disabled selected>Pilih Pelanggan</option>
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
            <div>
                <label for="" class="same">Kategori Pelanggan</label>
                <input type="text" name="kategoripelanggan" required="" id="">
            </div>
            <div>
                <button name="submit" type="submit">Finished</button>
            </div>
        </form>
    </div>
</body>

</html>