<?php
session_start();
include "../config/koneksi.php";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$role     = $_POST['role'] ?? '';

$query = mysqli_query($conn, 
    "SELECT * FROM users 
     WHERE email='$username' 
     AND role='$role' 
     AND status='aktif'"
);

$user = mysqli_fetch_assoc($query);

if ($user && password_verify($password, $user['password'])) {

    // SET SESSION
    $_SESSION['login']   = true;
    $_SESSION['id_user'] = $user['id_user'];
    $_SESSION['nama']    = $user['nama_lengkap'];
    $_SESSION['role']    = $user['role'];

    // REDIRECT SESUAI ROLE
    if ($user['role'] === 'admin') {
        header("Location: ../admin/dashboard.php");
        exit;
    } elseif ($user['role'] === 'pengguna') {
        header("Location: ../../Frontend/user/Dashboard_User.php");
        exit;
    }

} else {
    echo "<script>
        alert('Login gagal! Periksa username, password, dan role');
        window.location='../../Frontend/Login.html';
    </script>";
    exit;
}
