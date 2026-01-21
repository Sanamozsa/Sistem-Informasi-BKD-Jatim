<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Upload Dokumen</title>
    <link rel="stylesheet" href="css/Upload_User.css">
</head>
<body>

<div class="container">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <h2 class="logo">Digital Dokumen</h2>

        <ul class="menu">
            <li>
                <a href="Dashboard_User.php">Dashboard</a>
            </li>

            <li class="active">
                <a href="Dokumen_User.php">Dokumen Saya</a>
            </li>

            <li>
                <a href="Notifikasi_User.php">Notifikasi</a>
            </li>

            <li>
                <a href="Profil_User.php">Profil</a>
            </li>

            <!-- LOGOUT DI BAWAH PROFIL -->
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

        <header class="topbar">
            Digital Employer Arsip Dokumen
        </header>

        <section class="content-body">

            <div class="upload-card">
                <h3>Unggah Dokumen</h3>

                <div class="drop-area">
                    <div class="icon">☁</div>
                    <p>Seret dan Letakkan File di sini atau Klik untuk Unggah</p>
                    <input type="file">
                </div>

                <h3 class="detail-title">Detail Dokumen</h3>

                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Dokumen</label>
                        <input type="text" name="nama_dokumen"
                               placeholder="Masukkan nama dokumen">
                    </div>

                    <div class="form-group">
                        <label>Jenis Dokumen</label>
                        <input type="text" name="jenis_dokumen"
                               placeholder="Masukkan jenis dokumen">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Upload</label>
                        <input type="date" name="tanggal_upload">
                    </div>

                    <div class="form-action">
                        <button type="submit" class="btn-upload">
                            Unggah Dokumen
                        </button>
                    </div>
                </form>
            </div>

        </section>
    </main>

</div>

</body>
</html>
