<?php

// session_start();

// include 'db.php';

// $fotoid = $_GET['foto_id'];
// $userid = $_SESSION['user_id'];




// $cek_like = mysqli_query($conn, "SELECT * FROM likefoto WHERE foto_id = '$fotoid' AND user_id = '$userid'");

// if (mysqli_num_rows($cek_like) == 1) {

//     $row = mysqli_fetch_array($cek_like);

//     $likeid = $row['like_id'];
//     $query = "DELETE FROM likefoto WHERE like_id = '$likeid'";

//     echo "<script>
//     alert('Berhasil un-like!');
//     location.href='beranda.php';
//     </script>";
    
// } else {

//     $tanggal_like = date('y-m-d');
//     $sql = "INSERT INTO likefoto (foto_id, user_id, tanggal_like) VALUES ('$fotoid','$userid','$tanggal_like')";
    
//     echo "<script>
//     alert('Berhasil like!');
//     location.href='beranda.php';
//     </script>";
// }

?>



<?php
session_start();

include 'db.php';

// Cek apakah parameter foto_id ada dalam URL
if (isset($_GET['foto_id'])) {
    $fotoid = $_GET['foto_id'];

    // Cek apakah user_id tersedia dalam session
    if (isset($_SESSION['user_id'])) {
        $userid = $_SESSION['user_id'];

        // Query untuk mengecek apakah sudah di-like
        $cek_like = mysqli_query($conn, "SELECT * FROM likefoto WHERE foto_id = '$fotoid' AND user_id = '$userid'");

        if (mysqli_num_rows($cek_like) == 1) {
            // Jika sudah di-like, lakukan operasi unlike
            $row = mysqli_fetch_array($cek_like);
            $likeid = $row['like_id'];

            $query = "DELETE FROM likefoto WHERE like_id = '$likeid'";
            if (mysqli_query($conn, $query)) {
                // Query berhasil dieksekusi
                header('Location: beranda.php');
                exit();
            } else {
                // Query gagal dieksekusi
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            // Jika belum di-like, lakukan operasi like
            $tanggal_like = date('y-m-d');
            $sql = "INSERT INTO likefoto (foto_id, user_id, tanggal_like) VALUES ('$fotoid','$userid','$tanggal_like')";
            if (mysqli_query($conn, $sql)) {
                // Query berhasil dieksekusi
                header('Location: beranda.php');
                exit();
            } else {
                // Query gagal dieksekusi
                echo "Error: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Error: User ID tidak tersedia dalam session.";
    }
} else {
    echo "Error: Parameter foto_id tidak ditemukan dalam URL.";
}
?>
