<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dokumen Saya</title>

    <!-- CSS ABSOLUTE PATH (AMAN) -->
    <link rel="stylesheet" href="/Sistem-Informasi-BKD-Jatim/Frontend/user/css/dokumen_user.css">
</head>
<body>

<div class="app">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="logo">Digital Dokumen</div>
        <ul class="menu">
            <li>
                <a href="/Sistem-Informasi-BKD-Jatim/Frontend/user/Dashboard_User.php">
                    Dashboard
                </a>
            </li>
            <li class="active">Dokumen Saya</li>
            <li>
                <a href="/Sistem-Informasi-BKD-Jatim/Frontend/user/Notifikasi_User.php">
                    Notifikasi
                </a>
            </li>
            <li>
                <a href="/Sistem-Informasi-BKD-Jatim/Frontend/user/Profil_User.php">
                    Profil
                </a>
            </li>
        </ul>

        <div class="logout">
            <a href="/Sistem-Informasi-BKD-Jatim/Frontend/Logout.php">Keluar</a>
        </div>
    </aside>

    <!-- CONTENT -->
    <main class="content">
        <header class="header">
            Digital Employer Arsip Dokumen
        </header>

        <section class="main-content">

            <div class="top-action">
                <input type="text" class="search" placeholder="Cari Nama Dokumen.....">
                <a href="/Sistem-Informasi-BKD-Jatim/Frontend/user/Upload_User.php"
                   class="btn-upload">+ Upload Dokumen</a>
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
                <tbody id="dokumen-body">
                    <tr>
                        <td colspan="4">Memuat data...</td>
                    </tr>
                </tbody>
            </table>

        </section>
    </main>

</div>

<!-- ================= JS FETCH API ================= -->
<script>
fetch("/Sistem-Informasi-BKD-Jatim/Backend/User/dokumen.php")
    .then(res => res.json())
    .then(data => {
        const tbody = document.getElementById("dokumen-body");
        tbody.innerHTML = "";

        if (!data || data.length === 0) {
            tbody.innerHTML =
                `<tr><td colspan="4">Belum ada dokumen</td></tr>`;
            return;
        }

        data.forEach(d => {
            const statusClass =
                d.status === "Disetujui" ? "approved" : "pending";

            tbody.innerHTML += `
                <tr>
                    <td>${d.nama_dokumen}</td>
                    <td>${d.tanggal_upload}</td>
                    <td>
                        <span class="status ${statusClass}">
                            ${d.status}
                        </span>
                    </td>
                    <td>
                        <a href="/Sistem-Informasi-BKD-Jatim/${d.file_path}"
                           target="_blank"
                           class="btn">Lihat</a>
                    </td>
                </tr>
            `;
        });
    })
    .catch(err => {
        document.getElementById("dokumen-body").innerHTML =
            `<tr><td colspan="4">Gagal memuat data</td></tr>`;
        console.error(err);
    });
</script>

</body>
</html>
