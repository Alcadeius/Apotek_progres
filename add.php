<?php
    include 'koneksi.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="modif.css">
</head>
<body>
    <center><h3>Add Account</h3></center>
    <div id="bg"><form action="insert.php" method="POST">
    <br>
    <div> 
    <label for="" class="same">Username</label>
    <input type="text" name="username" required="" id="">
    </div>
    <div>
    <label for="" class="same">Password</label>
    <input type="password" name="password" required="" id="">
    </div>
    <div>
    <label for="" class="same">authority User</label><br>
    <input type="radio" name="level" value="admin" id="admin">
    <label for="admin" id="text">admin</label> 
    <input type="radio" name="level" value="user" id="user">
    <label for="user">user</label>
    </div>
    <div>
    <button type="submit">Finished</button> 
    </div>
    </form>
    </div>
</body>
</html>