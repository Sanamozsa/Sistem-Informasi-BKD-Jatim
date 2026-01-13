<?php
session_start();
include "../config/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$role     = $_POST['role'];

$query = mysqli_query($conn, 
    "SELECT * FROM users 
     WHERE email='$username' 
     AND role='$role' 
     AND status='aktif'"
);

$user = mysqli_fetch_assoc($query);

if ($user && password_verify($password, $user['password'])) {

    $_SESSION['id_user'] = $user['id_user'];
    $_SESSION['nama']    = $user['nama_lengkap'];
    $_SESSION['role']    = $user['role'];
    $_SESSION['login']   = true;

    if ($user['role'] == 'admin') {
        header("Location: ../admin/dashboard.php");
    } else {
        header("Location: ../user/dashboard.php");
    }

} else {
    echo "<script>
        alert('Login gagal! Periksa username, password, dan role');
        window.location='../../Frontend/Login.html';
    </script>";
}
