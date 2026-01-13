<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'pengguna') {
    header("Location: ../../Frontend/Login.html");
    exit;
}

$id_user = $_SESSION['id_user'];

/* DATA USER */
$user = mysqli_fetch_assoc(mysqli_query($conn,
    "SELECT * FROM users WHERE id_user='$id_user'"
));

/* HITUNG DOKUMEN */
$totalDokumen = mysqli_num_rows(mysqli_query($conn,
    "SELECT id_dokumen FROM dokumen WHERE id_user='$id_user'"
));

$belumLengkap = mysqli_num_rows(mysqli_query($conn,
    "SELECT id_dokumen FROM dokumen 
     WHERE id_user='$id_user' AND status='menunggu'"
));

/* NOTIFIKASI */
$notif = mysqli_query($conn,
    "SELECT * FROM notifikasi 
     WHERE id_user='$id_user'
     ORDER BY created_at DESC LIMIT 2"
);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard User</title>
    <link rel="stylesheet" href="../../Frontend/User/css/dashboard_user.css">
</head>
<body>

<div class="container">
    <aside class="sidebar">
        <h2 class="logo">Digital Dokumen</h2>
        <ul class="menu">
            <li class="active">Dashboard</li>
            <li><a href="dokumen.php">Dokumen Saya</a></li>
            <li><a href="notifikasi.php">Notifikasi</a></li>
            <li><a href="profil.php">Profil</a></li>
        </ul>
    </aside>

    <main class="content">
        <header class="header">
            <h1>Digital Employer Arsip Dokumen</h1>
        </header>

        <section class="user-info">
            <div>
                <h3>Selamat Datang, <?= $user['nama_lengkap']; ?></h3>
                <p>NIP : <?= $user['nip']; ?></p>
                <p>Jabatan : <?= $user['jabatan'] ?? '-'; ?></p>
            </div>
            <div class="avatar"></div>
        </section>

        <section class="summary">
            <div class="card blue">
                <h4>Dokumen Saya</h4>
                <p><?= $totalDokumen; ?></p>
            </div>
            <div class="card orange">
                <h4>Belum Lengkap</h4>
                <p><?= $belumLengkap; ?></p>
            </div>
        </section>

        <section class="box">
            <h3>Notifikasi Terbaru</h3>
            <?php while ($n = mysqli_fetch_assoc($notif)) { ?>
                <div class="notif">
                    <strong><?= $n['judul']; ?></strong><br>
                    <?= $n['pesan']; ?>
                </div>
            <?php } ?>
        </section>
    </main>
</div>

</body>
</html>
