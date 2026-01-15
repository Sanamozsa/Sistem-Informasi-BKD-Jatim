<?php
session_start();
header('Content-Type: application/json');

/* KONEKSI (PATH AMAN) */
require_once __DIR__ . "/../config/koneksi.php";

/* CEK LOGIN & ROLE */
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    echo json_encode([
        "error" => true,
        "message" => "Akses ditolak"
    ]);
    exit;
}

$id_admin = $_SESSION['id_user'];

/* DATA ADMIN */
$admin = mysqli_fetch_assoc(mysqli_query(
    $conn,
    "SELECT id_user, nama_lengkap, email 
     FROM users 
     WHERE id_user='$id_admin'"
));

/* STATISTIK */
$totalDokumen = mysqli_num_rows(mysqli_query(
    $conn,
    "SELECT id_dokumen FROM dokumen"
));

$totalPegawai = mysqli_num_rows(mysqli_query(
    $conn,
    "SELECT id_user FROM users WHERE role='pengguna'"
));

$verifikasi = mysqli_num_rows(mysqli_query(
    $conn,
    "SELECT id_dokumen FROM dokumen WHERE status='menunggu'"
));

/* DATA ARSIP */
$arsipQuery = mysqli_query(
    $conn,
    "SELECT d.id_dokumen, d.tanggal_upload, d.file_path,
            u.nama_lengkap, u.nip
     FROM dokumen d
     JOIN users u ON d.id_user = u.id_user
     ORDER BY d.tanggal_upload DESC"
);

$arsip = [];
while ($row = mysqli_fetch_assoc($arsipQuery)) {
    $arsip[] = $row;
}

/* RESPONSE JSON */
echo json_encode([
    "admin" => $admin,
    "summary" => [
        "total_dokumen" => $totalDokumen,
        "total_pegawai" => $totalPegawai,
        "menunggu_verifikasi" => $verifikasi
    ],
    "arsip" => $arsip
]);
