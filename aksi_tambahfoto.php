<?php

session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $judul_foto = $_POST['Judul_foto'];
    $deskripsi_foto = $_POST['Deskripsi_foto'];
    $tanggal_unggah = date('y-m-d');
    $foto = $_FILES['Lokasi_file']['name'];
    $albumid = $_POST['Albumid'];
    $userid = $_SESSION['user_id'];
    $tmp = $_FILES['Lokasi_file']['tmp_name'];

    $lokasi = 'upload_photo/';
    $namafoto = rand().'-'.$foto;

    move_uploaded_file($tmp, $lokasi.$namafoto);

    $sql = "INSERT INTO foto (judul_foto, deskripsi_foto, tanggal_unggah, lokasi_file, album_id, user_id) VALUES ('$judul_foto', '$deskripsi_foto', '$tanggal_unggah', '$namafoto', '$albumid','$userid')";
    // $sql = mysqli_query($conn, "INSERT INTO album VALUES (NULL,'$nama_album','$deskripsi','$tanggal_dibuat','$terakhir_edit','$userid')");

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Photo telah diupload');
        location.href='beranda_foto.php';
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

