<?php

session_start();
include 'db.php';

// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     $user = $_POST['Username'];
//     $pass = $_POST['Password'];
//     $email = $_POST['Email'];
//     $namalengkap = $_POST['Namalengkap'];
//     $telepon = $_POST['Telepon'];
//     $alamat = $_POST['Alamat'];
    
//     $sql = "INSERT INTO user (username, password, email, nama_lengkap, telepon, alamat) values ('$user','$pass','$email','$namalengkap','$telepon','$alamat')";
    
//     if ($sql) {
//         echo "daftar akun berhasil";
//         header("Location: form_login.php");
//     } else {
//         echo "daftar akun gagal";
//         header("Location: form_register.php");
//     }
// }

// $user = $_POST['Username'];
// $pass = $_POST['Password'];
// $email = $_POST['Email'];
// $namalengkap = $_POST['Namalengkap'];
// $telepon = $_POST['Telepon'];
// $alamat = $_POST['Alamat'];

// $sql = "INSERT INTO user (username, password, email, nama_lengkap, telepon, alamat) VALUES ('$user', '$pass', '$email', '$namalengkap', '$telepon', '$alamat')";

// if ($sql) {
// echo "daftar akun berhasil";
// header("Location: form_login.php");
// } else {
// echo "daftar akun gagal";
// header("Location: form_register.php");
// }

$username = $_POST['Username'];
$password = $_POST['Password'];

$sql = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and password='$password'");

$check = mysqli_num_rows($sql);

if ($check > 0) {
    $data = mysqli_fetch_array($sql);

    $_SESSION['username'] = $data['username'];
    $_SESSION['user_id'] = $data['user_id'];
    $_SESSION['status'] = 'login';
    echo "<script>alert('Login berhasil');
    location.href='beranda.php';
    </script>";
} else {
    echo "<script>alert('username atau password salah !');
    location.href='index.php';
    </script>";
}

    // if ($sql) {
    // echo "daftar akun berhasil";
    // header("Location: form_login.php");
    // } else {
    // echo "daftar akun gagal";
    // header("Location: form_register.php");
    // }

?>