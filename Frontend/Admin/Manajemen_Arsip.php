<?php
// Contoh data arsip (nantinya bisa dari database)
$data_arsip = [
    [
        'nama_arsip' => 'Samuel Nathaniel',
        'klasifikasi' => 'Diklat Kepemimpinan',
        'kategori' => 'Diklat',
        'tahun' => '2026'
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Arsip</title>
    <link rel="stylesheet" href="css/manajemen_arsip.css">
</head>
<body>

<div class="container">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="logo">
            <div class="logo-box">Logo</div>
            <div class="logo-text">
                <strong>Admin</strong><br>
                Pengembangan
            </div>
        </div>

        <ul class="menu">
            <li><a href="Dashboard_Admin.php">Beranda</a></li>
            <li><a href="Pengguna_Admin.php">Pengguna</a></li>
            <li><a href="Klasifikasi_Arsip.php">Klasifikasi Arsip</a></li>
            <li class="active"><a href="#">Manajemen Arsip</a></li>
        </ul>

        <div class="logout">
            <a href="/Sistem-Informasi-BKD-Jatim/Backend/auth/logout.php"
                   onclick="return confirm('Yakin ingin logout?')">
                    Logout
                </a>
        </div>
    </aside>

    <!-- MAIN -->
    <main class="main-content">

        <!-- TOPBAR -->
        <header class="topbar">
            <input type="text" placeholder="Cari Nama Dokumen dan nama pengguna....">
            <div class="profile">
                <div class="avatar"></div>
                <div class="profile-text">
                    <strong>Samuel Nathaniel</strong><br>
                    <small>Super Admin</small>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <section class="content">
            <h2>Manajemen Arsip</h2>

            <div class="filter">
                <input type="text" placeholder="Tahun......">
                <button>🔍</button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Nama Arsip</th>
                        <th>Nama Klasifikasi</th>
                        <th>Kategori</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_arsip as $arsip): ?>
                    <tr>
                        <td><?= $arsip['nama_arsip']; ?></td>
                        <td><?= $arsip['klasifikasi']; ?></td>
                        <td><?= $arsip['kategori']; ?></td>
                        <td><?= $arsip['tahun']; ?></td>
                        <td>
                            <a href="#" class="btn lihat">Lihat</a>
                            <a href="#" class="btn hapus"
                               onclick="return confirm('Yakin ingin menghapus arsip ini?')">
                               Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </section>

    </main>

</div>

</body>
</html>
