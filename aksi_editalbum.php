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

    $albumid = $_POST['Albumid'];
    $nama_album = $_POST['Nama_album'];
    $deskripsi = $_POST['Deskripsi'];
    $terakhir_edit = date('y-m-d');

    $sql = "UPDATE album SET nama_album='$nama_album', deskripsi='$deskripsi', terakhir_edit='$terakhir_edit' WHERE  album_id='$albumid'";
    // $sql = mysqli_query($conn, "INSERT INTO album VALUES (NULL,'$nama_album','$deskripsi','$tanggal_dibuat','$terakhir_edit','$userid')");

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Album telah diupdate');
        location.href='beranda_album.php';
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

