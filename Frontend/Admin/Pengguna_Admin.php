<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengguna - Admin BKD</title>
    <link rel="stylesheet" href="css/Pengguna_Admin.css">
</head>
<body>

<div class="container">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-top">
            <div class="logo">
                <div class="logo-box">Logo</div>
                <span>Admin<br>Pengembangan</span>
            </div>

            <ul class="menu">
                <li><a href="Dashboard_Admin.php">Beranda</a></li>
                <li class="active"><a href="#">Pengguna</a></li>
                <li><a href="Klasifikasi_Arsip.php">Klasifikasi Arsip</a></li>
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

    <!-- MAIN -->
    <main class="main">

        <!-- TOPBAR -->
        <header class="topbar">
            <input type="text" placeholder="Cari Nama Dokumen dan nama pengguna...">

            <div class="profile">
                <div class="avatar"></div>
                <div class="profile-info">
                    <strong>Samuel Nathaniel</strong><br>
                    <small>Super Admin</small>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <section class="content">

            <h3>Daftar Pengguna</h3>

            <!-- FORM -->
            <div class="form-box">
                <div class="form-row">
                    <label>Nama Lengkap</label>
                    <input type="text">

                    <label>NIP</label>
                    <input type="text">
                </div>

                <div class="form-row">
                    <label>Username</label>
                    <input type="text">
                </div>

                <div class="form-row">
                    <label>Email</label>
                    <input type="email">
                </div>

                <div class="form-row">
                    <label>Password</label>
                    <input type="password">
                </div>

                <div class="form-row">
                    <label>Role Pengguna</label>
                    <select>
                        <option>Admin</option>
                        <option>User</option>
                    </select>

                    <div class="form-action">
                        <button class="btn clear">Clear</button>
                        <button class="btn primary">Tambahkan</button>
                    </div>
                </div>
            </div>

            <!-- TABLE -->
            <div class="table-box">
                <input type="text" class="search" placeholder="Cari Nama pengguna...">

                <table>
                    <thead>
                        <tr>
                            <th>Nama Pengguna</th>
                            <th>Username</th>
                            <th>NIP</th>
                            <th>Role</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Samuel Nathaniel</td>
                            <td>22081010314</td>
                            <td>22081010314</td>
                            <td>Admin</td>
                            <td>Tidak Aktif</td>
                            <td>
                                <button class="btn small">Edit</button>
                                <button class="btn small danger">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </section>
    </main>

</div>

</body>
</html>
