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
    <div class="logo"><img src="assets/img-logo/headerhome.jpg" alt="?"></div>
    <div class="navbar">
        <a href="#"><li style="box-shadow: slategrey 0px 0px 10px 0px; width: 100px; text-align: center;">Home</li></a>
        <a href="beranda_album.php"><li>Album</li></a>
        <a href="beranda_foto.php"><li>Photo</li></a>
        <a href="beranda_listfoto.php"><li>List-Foto</li></a>
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
        <?php
        $query = mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto.user_id=user.user_id INNER JOIN album ON foto.album_id=album.album_id");
        while($data = mysqli_fetch_array($query)) { ?>
    <div class="row">
            <div class="card">
                <div><a type="button" href="#komentar<?php echo $data['foto_id'] ?>" onclick="buka('<?php echo $data['foto_id'] ?>')"><img src="upload_photo/<?php echo $data['lokasi_file'] ?>" alt="?" title="<?php echo $data['judul_foto'] ?>"></a></div>
                <br>
                <div class="deskripsi" style="display: flex; flex-direction: row; justify-content: center; width: 100%; gap: 30px;">

                    <?php
                    $fotoid = $data['foto_id'];
                    $cek_like = mysqli_query($conn, "SELECT * FROM likefoto WHERE foto_id = '$fotoid' AND user_id = '$userid'");

                    if(mysqli_num_rows($cek_like) == 1) { ?>
                        <a href="aksi_like.php ?foto_id=<?php echo $data['foto_id'] ?>" type="submit" name="submit"><img style="width: 20px;" src="assets/img-logo/like.png">
                            <?php
                            $like = mysqli_query($conn, "SELECT * FROM likefoto WHERE foto_id = '$fotoid'");
                            echo mysqli_num_rows($like);
                            // echo mysqli_num_rows($like). 'suka';
                            ?>
                        </a>
                    <?php } else { ?>
                        <a href="aksi_like.php ?foto_id=<?php echo $data['foto_id'] ?>" type="submit" name="submit"><img style="width: 20px;" src="assets/img-logo/unlike.png">
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


                    <a type="button" href="#komentar<?php echo $data['foto_id'] ?>" onclick="buka('<?php echo $data['foto_id'] ?>')"><img style="width: 20px;" src="assets/img-logo/komen.png" alt="">
                
                        <?php
                            $komen = mysqli_query($conn, "SELECT * FROM komentarfoto WHERE foto_id = '$fotoid'");
                            echo mysqli_num_rows($komen); 
                            // echo mysqli_num_rows($like). 'suka';
                        ?>
                    </a>       
                </div>

                <div style="display: flex; justify-content: center;">
                    <a href="#komentar<?php echo $data['foto_id'] ?>">
                        <button class="btn-detail" onclick="buka('<?php echo $data['foto_id'] ?>')">Detail</button>
                    </a>
                </div>
                <div id="komentar<?php echo $data['foto_id'] ?>" class="detailfoto">
                    <img src="upload_photo/<?php echo $data['lokasi_file'] ?>" alt="?" title="<?php echo $data['judul_foto'] ?>">

                    <div style="padding: 10px;">
                        <p>Detail : <p><?php echo $data['deskripsi_foto'] ?></p></p>
                        <br>
                        <p>Uploaded at <?php echo $data['tanggal_unggah'] ?></p>
                        <br>
                        <p style="margin-bottom: 30px;">User : <?php echo $data['username'] ?></p>
                    </div>

                    <div style="display: flex; justify-content: center;"><button class="btn-detail" onclick="tutup('<?php echo $data['foto_id'] ?>')">Close</button></div>
                </div>
                <script>
                    function buka(id) {
                        var komentar = document.getElementById("komentar" + id);
                        komentar.style.display = "block";
                        // Tambahkan class untuk memicu animasi
                        komentar.classList.add('fade-in');
                    }

                    function tutup(id) {
                        var komentar = document.getElementById("komentar" + id);
                        // Hapus class untuk memicu animasi
                        komentar.classList.remove('fade-in');
                        komentar.style.display = "none";
                    }
                </script>
                <style>
                    .detailfoto {
                        display: none;
                        width: 200px;
                        height: fit-content;
                        /* text-align: center; */
                        box-shadow: grey 0px 0px 6px 0px;
                        border-radius: 10px;
                        overflow: hidden;
                        position: fixed; /* Posisi absolut */
                        z-index: 1;
                        top: 50%; /* Di tengah vertikal */
                        left: 50%; /* Di tengah horizontal */
                        transform: translate(-50%, -50%); /* Geser ke tengah */
                        background-color: gainsboro;
                        transition: opacity 0.5s ease; /* Transisi opacity */
                    }
                    .btn-detail {
                        border: none;
                        border-radius: 10px;
                        margin: 20px 0px;
                        padding: 7px 20px;
                        background-color: aliceblue;
                        transition: 0.5s;
                    }
                    .btn-detail:hover {
                        box-shadow: slategrey 0px 0px 5px 0px;
                    }
                </style>
                


            </div>





            <div>
                <div class="komentar">
                <h3>Comment</h3>
                <br>
                        <p><strong><?php echo $data['judul_foto'] ?></strong></p>
                        <!-- <p>Detail : <?php echo $data['deskripsi_foto'] ?></p>
                        <p>Uploaded at <?php echo $data['tanggal_unggah'] ?></p>
                        <p>Upload by (user) : <?php echo $data['username'] ?></p> -->
                        <hr style="border: none; background: transparent; height: 25px;">

                        <?php
                        include 'db.php';
                            $fotoid= $data['foto_id'];
                            $komentar = mysqli_query($conn, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.user_id=user.user_id WHERE komentarfoto.foto_id = '$fotoid'");
                            while($row = mysqli_fetch_array($komentar)) { ?>

                            <p>
                                <strong><?php echo $row['username'] ?> : <?php echo $row['isi_komentar'] ?></strong>
                            </p>

                        <?php } ?>
                    
                    <style>
                        .komentar {
                            box-shadow: slategrey 0px 0px 10px 0px;
                            border-radius: 8px;
                            overflow: hidden;
                            width: 800px;
                            height: fit-content;
                            margin-bottom: 10px;
                            padding: 10px 5px;
                        }
                        .title {
                            width: 150px;
                        }
                    </style>
                </div>

                <div class="tambah-komentar" id="">
                    <!-- <form action="" method="POST"> -->
                    <form action="aksi_tambahkomentar.php" method="POST">
                        <h3>Add Comment</h3>

                        <br>
                        <hr>
                        <br>

                        <div style="display: flex; gap: 15px;">
                            <div style="display: none;"><input class="komeninput" type="number" id="Komentar_id" name="Komentar_id" hidden></div>
                            <div style="display: none;"><input class="komeninput" type="number" id="Fotoid" name="Fotoid" value="<?php echo $data['foto_id'] ?>" hidden></div>
                            <div style="display: none;"><input class="komeninput" type="number" id="Userid" name="Userid" hidden></div>
                            <div style="width: 100%;">
                                <input style="width: 100%; 
                                    border-radius: 4px; 
                                    border: none; 
                                    background-color: white; 
                                    box-shadow: gainsboro 0px 0px 10px 0px; 
                                    padding: 10px 15px;
                                    margin-bottom: 10px;" type="text" id="Isi_komentar" name="Isi_komentar" placeholder="Add comment" required>
                            </div>
                            <div style="display: none;"><input class="komeninput" type="date" id="Tanggal_komentar" name="Tanggal_komentar" placeholder="tanggal" hidden required></div>
                        </div>

                        <div><input style="width: 100%;" class="komeninput" type="submit" id="kirim" name="kirim" value="Send"></div>


                        <!-- <div><input class="komeninput" type="text" id="Fotoid" name="Fotoid" hidden></div>
                        <div><label for="">Tulis komentar kamu</label></div>
                        <div><textarea class="komeninput" id="Isi_komentar" name="Isi_komentar" rows="10"></textarea></div>

                        <div><input class="komeninput" type="submit" id="kirim" name="kirim" value="Send"></div> -->
                    </form>
                    <style>
                        .tambah-komentar {
                            box-shadow: slategrey 0px 0px 10px 0px;
                            border-radius: 8px;
                            overflow: hidden;
                            width: 100%;
                            height: fit-content;
                            margin-bottom: 50px;
                            padding: 10px 5px;
                        }

                        .komeninput {
                            border-radius: 4px;
                            border: none;
                            background-color: white;
                            box-shadow: darkgrey 0px 0px 10px 0px;
                            padding: 10px 15px;
                            margin-bottom: 10px;
                        }
                        .komeninput:hover {
                            opacity: 0.5;
                        }
                    </style>
                </div>
            </div>








    </div>
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
    width: 100%;
    padding: 150px 0px;
}
.container .row {
    width: 100%;
    display: flex;
    height: fit-content;
    gap: 20px;
    justify-content: center;
    margin-bottom: 30px;
}
.container .row .card {
    box-shadow: slategrey 0px 0px 10px 0px;
    border-radius: 8px;
    overflow: hidden;
    width: 200px;
    height: 100%s;
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