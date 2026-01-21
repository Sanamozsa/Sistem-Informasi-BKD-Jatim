<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Notifikasi User</title>
    <link rel="stylesheet" href="../user/css/Notifikasi_User.css">
</head>
<body>

<div class="app">

<aside class="sidebar">
    <h2 class="logo">Digital Dokumen</h2>

    <ul class="menu">
        <li><a href="/Sistem-Informasi-BKD-Jatim/Frontend/user/Dashboard_User.php">Dashboard</a></li>
        <li><a href="/Sistem-Informasi-BKD-Jatim/Frontend/user/Dokumen_User.php">Dokumen Saya</a></li>
       <li class="active">Notifikasi</li>
        <li><a href="/Sistem-Informasi-BKD-Jatim/Frontend/user/Profil_User.php">Profil</a></li>

        <!-- LOGOUT DI BAWAH PROFIL -->
        <li class="logout">
            <a href="/Sistem-Informasi-BKD-Jatim/Backend/auth/logout.php"
               onclick="return confirm('Yakin ingin logout?')">
                Logout
            </a>
        </li>
    </ul>
</aside>


    <main class="content">

        <header class="header">
            Digital Employer Arsip Dokumen
        </header>

        <section class="main-content">
            <h3>Notifikasi</h3>

            <div id="notif-list">
                <p>Memuat notifikasi...</p>
            </div>
        </section>

    </main>
</div>

<script>
fetch("../../Backend/User/notifikasi.php")
    .then(res => res.json())
    .then(data => {
        const list = document.getElementById("notif-list");
        list.innerHTML = "";

        if (data.length === 0) {
            list.innerHTML = "<p>Tidak ada notifikasi.</p>";
            return;
        }

        data.forEach(n => {
            list.innerHTML += `
                <div class="notif-item">
                    <strong>${n.judul}</strong>
                    <p>${n.pesan}</p>
                    <small>${n.created_at}</small>
                </div>
            `;
        });
    })
    .catch(() => {
        document.getElementById("notif-list").innerHTML =
            "<p>Gagal memuat notifikasi</p>";
    });
</script>

</body>
</html>
