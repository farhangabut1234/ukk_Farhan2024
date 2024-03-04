<?php

$localhost = "localhost";
$username = "root";
$password = "";
$database = "gallery_database";

$conn = new mysqli($localhost, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = $_POST['Username'];
    $pass = $_POST['Password'];
    $email = $_POST['Email'];
    $nama_lengkap = $_POST['Namalengkap'];
    $telepon = $_POST['Telepon'];
    $alamat = $_POST['Alamat'];

    $sql = "INSERT INTO user (username, password, email, nama_lengkap, telepon, alamat) VALUES ('$user', '$pass', '$email', '$nama_lengkap','$telepon', '$alamat')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Silahkan pindah ke halaman login');
        location.href='form_login.php';
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // if ($sql) {
    // echo "daftar akun berhasil";
    // header("Location: form_login.php");
    // } else {
    // echo "daftar akun gagal";
    // header("Location: form_register.php");
    // }
}

?>