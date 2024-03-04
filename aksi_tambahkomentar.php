<?php

session_start();
include 'db.php';

// if (isset($_POST['tambah'])) {
//     $namaalbum = $_POST['Nama_album'];
//     $deskripsi = $_POST['Deskripsi'];
//     $tanggal = date('Y-m-f');
//     $userid = $_SESSION['userid'];

//     $sql = mysqli_query($conn, "INSERT INTO album VALUES ('','$namaalbum','$deskripsi','$tanggal','$userid')");

//     echo "<script>
//     alert('Data berhasil ditambah');
//     location.href='beranda_album.php';
//     </script>";
// }



if ($_SERVER["REQUEST_METHOD"] == "POST") {
// if (isset($_POST['kirim'])) {

    $isi_komentar = $_POST['Isi_komentar'];
    $tanggal_komentar = date('y-m-d');
    $userid = $_SESSION['user_id'];
    $fotoid = $_POST['Fotoid'];

    $sql = "INSERT INTO komentarfoto (foto_id, user_id, isi_komentar, tanggal_komentar) VALUES ('$fotoid', '$userid', '$isi_komentar', '$tanggal_komentar')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
        location.href='beranda.php';
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}





    // $sql = mysqli_query($conn, "INSERT INTO komentarfoto VALUES ('','$fotoid','$userid','$isi_komentar','$tanggal_komentar')");


    // echo "<script>alert('Komentar telah dikirim');
    //     location.href='beranda.php';
    //     </script>";












?>

