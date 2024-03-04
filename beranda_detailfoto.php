<?php

// session_start();

// echo $_SESSION['status'];

?>

<?php

// session_start();

// $_SESSION['status'] = "login";

// if ($_SESSION['status'] != 'login') {
//     echo "<script>
//     alert('Anda belum login !');
//     location.href:index.php';
//     </script>";
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css_beranda_detailfoto.css"> -->
    <link rel="stylesheet" href="default.css">
    <title>gallery ukk</title>
</head>
<body>

<header class="header">
    <div class="logo"><img src="assets/img-logo/logo.png" alt="?"></div>
    <div class="navbar">
        <a href="beranda.php"><li>Home</li></a>
    </div>
    <div class="h2"><h2><span>GALLERY</span> <span>UKK</span></h2></div>
</header>

<div class="container">
    <div class="row-right">
        <h3>List Photo</h3>
        <br>
        <table style="width: 100%;">
            <tr>
                <th style="color: slategrey;">#</th>
                <th style="color: slategrey;">Foto</th>
                <th style="color: slategrey;">Judul Foto</th>
                <th style="color: slategrey;">Deskripsi</th>
                <th style="color: slategrey;">Tanggal Unggah</th>
                <th style="color: slategrey;">Album Id</th>
                <th colspan="2" style="color: slategrey;">Aksi</th>
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
                // $userid = $_SESSION['user_id'];
                $sql = mysqli_query($conn, "SELECT * FROM foto"); // silahkan nonaktifkan jika ingin hanya sesi user yang terlihat
                // $sql = mysqli_query($conn, "SELECT * FROM foto WHERE user_id = '$userid'");
                while($data = mysqli_fetch_array($sql)) {
                ?>
                <td><img src="upload_photo/<?php echo $data['lokasi_file'] ?>" style="width: 100px; height: 100px" alt=""></td>
                <td><?php echo $data['judul_foto'] ?></td>
                <td><?php echo $data['deskripsi_foto'] ?></td>
                <td style="text-align: center;"><?php echo $data['tanggal_unggah'] ?></td>
                <td style="text-align: center;"><?php echo $data['album_id'] ?></td>
                
                <?php } ?>
            </tr>
        </table>
    </div>
</div>


<?php
$localhost = "localhost";
$username = "root";
$password = "";
$database = "gallery_database";

$conn = mysqli_connect($localhost, $username, $password, $database);

if($conn -> connect_error) {
    echo "Gagal terhubung";
    exit();
}

if(isset($_GET['foto_id'])) {
    $id = $_GET['foto_id'];
    
    // Ambil foto berdasarkan foto_id yang diklik
    $sql = "SELECT * FROM foto WHERE foto_id = $id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        echo "<p>" . $row['judul_foto'] . "</p>";
        echo "<p>" . $row['deskripsi_foto'] . "</p>";
        echo "<p>" . $row['tanggal_unggah'] . "</p>";
    } else {
        echo "Data tidak ditemukan";
    }
} else {
    echo "ID tidak diberikan";
}

mysqli_close($conn);
?>




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