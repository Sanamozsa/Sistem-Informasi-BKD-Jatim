<?php
echo '<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="login-container">
    <div class="login-box">
        <h2>Login</h2>

        <form action="../Backend/auth/login.php" method="POST">

            <label>Username</label>
            <input 
                type="text" 
                name="username" 
                placeholder="Masukkan username"
                required
            >

            <label>Password</label>
            <div class="password-box">
                <input 
                    type="password" 
                    id="password" 
                    name="password"
                    placeholder="Masukkan password"
                    required
                >
                <i class="fa-solid fa-eye" id="togglePassword"></i>
            </div>

            <label>Role</label>
            <select name="role" required>
                <option value="">Pilih Role</option>
                <option value="admin">Admin</option>
                <option value="pengguna">User</option>
            </select>

            <button type="submit">Confirm</button>
        </form>
    </div>
</div>

<script src="login.js"></script>
</body>
</html>';
?>
