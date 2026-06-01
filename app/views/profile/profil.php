<!DOCTYPE html>
<html>
<head>

    <title>Profil Saya</title>

    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/profil.css">

</head>
<body>

<?php include 'app/views/layouts/navbar.php'; ?>

<div class="profile-container">

    <h1>Informasi Akun</h1>
    <p class="subtitle">
        Kelola informasi pribadi dan kontak kamu.
    </p>

    <div class="profile-card">

        <div class="profile-left">

            <div class="avatar">
                👤
            </div>

            <h2>
                <?php echo $_SESSION['user']['nama']; ?>
            </h2>

            <p class="member">
                Member sejak 2024
            </p>

            <div class="status-box">

                <h4>Status Akun</h4>

                <div class="verified">
                    Akun Terverifikasi
                </div>

                <p>
                    Akun kamu sudah terverifikasi
                    dengan nomor WhatsApp.
                </p>

            </div>

        </div>

        <div class="profile-right">

            <div class="info-row">

                <span>Nama Lengkap</span>

                <strong>
                    <?php echo $_SESSION['user']['nama']; ?>
                </strong>

            </div>

            <div class="info-row">

                <span>Email</span>

                <strong>
                    <?php echo $_SESSION['user']['email']; ?>
                </strong>

            </div>

            <div class="info-row">

                <span>Nomor WhatsApp</span>

                <strong>
                    <?php echo $_SESSION['user']['no_wa']; ?>
                </strong>

            </div>

            <div class="info-row">

                <span>Saldo Akun</span>

                <strong class="saldo">
                    Rp <?php echo number_format($_SESSION['user']['saldo']); ?>
                </strong>

            </div>

            <div class="info-row">

                <span>Alamat COD / Pick Up</span>

                <strong>
                    <?php
                    echo !empty($_SESSION['user']['alamat'])
                    ? $_SESSION['user']['alamat']
                    : 'Alamat belum diisi';
                    ?>
                </strong>

            </div>

            <div class="banner">

                Informasi akun kamu aman dan hanya
                digunakan untuk keperluan transaksi
                di Thrifty.

            </div>

        </div>

    </div>

</div>

</body>
</html>