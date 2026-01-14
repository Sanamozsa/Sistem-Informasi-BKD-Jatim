<?php
// ===============================
// DATA NOTIFIKASI (contoh, nanti dari database)
// ===============================
$notifikasi = [
    ["jenis"=>"Dokumen","judul"=>"Dokumen SK Pengangkatan disetujui"],
    ["jenis"=>"Verifikasi","judul"=>"Ijazah S1 sedang diverifikasi"],
    ["jenis"=>"Sistem","judul"=>"Pemeliharaan sistem malam ini"],
    ["jenis"=>"Dokumen","judul"=>"Dokumen KTP perlu diperbarui"],
    ["jenis"=>"Verifikasi","judul"=>"Data profil berhasil diverifikasi"],
    ["jenis"=>"Sistem","judul"=>"Password berhasil diubah"]
];

// ===============================
// OUTPUT HTML
// ===============================
echo '<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Notifikasi User</title>
    <link rel="stylesheet" href="css/notifikasi_user.css">
</head>
<body>

<div class="app">

    <aside class="sidebar">
        <div class="logo">Digital Dokumen</div>

        <ul class="menu">
            <li><a href="Dashboard_User.php">Dashboard</a></li>
            <li><a href="Dokumen_User.php">Dokumen Saya</a></li>
            <li class="active">Notifikasi</li>
            <li><a href="Profil_User.php">Profil</a></li>
        </ul>

        <div class="logout"><a href="Logout.php">Keluar</a></div>
    </aside>

    <main class="content">

        <header class="header">
            Digital Employer Arsip Dokumen
        </header>

        <section class="main-content">

            <div class="notif-header">
                <div>
                    <h3>Notifikasi</h3>
                    <p>Informasi terkait dokumen, verifikasi, dan sistem</p>
                </div>
                <button class="btn-mark">Tandai Semua Telah Dibaca</button>
            </div>

            <div class="tabs">
                <span class="tab active">Semua</span>
                <span class="tab">Dokumen</span>
                <span class="tab">Verifikasi</span>
                <span class="tab">Sistem</span>
            </div>

            <div class="notif-list">';
            
foreach ($notifikasi as $n) {
    echo '<div class="notif-item">'.$n['judul'].'</div>';
}

echo '
            </div>

        </section>

    </main>

</div>

</body>
</html>';
?>
