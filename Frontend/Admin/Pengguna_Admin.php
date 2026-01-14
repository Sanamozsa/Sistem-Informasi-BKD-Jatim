<?php
// ===============================
// DATA ADMIN (contoh, nanti dari session / database)
// ===============================
$nama_admin = "Samuel Nathaniel";
$role_admin = "Super Admin";

// ===============================
// DATA PENGGUNA (contoh, nanti dari database)
// ===============================
$pengguna = [
    [
        "nama" => "Samuel Nathaniel",
        "username" => "22081010314",
        "nip" => "22081010314",
        "role" => "Admin",
        "status" => "Tidak Aktif"
    ]
];

// ===============================
// OUTPUT HTML
// ===============================
echo '<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengguna - Admin BKD</title>
    <link rel="stylesheet" href="css/Pengguna_Admin.css">
</head>
<body>

<div class="container">

    <aside class="sidebar">
        <div>
            <div class="logo">
                <div class="logo-box">Logo</div>
                <span>Admin BKD</span>
            </div>

            <ul class="menu">
                <li>
                    <a href="Dashboard_Admin.php">Beranda</a>
                </li>
                <li class="active">
                    <a href="Pengguna_Admin.php">Pengguna</a>
                </li>
                <li>
                    <a href="#">Klasifikasi Arsip</a>
                </li>
                <li>
                    <a href="#">Manajemen Arsip</a>
                </li>
                <li>
                    <a href="#">Laporan Arsip</a>
                </li>
            </ul>
        </div>

        <div class="logout">
            <a href="Logout.php">Keluar</a>
        </div>
    </aside>

    <main class="main">

        <header class="topbar">
            <input type="text" placeholder="Cari Nama Dokumen dan Nama Pegawai...">

            <div class="profile">
                <div class="avatar"></div>
                <div>
                    <strong>'.$nama_admin.'</strong><br>
                    <small>'.$role_admin.'</small>
                </div>
            </div>
        </header>

        <section class="content">

            <h3>Manajemen Pengguna</h3>

            <div class="form-box">
                <form method="post">
                    <div class="form-row">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama">
                        <label>NIP</label>
                        <input type="text" name="nip">
                    </div>

                    <div class="form-row">
                        <label>Username</label>
                        <input type="text" name="username">
                    </div>

                    <div class="form-row">
                        <label>Email</label>
                        <input type="email" name="email">
                    </div>

                    <div class="form-row">
                        <label>Password</label>
                        <input type="password" name="password">
                    </div>

                    <div class="form-row">
                        <label>Role</label>
                        <select name="role">
                            <option>Admin</option>
                            <option>User</option>
                        </select>

                        <div class="form-action">
                            <button type="reset" class="btn clear">Clear</button>
                            <button type="submit" class="btn primary">Tambahkan</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-box">
                <h3>Daftar Pengguna</h3>

                <input type="text" class="search" placeholder="Cari Nama Pengguna...">

                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>NIP</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>';
                    
foreach ($pengguna as $p) {
    echo '<tr>
            <td>'.$p['nama'].'</td>
            <td>'.$p['username'].'</td>
            <td>'.$p['nip'].'</td>
            <td>'.$p['role'].'</td>
            <td>'.$p['status'].'</td>
            <td>
                <a href="#">Edit</a> |
                <a href="#">Hapus</a>
            </td>
          </tr>';
}

echo '
                    </tbody>
                </table>
            </div>

        </section>
    </main>

</div>

</body>
</html>';
?>
