<?php

session_start();

$_SESSION['status'] = "login";

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
    <link rel="stylesheet" type="text/css" href="default.css">
    <!-- <link rel="stylesheet" type="text/css" href="css_albumedithapus.css"> -->
    <title>gallery ukk</title>

    <!-- <link rel="stylesheet" type="text/css" href="boostrap-v.5.0.2/css/bootstrap.min.css"> -->
</head>
<body>
    
<header class="header">
    <div class="logo"><img src="assets/img-logo/logo_foto.png" alt="?"></div>
    <div class="navbar">
        <a href="beranda.php"><li>Home</li></a>
        <a href="beranda_album.php"><li>Album</li></a>
        <a href="beranda_foto.php"><li>Photo</li></a>
        <a href="beranda_listfoto.php"><li>List-Foto</li></a>
    </div>
    <div class="h2"><h2><span>GALLERY</span> <span>UKK</span></h2></div>
</header>

<div class="container">
    <h3>Change Description Foto</h3>
    <br>
    
<?php                
include 'db.php';
$number = 1;
$userid = $_SESSION['user_id'];
$sql = mysqli_query($conn, "SELECT * FROM foto WHERE user_id = '$userid'");
while($data = mysqli_fetch_array($sql)) {
?>
    <form action="aksi_editfoto.php" method="POST">
        <input type="number" id="Fotoid" name="Fotoid" value="<?php echo $data['album_id'] ?>" hidden>

        <div class="row"><label for="">Title :</label></div>
        <div class="row"><input type="text" id="Judul_foto" name="Judul_foto" value="<?php echo $data['judul_foto'] ?>"></div>
        <br>

        <div class="row"><label for="">Description :</label></div>
        <div class="row"><input type="text" id="Deskripsi_foto" name="Deskripsi_foto" value="<?php echo $data['deskripsi_foto'] ?>"></div>
        <br>

        <button class="btn" type="submit" name="edit">Change Data</button>

        <br><br>
        <p><a href="beranda_foto.php"><-- back</a></p>
    </form>
<?php } ?>
    
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
    justify-content: left;
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