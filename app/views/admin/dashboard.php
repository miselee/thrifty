<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard - Thrifty</title>

    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/checkout.css">
    <style>
        .admin-wrapper {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            display: flex;
            gap: 30px;
        }

        .sidebar {
            width: 250px;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 16px;
            padding: 20px;
            height: fit-content;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 15px;
        }

        .sidebar ul li a {
            display: block;
            padding: 10px;
            border-radius: 8px;
            color: #333;
            font-weight: 500;
            text-decoration: none;
        }

        .sidebar ul li a.active,
        .sidebar ul li a:hover {
            background: #DDE8C8;
            color: #2D4D35;
        }

        .main-content {
            flex: 1;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .card-metric {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 16px;
            padding: 25px;
            text-align: center;
        }

        .card-metric h3 {
            color: #777;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .card-metric p {
            font-size: 32px;
            font-weight: 700;
            color: #4A7C59;
        }

        .db-section {
            margin-top: 30px;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 16px;
            padding: 25px;
        }

        .db-info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .db-card {
            background: #f8fbf4;
            border: 1px solid #e6eedf;
            border-radius: 16px;
            padding: 20px;
        }

        .db-card h4 {
            margin-bottom: 10px;
            color: #2d4d35;
            font-size: 18px;
        }

        .db-card p {
            color: #556b51;
            line-height: 1.6;
            font-size: 14px;
        }

        .db-list {
            margin-top: 15px;
            list-style: none;
            padding: 0;
        }

        .db-list li {
            margin-bottom: 10px;
            color: #575757;
            font-size: 14px;
        }

        .db-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .db-table th,
        .db-table td {
            padding: 12px 10px;
            border: 1px solid #e6eedf;
            text-align: left;
            font-size: 14px;
        }

        .db-table th {
            background: #f1f6eb;
            color: #4a7c59;
        }

        .backup-section {
            margin-top: 30px;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 16px;
            padding: 25px;
        }

        .btn-primary {
            display: inline-block;
            background: #4A7C59;
            color: #fff;
            padding: 12px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-primary:hover {
            opacity: .9;
        }

        .backup-list {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .backup-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px;
            border: 1px solid #eee;
            border-radius: 12px;
            background: #fafafa;
        }

        .backup-item strong {
            color: #2D4D35;
        }

        .backup-item p {
            margin-top: 5px;
            color: #777;
            font-size: 14px;
        }

        .btn-download {
            background: #DDE8C8;
            color: #2D4D35;
            padding: 10px 15px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-download:hover {
            background: #cfdcbc;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="logo">
            <h2>Thrifty Admin</h2>
        </div>

        <ul>
            <li>
                <a href="index.php?page=logout">Logout</a>
            </li>
        </ul>
    </nav>

    <div class="admin-wrapper">

        <div class="sidebar">
            <ul>
                <li>
                    <a href="index.php?page=admin-dashboard" class="active">
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="index.php?page=admin-produk">
                        Kelola Produk
                    </a>
                </li>

                <li>
                    <a href="index.php?page=admin-pesanan">
                        Kelola Pesanan
                    </a>
                </li>

                <li>
                    <a href="index.php?page=admin-fragmentasi">
                        Fragmentasi Produk
                    </a>
                </li>
            </ul>
        </div>

        <div class="main-content">

            <h1>Dashboard</h1>

            <div class="dashboard-grid">

                <div class="card-metric">
                    <h3>Total Produk</h3>
                    <p><?php echo $data['total_produk']; ?></p>
                </div>

                <div class="card-metric">
                    <h3>Total Pesanan</h3>
                    <p><?php echo $data['total_pesanan']; ?></p>
                </div>

                <div class="card-metric">
                    <h3>Pendapatan COD Selesai</h3>
                    <p>Rp <?php echo number_format($data['total_pendapatan']); ?></p>
                </div>

            </div>

            <div class="db-section">
                <h3>Manajemen Deadlock & Fragmentasi</h3>
                <p style="margin-bottom:15px;color:#666;">
                    Menampilkan status prosedur deadlock checkout dan ringkasan fragmentasi produk pada database.
                </p>

                <div class="db-info-grid">
                    <div class="db-card">
                        <h4>Deadlock Management</h4>
                        <p>
                            Prosedur <strong>checkout_aman</strong> digunakan untuk menangani deadlock dan lock timeout
                            saat proses checkout.
                            Sistem memeriksa keberadaan prosedur ini dalam skema database.
                        </p>
                        <ul class="db-list">
                            <li>Status prosedur:
                                <strong><?php echo $data['checkout_info'] ? 'Tersedia' : 'Tidak Ditemukan'; ?></strong>
                            </li>
                            <li>Retry policy: <strong>max 3 kali</strong></li>
                            <li>Lock wait timeout: <strong>8 detik</strong></li>
                        </ul>
                    </div>

                    <div class="db-card">
                        <h4>Fragmentasi Produk</h4>
                        <p>
                            Data produk dibagi menjadi fragment terpisah di tabel <strong>produk_tersedia</strong> dan
                            <strong>produk_habis</strong>.
                            Informasi ini membantu memantau pemisahan stok tersedia dan stok habis.
                        </p>
                        <ul class="db-list">
                            <li>Produk tersedia: <strong><?php echo $data['produk_tersedia']; ?></strong></li>
                            <li>Produk habis: <strong><?php echo $data['produk_habis']; ?></strong></li>
                            <li>Total baris fragmentasi: <strong><?php echo $data['fragment_rows']; ?></strong></li>
                        </ul>
                    </div>
                </div>

                <table class="db-table">
                    <thead>
                        <tr>
                            <th>Tabel</th>
                            <th>Baris</th>
                            <th>Data Free (bytes)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>produk_tersedia</td>
                            <td><?php echo $data['produk_tersedia_status']['Rows'] ?? '-'; ?></td>
                            <td><?php echo $data['produk_tersedia_status']['Data_free'] ?? '-'; ?></td>
                        </tr>
                        <tr>
                            <td>produk_habis</td>
                            <td><?php echo $data['produk_habis_status']['Rows'] ?? '-'; ?></td>
                            <td><?php echo $data['produk_habis_status']['Data_free'] ?? '-'; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="backup-section">

                <h3>Sistem Backup Database</h3>
                <p style="margin-bottom:15px;color:#666;">
                    Ekspor seluruh data sistem ke file SQL untuk menjaga keamanan data.
                </p>
                <a href="backup.php" class="btn-primary">
                    Backup Database Manual
                </a>

                <div class="backup-list">

                    <?php
                    $files = glob('storage/backups/*.sql');

                    if ($files) {

                        rsort($files);

                        foreach ($files as $file) {
                            ?>

                            <div class="backup-item">

                                <div>
                                    <strong><?= basename($file) ?></strong>

                                    <p>
                                        <?= round(filesize($file) / 1024, 2) ?> KB •
                                        <?= date('d M Y H:i', filemtime($file)) ?>
                                    </p>
                                </div>

                                <a href="<?= $file ?>" class="btn-download" download>
                                    Download
                                </a>

                            </div>

                            <?php
                        }
                    } else {
                        ?>

                        <p>Belum ada backup tersedia.</p>

                        <?php
                    }
                    ?>

                </div>


            </div>

        </div>

    </div>

</body>

</html>
