<?php
session_start();
header('Content-Type: application/json');

/* KONEKSI DATABASE */
require_once __DIR__ . '/../config/koneksi.php';

/* CEK LOGIN */
if (
    !isset($_SESSION['id_user']) ||
    $_SESSION['role'] !== 'pengguna'
) {
    echo json_encode([]);
    exit;
}

$id_user = (int) $_SESSION['id_user'];

/* QUERY DATA */
$query = "SELECT 
            nama_dokumen,
            tanggal_upload,
            status,
            file_path
          FROM dokumen
          WHERE id_user = $id_user
          ORDER BY tanggal_upload DESC";

$result = mysqli_query($conn, $query);

$data = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

echo json_encode($data);
