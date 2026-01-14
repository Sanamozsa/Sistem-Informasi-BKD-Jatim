<?php
// Ambil logic backend
require_once "../../Backend/user/dashboard.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard User - Arsip Digital</title>

    <!-- CSS -->
    <link rel="stylesheet"
          href="/Sistem-Informasi-BKD-Jatim/Frontend/user/css/dashboard_user.css">
</head>
<body>

<div class="container">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <h2 class="logo">Digital Dokumen</h2>
        <ul class="menu">
            <li class="active">Dashboard</li>

            <li>
                <a href="Dokumen_User.php">Dokumen Saya</a>
            </li>
            <li>
                <a href="Notifikasi_User.php">Notifikasi</a>
            </li>
            <li>
                <a href="Profil_User.php">Profil</a>
            </li>

            <li class="logout">
                <a href="/Sistem-Informasi-BKD-Jatim/Backend/auth/logout.php"
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
