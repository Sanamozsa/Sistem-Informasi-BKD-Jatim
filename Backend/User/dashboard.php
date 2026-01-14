<?php
session_start();
include "../config/koneksi.php";

/* PROTEKSI LOGIN */
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'pengguna') {
    header("Location: ../../Frontend/Login.php");
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
$notifikasi = mysqli_query($conn,
    "SELECT * FROM notifikasi 
     WHERE id_user='$id_user'
     ORDER BY created_at DESC LIMIT 3"
);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard User - Arsip Digital</title>
    <link rel="stylesheet" href="../../Frontend/User/css/dashboard_user.css">
</head>
<body>

<div class="container">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <h2 class="logo">Digital Dokumen</h2>
        <ul class="menu">
            <li class="active">Dashboard</li>
            <li><a href="dokumen.php">Dokumen Saya</a></li>
            <li><a href="notifikasi.php">Notifikasi</a></li>
            <li><a href="profil.php">Profil</a></li>

            <!-- LOGOUT -->
            <li class="logout">
                <a href="../auth/logout.php"
                   onclick="return confirm('Yakin ingin logout?')">
                   Logout
                </a>
            </li>
        </ul>
    </aside>

    <!-- CONTENT -->
    <main class="content">

        <header class="header">
            <h1>Digital Employer Arsip Dokumen</h1>
        </header>

        <!-- INFO USER -->
        <section class="user-info">
            <div>
                <h3>Selamat Datang, <?= $user['nama_lengkap']; ?></h3>
                <p>NIP : <?= $user['nip']; ?></p>
                <p>Role : Pengguna</p>
            </div>
            <div class="avatar"></div>
        </section>

        <!-- RINGKASAN -->
        <section class="summary">
            <div class="card blue">
                <h4>Dokumen Saya</h4>
                <p><?= $totalDokumen; ?></p>
            </div>
            <div class="card orange">
                <h4>Belum Diverifikasi</h4>
                <p><?= $belumLengkap; ?></p>
            </div>
        </section>

        <!-- NOTIFIKASI -->
        <section class="box">
            <h3>Notifikasi Terbaru</h3>

            <?php if (mysqli_num_rows($notifikasi) > 0) { ?>
                <?php while ($n = mysqli_fetch_assoc($notifikasi)) { ?>
                    <div class="notif">
                        <strong><?= $n['judul']; ?></strong><br>
                        <?= $n['pesan']; ?>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p>Tidak ada notifikasi.</p>
            <?php } ?>

        </section>

    </main>
</div>

</body>
</html>
