<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Klasifikasi Arsip - Admin BKD</title>
    <link rel="stylesheet" href="css/klasifikasi_arsip.css">
</head>
<body>

<aside class="sidebar">
    <div>
        <div class="logo">
            <span>Logo</span>
            <h3>Admin BKD</h3>
        </div>

        <ul class="menu">
            <li><a href="Dashboard_Admin.php">Beranda</a></li>
            <li><a href="Pengguna_Admin.php">Pengguna</a></li>
            <li class="active"><a href="Klasifikasi_Arsip.php">Klasifikasi Arsip</a></li>
            <li><a href="Manajemen_Arsip.php">Manajemen Arsip</a></li>
        </ul>
    </div>

    <div class="logout">
          <a href="/Sistem-Informasi-BKD-Jatim/Backend/auth/logout.php"
                   onclick="return confirm('Yakin ingin logout?')">
                    Logout
                </a>
    </div>
</aside>

<main class="main">

<header class="topbar">
    <input type="text" placeholder="Cari Kode atau Nama Klasifikasi...">
    <div class="profile">
        <div class="avatar"></div>
        <div>
            <strong>Admin</strong><br>
            <small>Administrator</small>
        </div>
    </div>
</header>

<section class="content">

    <div class="table-box">
        <h3>Klasifikasi Arsip Bidang Pengembangan ASN</h3>

        <!-- FORM -->
        <div class="form-box">
            <div class="form-row">
                <input type="text" placeholder="Kode Klasifikasi">
                <input type="text" placeholder="Nama Klasifikasi">
            </div>

            <div class="form-row">
                <input type="text" placeholder="Kategori">
                <input type="text" placeholder="Sub Kategori">
            </div>

            <button class="btn primary">Simpan</button>
        </div>

        <!-- TABLE -->
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Klasifikasi</th>
                    <th>Kategori</th>
                    <th>Sub Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>PA-01</td>
                    <td>Diklat Kepemimpinan</td>
                    <td>Diklat</td>
                    <td>PIM</td>
                    <td>
                        <button class="btn edit">Edit</button>
                        <button class="btn delete">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

</section>
</main>

</body>
</html>