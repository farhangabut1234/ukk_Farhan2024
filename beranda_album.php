<?php

// session_start();

// echo $_SESSION['status'];

?>

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
    <!-- <link rel="stylesheet" href="css_beranda_albumfoto.css"> -->
    <link rel="stylesheet" href="default.css">
    <title>gallery ukk</title>
</head>
<body>

<header class="header">
    <div class="logo"><img src="assets/img-logo/logo_album.png" alt="?"></div>
    <div class="navbar">
        <a href="beranda.php"><li>Home</li></a>
        <a href="#"><li style="box-shadow: slategrey 0px 0px 10px 0px; width: 100px; text-align: center;">Album</li></a>
        <a href="beranda_foto.php"><li>Photo</li></a>
        <a href="beranda_listfoto.php"><li>List-Foto</li></a>
        <a href="form_logout.php"><li>Logout</li></a>
    </div>
    <div class="h2"><h2><span>GALLERY</span> <span>UKK</span></h2></div>
</header>

<div class="container">
    <div class="row-left">
        <h3>Add New Album</h3>
        <br>
        <form action="aksi_tambahalbum.php" method="POST">
        <div class="row"><input type="number" id="Albumid" name="Albumid" hidden></div>

        <div class="row"><label for="">Album Name :</label></div>
        <div class="row"><input class="input" type="text" id="Nama_album" name="Nama_album" required></div>
        <br>

        <div class="row"><label for="">Decription :</label></div>
        <div class="row"><textarea class="input" name="Deskripsi" id="Deskripsi" rows="7" required></textarea></div>
        <br>
        

        <button class="btn" type="submit" name="tambah">Add</button>

        </form>
    </div>
    <div class="row-right">
        <h3>List Album</h3>
        <br>
        <table style="width: 100%;">
            <tr>
                <th style="color: slategrey;">#</th>
                <th style="color: slategrey;">Album Name</th>
                <th style="color: slategrey;">Decription</th>
                <th style="color: slategrey;">Upload at</th>
                <th style="color: slategrey;">Change Upload at</th>
                <th colspan="2" style="color: slategrey;"></th>
            </tr>
            <tr>
                <td>
                    <hr>
                </td>
                <td>
                    <hr>
                </td>
                <td>
                    <hr>
                </td>
                <td>
                    <hr>
                </td>
                <td>
                    <hr>
                </td>
                <td>
                    <hr>
                </td>
            </tr>
            <tr>
                <?php
                
                include 'db.php';
                $number = 1;
                $userid = $_SESSION['user_id'];
                $sql = mysqli_query($conn, "SELECT * FROM album WHERE user_id = '$userid'");
                while($data = mysqli_fetch_array($sql)) {
                ?>
                <td><?php echo $number++ ?></td>
                <td><?php echo $data['nama_album'] ?></td>
                <td><?php echo $data['deskripsi'] ?></td>
                <td style="text-align: center;"><?php echo $data['tanggal_dibuat'] ?></td>
                <td style="text-align: center;"><?php echo $data['terakhir_edit'] ?></td>
                <td>
                    <a href="album_edit.php ?id=<?php echo $data['user_id']; ?>"><button style="background: limegreen;" class="button">Edit</button></a>
                </td> 
                <td>
                    <a href="album_hapus.php ?id=<?php echo $data['user_id']; ?>"><button style="background: crimson;" class="button" name="hapus">Delete</button></a>
                </td>
                <style>
                    .row-right table tr td {
                        padding: 10px 0px;
                    }
                    .button {
                        padding: 2px 5px;
                        border-radius: 3px;
                        border: none;
                        color: aliceblue;
                    }
                    .button:hover {
                        opacity: 0.5;
                    }
                </style>
            </tr>
                <?php } ?>
        </table>
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
    width: 70%;
    padding: 150px 0px;
    display: flex;
}
.container .row-left {
    flex-grow: 1;
    padding: 10px;
}
.row-left .btn {
    padding: 5px 20px;
    border: none;
    background-color: slategrey;
    color: whitesmoke;
}
.row-left .btn:hover {
    opacity: 0.5;
}
.input {
    width: 100%;
    box-shadow: slategrey 0px 0px 6px 0px;
    border: none;
    border-radius: 5px;
    padding: 5px;
}

.container .row-right {
    flex-grow: 6;
    padding: 10px;
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