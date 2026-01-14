<?php
// ===============================
// DATA USER (contoh, nanti dari session / database)
// ===============================
$nama    = "Samuel";
$nip     = "22081010326";
$jabatan = "Mahasiswa";

$dokumen = [
    ["nama"=>"SK Pengangkatan","tanggal"=>"01-01-2026","status"=>"Lengkap"],
    ["nama"=>"Ijazah","tanggal"=>"05-01-2026","status"=>"Belum"]
];

$totalDokumen = count($dokumen);
$belumLengkap = 0;
foreach ($dokumen as $d) {
    if ($d['status'] === "Belum") $belumLengkap++;
}

// ===============================
// OUTPUT HTML
// ===============================
echo '<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard User - Arsip Digital</title>
    <link rel="stylesheet" href="css/dashboard_user.css">
</head>
<body>

<div class="container">

    <aside class="sidebar">
        <div class="logo">Digital Dokumen</div>
        <ul class="menu">
            <li class="active">Dashboard</li>
            <li><a href="dokumen_user.php">Dokumen Saya</a></li>
            <li><a href="Notifikasi_User.php">Notifikasi</a></li>
            <li><a href="Profil_User.php">Profil</a></li>
            <li class="logout"><a href="Logout.php">Logout</a></li>
        </ul>
    </aside>

    <main class="content">
        <header class="header">
            <h1>Digital Employer Arsip Dokumen</h1>
        </header>

        <section class="user-info">
            <div>
                <h3>Selamat Datang, '.$nama.'</h3>
                <p>NIP : '.$nip.'</p>
                <p>Jabatan : '.$jabatan.'</p>
            </div>
            <div class="avatar"></div>
        </section>

        <section class="summary">
            <div class="card blue">
                <h4>Dokumen Saya</h4>
                <p>'.$totalDokumen.'</p>
            </div>
            <div class="card orange">
                <h4>Belum Lengkap</h4>
                <p>'.$belumLengkap.'</p>
            </div>
        </section>

        <section class="box">
            <h3>Daftar Dokumen Saya</h3>
            <table class="doc-table">
                <thead>
                    <tr>
                        <th>Nama Dokumen</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>';
                
foreach ($dokumen as $d) {
    $classStatus = ($d['status']=="Lengkap") ? "lengkap" : "belum";

    echo '<tr>
            <td>'.$d['nama'].'</td>
            <td>'.$d['tanggal'].'</td>
            <td><span class="status '.$classStatus.'">'.$d['status'].'</span></td>
            <td>
                <button class="btn view">Lihat</button>';
                
    if ($d['status']=="Lengkap") {
        echo '<button class="btn download">Download</button>';
    }

    echo   '</td>
          </tr>';
}

echo '
                </tbody>
            </table>
        </section>

        <section class="box">
            <h3>Notifikasi</h3>
            <div class="notif"></div>
            <div class="notif"></div>
        </section>

    </main>
</div>

</body>
</html>';
?>
