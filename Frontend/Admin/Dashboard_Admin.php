<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin BKD</title>
    <link rel="stylesheet" href="css/Dashboard_Admin.css">
</head>
<body>

<aside class="sidebar">
    <div>
        <div class="logo">
            <span>Logo</span>
            <h3>Admin BKD</h3>
        </div>

        <ul class="menu">
            <li class="active"><a href="Dashboard_Admin.php">Beranda</a></li>
            <li><a href="Pengguna_Admin.php">Pengguna</a></li>
            <li><a href="#">Klasifikasi Arsip</a></li>
            <li><a href="#">Manajemen Arsip</a></li>
            <li><a href="#">Laporan Arsip</a></li>
        </ul>
    </div>

    <div class="logout">
        <a href="../../Backend/auth/logout.php">Keluar</a>
    </div>
</aside>

<main class="main">

<header class="topbar">
    <input type="text" placeholder="Cari Nama Dokumen dan Nama Pegawai...">
    <div class="profile">
        <div class="avatar"></div>
        <div>
            <strong id="admin-nama">Admin</strong><br>
            <small id="admin-role">Administrator</small>
        </div>
    </div>
</header>

<section class="content">

    <div class="info-grid">
        <div class="box">Total Dokumen<br><strong id="total-dokumen">0</strong></div>
        <div class="box">Pegawai Aktif<br><strong id="total-pegawai">0</strong></div>
        <div class="box">Permintaan Verifikasi<br><strong id="total-verifikasi">0</strong></div>
        <div class="box">Data Arsip</div>
        <div class="box large">Upload Dokumen Perbulan</div>
    </div>

    <div class="table-box">
        <h3>Tabel Arsip</h3>
        <table>
            <thead>
                <tr>
                    <th>Nama Pegawai</th>
                    <th>NIP</th>
                    <th>Tanggal Upload</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="arsip-body">
                <tr>
                    <td colspan="4">Memuat data...</td>
                </tr>
            </tbody>
        </table>
    </div>

</section>
</main>

<script>
fetch("../../Backend/Admin/dashboard.php")
    .then(res => res.json())
    .then(data => {

        if (data.error) {
            alert(data.message);
            window.location.href = "../../Frontend/Login.php";
            return;
        }

        // ADMIN
        document.getElementById("admin-nama").innerText = data.admin.nama_lengkap;
        document.getElementById("admin-role").innerText = "Administrator";

        // SUMMARY
        document.getElementById("total-dokumen").innerText = data.summary.total_dokumen;
        document.getElementById("total-pegawai").innerText = data.summary.total_pegawai;
        document.getElementById("total-verifikasi").innerText = data.summary.menunggu_verifikasi;

        // TABEL ARSIP
        const tbody = document.getElementById("arsip-body");
        tbody.innerHTML = "";

        if (data.arsip.length === 0) {
            tbody.innerHTML = "<tr><td colspan='4'>Data kosong</td></tr>";
            return;
        }

        data.arsip.forEach(a => {
            tbody.innerHTML += `
                <tr>
                    <td>${a.nama_lengkap}</td>
                    <td>${a.nip}</td>
                    <td>${a.tanggal_upload}</td>
                    <td>
                        <a href="../../${a.file_path}" target="_blank">Download</a>
                    </td>
                </tr>
            `;
        });

    })
    .catch(() => {
        document.getElementById("arsip-body").innerHTML =
            "<tr><td colspan='4'>Gagal memuat data</td></tr>";
    });
</script>

</body>
</html>
