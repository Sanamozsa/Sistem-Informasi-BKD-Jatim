<?php
// ===============================
// DATA USER (contoh, nanti dari database / session)
// ===============================
$nama_singkat = "Samuel";
$nama_lengkap = "Samuel Nathaniel";
$nip          = "22081010326";
$jabatan      = "Mahasiswa";
$email        = "SamuelNathaniel@google.com";
$alamat       = "Jl. jalanin saja dulu";
$telepon      = "6266735263787";
$ttl          = "Ambon, 22 April 2004";

// ===============================
// OUTPUT HTML
// ===============================
echo '<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="css/Profil_User.css">
</head>
<body>

<div class="app">

    <aside class="sidebar">
        <div class="logo">Digital Dokumen</div>

        <ul class="menu">
            <li><a href="Dashboard_User.php">Dashboard</a></li>
            <li><a href="Dokumen_User.php">Dokumen Saya</a></li>
            <li><a href="Notifikasi_User.php">Notifikasi</a></li>
            <li class="active">Profil</li>
        </ul>

        <div class="logout"><a href="Logout.php">Keluar</a></div>
    </aside>

    <main class="content">

        <header class="header">
            Digital Employer Arsip Dokumen
        </header>

        <section class="main-content">

            <div class="page-title">
                <h2>Profil Pengguna</h2>
                <p>Informasi terkait pengguna</p>
            </div>

            <div class="user-card">
                <div class="user-text">
                    <h3>Selamat Datang, '.$nama_singkat.'</h3>
                    <p>NIP : '.$nip.'</p>
                    <p>Jabatan : '.$jabatan.'</p>
                </div>

                <div class="user-photo">
                    <div class="photo"></div>
                    <button class="btn-photo">Ubah Foto</button>
                </div>
            </div>

            <div class="box">
                <h4>Detail Profil</h4>
                <hr>

                <div class="form-grid">
                    <div>
                        <label>Nama Lengkap</label>
                        <input type="text" value="'.$nama_lengkap.'" readonly>
                    </div>

                    <div>
                        <label>Email</label>
                        <input type="text" value="'.$email.'" readonly>
                    </div>

                    <div>
                        <label>Alamat</label>
                        <input type="text" value="'.$alamat.'" readonly>
                    </div>

                    <div>
                        <label>Nomor Telepon</label>
                        <input type="text" value="'.$telepon.'" readonly>
                    </div>

                    <div>
                        <label>Tempat, Tanggal Lahir</label>
                        <input type="text" value="'.$ttl.'" readonly>
                    </div>
                </div>
            </div>

            <div class="box">
                <h4>Keamanan</h4>
                <hr>

                <div class="security-item">
                    <strong>Ubah Password</strong>
                    <a href="#">Ganti Kata Sandi Anda</a>
                </div>

                <div class="security-item">
                    <strong>Pertanyaan Keamanan</strong>
                    <a href="#">Atur dan Ubah pertanyaan keamanan</a>
                </div>
            </div>

        </section>
    </main>
</div>

</body>
</html>';
?>
