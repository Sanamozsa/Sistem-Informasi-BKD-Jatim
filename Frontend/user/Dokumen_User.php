<?php
// ===============================
// DATA DOKUMEN (contoh, nanti dari database)
// ===============================
$dokumen = [
    [
        "nama" => "SK Pengangkatan",
        "tanggal" => "12-01-2026",
        "status" => "Disetujui"
    ],
    [
        "nama" => "Ijazah S1",
        "tanggal" => "10-01-2026",
        "status" => "Menunggu"
    ]
];

// ===============================
// OUTPUT HTML
// ===============================
echo '<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dokumen Saya</title>
    <link rel="stylesheet" href="css/dokumen_user.css">
</head>
<body>

<div class="app">

    <aside class="sidebar">
        <div class="logo">Digital Dokumen</div>
        <ul class="menu">
            <li><a href="Dashboard_User.php">Dashboard</a></li>
            <li class="active">Dokumen Saya</li>
            <li><a href="Notifikasi_User.php">Notifikasi</a></li>
            <li><a href="Profil_User.php">Profil</a></li>
        </ul>
        <div class="logout"><a href="Logout.php">Keluar</a></div>
    </aside>

    <main class="content">
        <header class="header">
            Digital Employer Arsip Dokumen
        </header>

        <section class="main-content">

            <div class="top-action">
                <input type="text" class="search" placeholder="Cari Nama Dokumen.....">
                <a href="Upload_User.php" class="btn-upload">+ Upload Dokumen</a>
            </div>

            <h3>Daftar Dokumen Saya</h3>

            <table>
                <thead>
                    <tr>
                        <th>Nama Dokumen</th>
                        <th>Tanggal Upload</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>';
                
foreach ($dokumen as $d) {

    if ($d['status'] == "Disetujui") {
        $class = "approved";
    } else {
        $class = "pending";
    }

    echo '<tr>
            <td>'.$d['nama'].'</td>
            <td>'.$d['tanggal'].'</td>
            <td><span class="status '.$class.'">'.$d['status'].'</span></td>
            <td><button class="btn">Lihat</button></td>
          </tr>';
}

echo '
                </tbody>
            </table>

        </section>
    </main>

</div>

</body>
</html>';
?>
