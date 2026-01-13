<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: ../../Frontend/Login.html");
    exit;
}

/* DATA ADMIN */
$admin = mysqli_fetch_assoc(mysqli_query($conn,
    "SELECT * FROM users WHERE id_user='{$_SESSION['id_user']}'"
));

$totalDokumen = mysqli_num_rows(mysqli_query($conn,
    "SELECT id_dokumen FROM dokumen"
));

$totalPegawai = mysqli_num_rows(mysqli_query($conn,
    "SELECT id_user FROM users WHERE role='pengguna'"
));

$verifikasi = mysqli_num_rows(mysqli_query($conn,
    "SELECT id_dokumen FROM dokumen WHERE status='menunggu'"
));

$arsip = mysqli_query($conn,
    "SELECT d.*, u.nama_lengkap, u.nip
     FROM dokumen d
     JOIN users u ON d.id_user = u.id_user
     ORDER BY d.tanggal_upload DESC"
);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../../Frontend/Admin/css/Dashboard_Admin.css">
</head>
<body>

<aside class="sidebar">
    <div>
        <div class="logo">
            <h3>Admin BKD</h3>
        </div>
        <ul class="menu">
            <li class="active">Beranda</li>
            <li><a href="pengguna.php">Pengguna</a></li>
            <li><a href="arsip.php">Manajemen Arsip</a></li>
        </ul>
    </div>

    <div class="logout">
        <a href="../auth/logout.php">Keluar</a>
    </div>
</aside>

<main class="main">
<header class="topbar">
    <div class="profile">
        <strong><?= $admin['nama_lengkap']; ?></strong><br>
        <small>Administrator</small>
    </div>
</header>

<section class="content">

<div class="info-grid">
    <div class="box">Total Dokumen: <?= $totalDokumen; ?></div>
    <div class="box">Pegawai Aktif: <?= $totalPegawai; ?></div>
    <div class="box">Permintaan Verifikasi: <?= $verifikasi; ?></div>
</div>

<div class="table-box">
<h3>Tabel Arsip</h3>
<table>
<thead>
<tr>
    <th>Nama Pegawai</th>
    <th>NIP</th>
    <th>Tanggal Upload</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>
<?php while ($a = mysqli_fetch_assoc($arsip)) { ?>
<tr>
    <td><?= $a['nama_lengkap']; ?></td>
    <td><?= $a['nip']; ?></td>
    <td><?= $a['tanggal_upload']; ?></td>
    <td>
        <a href="../files/<?= $a['file_path']; ?>">Download</a>
    </td>
</tr>
<?php } ?>
</tbody>
</table>
</div>

</section>
</main>

</body>
</html>
