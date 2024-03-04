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

    $fotoid = $_POST['Fotoid'];
    $judul_foto = $_POST['Judul_foto'];
    $deskripsi_foto = $_POST['Deskripsi_foto'];

    $sql = "UPDATE foto SET judul_foto='$judul_foto', deskripsi_foto='$deskripsi_foto' WHERE  foto_id='$fotoid'";
    // $sql = mysqli_query($conn, "INSERT INTO album VALUES (NULL,'$nama_album','$deskripsi','$tanggal_dibuat','$terakhir_edit','$userid')");

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Foto telah diupdate');
        location.href='beranda_foto.php';
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

