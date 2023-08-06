<?php
    session_start();
    include 'koneksi.php';
    if(isset($_SESSION["username"])){
        header("Location:dashboard.php");
        exit();
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styli.css">
</head>
<body>
    <div class="overlay"></div>
        <div class="card text-dark bg-light mb-3" style="max-width: 25rem; margin-left:450px;margin-top: 150px;">
        <div class="card-header">Login</div>
        <div class="card-body">
        <form action="proseslogin.php" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><i class="fas fa-user"></i> Username</label>
            <input type="text" style="margin-left: 1px;" class="form-control" id="over" name="username">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"><i class="fas fa-lock"></i> Password</label>
            <input type="password" style="margin-left: 1px;" name="password" class="form-control" id="pass">
            <span onclick="show()" id="mybutton" class="material-icons">visibility</span>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
   
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php if(isset($_GET["messege"])) {?>
        <script>   
         swal("Yey", "<?php echo $_GET["messege"]?>", "success");    
        </script>
    <?php } ?>
    <?php if(isset($_GET["msg"])) {?>
        <script>   
         swal("Yah..", "<?php echo $_GET["msg"]?>", "error");
        </script>
    <?php } ?>
    <?php if(isset($_GET["warn"])) {?>
        <script>
         swal("-_-", "<?php echo $_GET["warn"]?>", "error");               
        </script>
    <?php } ?>
    <?php if(isset($_GET["not"])) {?>
        <script>
         swal(" blm ada akun", "<?php echo $_GET["not"]?>", "error");               
        </script>
    <?php } ?>
    <script type="text/javascript">
         function show()
         {
            var x = document.getElementById('pass').type;
 
            if (x == 'password')
            {
               document.getElementById('pass').type = 'text';
               document.getElementById('mybutton').innerHTML = '<span class="material-icons">visibility_off</span>';
            }
            else
            {
               document.getElementById('pass').type = 'password';
               document.getElementById('mybutton').innerHTML = '<span class="material-icons">visibility</span>';
            }
         }
      </script>
</body>
</html>