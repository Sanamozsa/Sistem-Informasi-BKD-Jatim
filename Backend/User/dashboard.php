<?php
// Backend/user/dashboard.php
session_start();
require_once __DIR__ . "/../config/koneksi.php";


/* PROTEKSI LOGIN */
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'pengguna') {
    header("Location: ../../Frontend/Login.php");
    exit;
}

$id_user = $_SESSION['id_user'];

/* DATA USER */
$user = mysqli_fetch_assoc(mysqli_query(
    $conn,
    "SELECT * FROM users WHERE id_user='$id_user'"
));

/* HITUNG DOKUMEN */
$totalDokumen = mysqli_num_rows(mysqli_query(
    $conn,
    "SELECT id_dokumen FROM dokumen WHERE id_user='$id_user'"
));

$belumLengkap = mysqli_num_rows(mysqli_query(
    $conn,
    "SELECT id_dokumen FROM dokumen 
     WHERE id_user='$id_user' AND status='menunggu'"
));

/* NOTIFIKASI */
$notifikasi = mysqli_query(
    $conn,
    "SELECT * FROM notifikasi 
     WHERE id_user='$id_user'
     ORDER BY created_at DESC LIMIT 3"
);
