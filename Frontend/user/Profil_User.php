<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="css/Profil_User.css">
</head>
<body>

<div class="app">

    <!-- SIDEBAR -->
<aside class="sidebar">
    <div class="logo">
        <span>Digital<br>Dokumen</span>
    </div>

    <ul class="menu">
        <li><a href="Dashboard_User.php">Dashboard</a></li>
        <li><a href="Dokumen_User.php">Dokumen Saya</a></li>
        <li><a href="Notifikasi_User.php">Notifikasi</a></li>
        <li class="active"><a href="Profil_User.php">Profil</a></li>
       
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
            Digital Employer Arsip Dokumen
        </header>

        <section class="main-content">

            <div class="page-title">
                <h2>Profil Pengguna</h2>
                <p>Informasi terkait pengguna</p>
            </div>

            <!-- CARD USER -->
            <div class="user-card">
                <div class="user-text">
                    <h3>Selamat Datang, Nama Pengguna</h3>
                    <p>NIP : -</p>
                    <p>Jabatan : -</p>
                </div>

                <div class="user-photo">
                    <div class="photo"></div>
                    <button class="btn-photo" disabled>Ubah Foto</button>
                </div>
            </div>

            <!-- DETAIL PROFIL -->
            <div class="box">
                <h4>Detail Profil</h4>
                <hr>

                <div class="form-grid">
                    <div>
                        <label>Nama Lengkap</label>
                        <input type="text" placeholder="Nama Lengkap" readonly>
                    </div>

                    <div>
                        <label>Email</label>
                        <input type="text" placeholder="Email" readonly>
                    </div>

                    <div>
                        <label>Alamat</label>
                        <input type="text" placeholder="Alamat" readonly>
                    </div>

                    <div>
                        <label>Nomor Telepon</label>
                        <input type="text" placeholder="Nomor Telepon" readonly>
                    </div>

                    <div>
                        <label>Tempat, Tanggal Lahir</label>
                        <input type="text" placeholder="TTL" readonly>
                    </div>
                </div>
            </div>

        </section>
    </main>
</div>

</body>
</html>
