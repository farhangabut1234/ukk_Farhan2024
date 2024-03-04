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
    <!-- <link rel="stylesheet" href="css_beranda.css"> -->
    <link rel="stylesheet" href="default.css">
    <title>gallery ukk</title>
</head>
<body>

<header class="header">
    <div class="logo"><img src="assets/img-logo/logo_foto.png" alt="?"></div>
    <div class="navbar">
        <a href="beranda.php"><li>Home</li></a>
        <a href="beranda_album.php"><li>Album</li></a>
        <a href="beranda_foto.php"><li>Photo</li></a>
        <a href="#"><li style="box-shadow: slategrey 0px 0px 10px 0px; width: 100px; text-align: center;">List-Foto</li></a>
        <a href="form_logout.php"><li>Logout</li></a>
    </div>
    <div class="h2"><h2><span>GALLERY</span> <span>UKK</span></h2></div>
</header>

<!-- <div class="container">
    <div class="row">
        <div class="card">
            <div><img src="1.jpg" alt="?"></div>
            <br>
            <div class="deskripsi">
                <a href="#"><li>10 suka</li></a>
                <a href="#"><li>3 komentar</li></a>
            </div>
        </div>
        <div class="card">
            <div class="img"><img src="2.jpg" alt="?"></div>
            <br>
            <div class="deskripsi">
                <a href="#"><li>10 suka</li></a>
                <a href="#"><li>3 komentar</li></a>
            </div>
        </div>
        <div class="card">
            <div><img src="3.jpg" alt="?"></div>
            <br>
            <div class="deskripsi">
                <a href="#"><li>10 suka</li></a>
                <a href="#"><li>3 komentar</li></a>
            </div>
        </div>
    </div>
</div> -->




<div class="container">
    <div class="row">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM foto WHERE user_id = '$userid'");
        while($data = mysqli_fetch_array($query)) { ?>
            <div class="card">
                <div><a href="#"><img src="upload_photo/<?php echo $data['lokasi_file'] ?>" alt="?" title="<?php echo $data['judul_foto'] ?>"></a></div>
                <br>
                <div class="deskripsi">
                    

                    <?php
                    $fotoid = $data['foto_id'];
                    $cek_like = mysqli_query($conn, "SELECT * FROM likefoto WHERE foto_id = '$fotoid' AND user_id = '$userid'");

                    if(mysqli_num_rows($cek_like) == 1) { ?>
                        <a>like
                            <?php
                            $like = mysqli_query($conn, "SELECT * FROM likefoto WHERE foto_id = '$fotoid'");
                            echo mysqli_num_rows($like);
                            // echo mysqli_num_rows($like). 'suka';
                            ?>
                        </a>
                    <?php } else { ?>
                        <a>like
                            <?php
                            $like = mysqli_query($conn, "SELECT * FROM likefoto WHERE foto_id = '$fotoid'");
                            echo mysqli_num_rows($like);
                            // echo mysqli_num_rows($like). 'suka';
                            ?>
                        </a>
                    <?php }
                    
                    ?>


                    <!-- <form action="aksi_like.php" method="POST">
                        <input type="">
                    </form> -->


                    <a>comment
                        <?php
                            $komen = mysqli_query($conn, "SELECT * FROM komentarfoto WHERE foto_id = '$fotoid'");
                            echo mysqli_num_rows($komen); 
                            // echo mysqli_num_rows($like). 'suka';
                        ?>
                    </a>
                </div>
                <div style="padding: 0px 10px 20px;">
                    <?php
                        include 'db.php';
                            $fotoid= $data['foto_id'];
                            $komentar = mysqli_query($conn, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.user_id=user.user_id WHERE komentarfoto.foto_id = '$fotoid'");
                            while($row = mysqli_fetch_array($komentar)) { ?>

                        <div style="margin: 0px 0px 10px;">
                            <p>
                                <strong><?php echo $row['username'] ?> : </strong>
                            </p>
                            <p>
                                <?php echo $row['isi_komentar'] ?>
                            </p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
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
    z-index: 999;

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
    display: flex;
    justify-content: center;
}
.container .row {
    width: 80%;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
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
.container .row .card .deskripsi {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    margin: 0px 0px 10px 0px;
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