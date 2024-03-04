<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "gallery_database";

$conn = mysqli_connect($server, $username, $password, $database);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="default.css">
    <!-- <link rel="stylesheet" type="text/css" href="css_formloginregister.css"> -->
    <title>gallery ukk</title>

    <!-- <link rel="stylesheet" type="text/css" href="boostrap-v.5.0.2/css/bootstrap.min.css"> -->
</head>
<body>
    
<header class="header">
    <div class="logo"><img src="assets/img-logo/headerhome.jpg" alt="?"></div>
    <div class="navbar">
        <a href="index.php"><li>Home</li></a>
        <a href="form_login.php"><li>Login</li></a>
        <a href="#"><li style="box-shadow: slategrey 0px 0px 10px 0px; width: 100px; text-align: center;">Register</li></a>
    </div>
    <div class="h2"><h2><span>GALLERY</span> <span>UKK</span></h2></div>
</header>

<div class="container">
    <h3>Create New Account</h3>
    <br>
    <form action="aksi_register.php" method="POST">
        <div class="row"><input type="number" id="Userid" name="Userid" hidden></div>

        <div class="row"><label for="">Username :</label></div>
        <div class="row"><input type="text" id="Username" name="Username" placeholder="input username ..." required></div>

        <br>

        <div class="row"><label for="">Password :</label></div>
        <div class="row"><input type="text" id="Password" name="Password" placeholder="input password ..." required></div>

        <br>

        <div class="row"><label for="">Email :</label></div>
        <div class="row"><input type="text" id="Email" name="Email" placeholder="input email ..." required></div>

        <br>

        <div class="row"><label for="">Full Name :</label></div>
        <div class="row"><input type="text" id="Namalengkap" name="Namalengkap" placeholder="input nama lengkap ..." required></div>

        <br>

        <div class="row"><label for="">Number Phone :</label></div>
        <div class="row"><input type="text" id="Telepon" name="Telepon" placeholder="input telepon number ..." required></div>

        <br>

        <div class="row"><label for="">Addreass : kota, kec, desa, dusun, rt/rw, no rumah, provinsi</label></div>
        <div class="row"><input type="text" id="Alamat" name="Alamat" placeholder="input alamat ..." required></div>
        <br>
        <button class="btn" type="submit" name="kirim">Register</button>


        <br><br>
        <p>Have an account ?<a href="form_login.php"> Click here</a></p>
        <br>
        <p><a href="index.php"><-- back</a></p>
        <br>
        <p><a href="form_login.php"><-- back to login</a></p>
    </form>
    
</div>

<footer>
    <div>
        <p>Made by Farhan</p>
        <p>Design by Farhan</p>
        <p>I NEED A JOB!!</p>
        <p>.</p>
        <p>&COPY; | Copyright 2024</p>
    </div>
    <div>
        <p>SMK KRIAN 1</p>
        <p>SIDOARJO</p>
        <p>GALLERY UKK 2024</p>
    </div>
    <div>
        <p>Open jasa tugas</p>
        <p>Microsoft Office Word</p>
        <p>Microsoft Office PowerPoint</p>
    </div>
</footer>
</body>



<!-- <script type="text/javascript" src="boostrap-v.5.0.2/js/bootstrap.min.js"></script> -->
</html>

<style>
header {
    width: 100%;
    border: none;
    background-color: gainsboro;
    box-shadow: slategrey 0px 0px 20px 0px;
    display: flex;
    justify-content: space-between;
    gap: 50px;
    padding: 20px 50px;

    position: fixed;

}
header .logo img {
    width: 40px;
    height: 40px;
}
header .navbar {
    display: flex;
    gap: 10px;
}
/* header .h2 {
    justify-items: end;
} */

header .navbar a li {
    padding: 5px 15px;
    transition: 0.5s;
    color: darkslategrey;
}
header .navbar a li:hover {
    box-shadow: slategrey 0px 0px 10px 0px;
    border-radius: 8px;
}

header .h2 span:nth-child(2) {
    color: darkred;
}



.container {
    margin: 0 auto;
    width: 60%;
    padding: 150px 0px;
}
.container .row {
    width: 100%;
}
.container .btn {
    padding: 5px 20px;
    border: none;
    border-radius: 4px;
    background-color: whitesmoke;
}
.container .btn:hover {
    box-shadow: darkslategrey 0px 0px 10px 0px;
}
.container .row input {
    padding: 5px;
    width: 80%;
    border-radius: 4px;
    border: none;
    box-shadow: slategrey 0px 0px 5px 0px;
}



footer {
    display: flex;
    background-color: darkslategrey;
    padding: 40px 0px;
}
footer div {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
}
footer p {
    color: whitesmoke;
}
</style>