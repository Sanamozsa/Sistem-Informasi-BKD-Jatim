<?php
session_start();
header('Content-Type: application/json');

require_once __DIR__ . "/../config/koneksi.php";

/* CEK LOGIN */
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'pengguna') {
    echo json_encode([]);
    exit;
}

$id_user = $_SESSION['id_user'];

$query = mysqli_query(
    $conn,
    "SELECT judul, pesan, created_at
     FROM notifikasi
     WHERE id_user='$id_user'
     ORDER BY created_at DESC"
);

$data = [];
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}

echo json_encode($data);
