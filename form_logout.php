<?php

// session_start();

// echo $_SESSION['status'];

?>

<?php

session_start();

$userid = $_SESSION['user_id'];
include 'db.php';

if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda belum login !');
    location.href:index.php';
    </script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css_formlogout.css"> -->
    <link rel="stylesheet" href="default.css">
    <title>gallery ukk</title>
</head>
<body>

<header class="header">
    <div class="logo"><img src="assets/img-logo/headerhome.jpg" alt="?"></div>
    <div class="navbar">
        <a href="beranda.php"><li>Home</li></a>
        <a href="beranda_album.php"><li>Album</li></a>
        <a href="beranda_foto.php"><li>Photo</li></a>
        <a href="beranda_listfoto.php"><li>List Foto</li></a>
        <a href="#"><li style="box-shadow: slategrey 0px 0px 10px 0px; width: 100px; text-align: center;">Logout</li></a>
    </div>
    <div class="h2"><h2><span>GALLERY</span> <span>UKK</span></h2></div>
</header>

<div class="box">
    <div class="logoutform">
        <h3>Are you sure Logout ?</h3>

        <br>
        <hr>
        <br>

        <div class="div"><a href="beranda.php"><li>Cancel</li></a><a href="aksi_logout.php"><li>Accept</li></a></div>

        <style>
            .box {
                width: 100%;
                margin: 180px 0px 400px;
                padding: 0;

                display: flex;
                justify-content: center;
            }

            .logoutform {
                box-shadow: slategrey 0px 0px 5px 0px;
                border-radius: 8px;
                border: none;
                background-color: whitesmoke;
                padding: 30px 150px;
            }

            .box .div {
                display: flex;
                justify-content: center;
                gap: 20px;
            }

            .div li {
                background-color: transparent;
                border: transparent solid 2px;
                padding: 5px 20px;
                transition: 1s;
            }

            .div li:hover {
                box-shadow: grey 0px 0px 15px 0px;
                border-radius: 10px;
            }


        </style>
    </div>
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
    padding: 150px 0px;
}
.container .row {
    width: 100%;
}
.container .row .card {
    box-shadow: slategrey 0px 0px 10px 0px;
    border-radius: 8px;
    overflow: hidden;
    width: 200px;
    height: fit-content;
    margin-bottom: 50px;
}
.container .row .card img {
    width: 200px;
    height: auto;
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