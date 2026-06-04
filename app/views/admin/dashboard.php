<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Thrifty</title>
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/checkout.css">
    <style>
        .admin-wrapper { max-width: 1200px; margin: 40px auto; padding: 0 20px; display: flex; gap: 30px; }
        .sidebar { width: 250px; background: #fff; border: 1px solid #eee; border-radius: 16px; padding: 20px; height: fit-content; }
        .sidebar ul { list-style: none; padding: 0; }
        .sidebar ul li { margin-bottom: 15px; }
        .sidebar ul li a { display: block; padding: 10px; border-radius: 8px; color: #333; font-weight: 500; }
        .sidebar ul li a.active, .sidebar ul li a:hover { background: #DDE8C8; color: #2D4D35; }
        .main-content { flex: 1; }
        .dashboard-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 20px; }
        .card-metric { background: #fff; border: 1px solid #eee; border-radius: 16px; padding: 25px; text-align: center; }
        .card-metric h3 { color: #777; font-size: 16px; margin-bottom: 10px; }
        .card-metric p { font-size: 32px; font-weight: 700; color: #4A7C59; }
        .backup-section { margin-top: 30px; background: #fff; border: 1px solid #eee; border-radius: 16px; padding: 25px; }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo"><h2>Thrifty Admin</h2></div>
        <ul><li><a href="index.php?page=logout">Logout</a></li></ul>
    </nav>

    <div class="admin-wrapper">
        <div class="sidebar">
            <ul>
                <li><a href="index.php?page=admin-dashboard" class="active">Dashboard</a></li>
                <li><a href="index.php?page=admin-produk">Kelola Produk</a></li>
                <li><a href="index.php?page=admin-pesanan">Kelola Pesanan</a></li>
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

            <div class="backup-section">
                <h3>Sistem Backup Database</h3>
                <p class="subtitle" style="margin-bottom: 15px;">Ekspor seluruh data sistem store ke file .sql secara instant.</p>
                <a href="index.php?page=admin-backup-manual" class="btn-primary" style="display: inline-block;">Backup Database Manual</a>
                <a href="index.php?page=admin-backup-otomatis" class="btn-primary" style="display: inline-block; margin-left: 10px;">Backup Database Otomatis</a>
            </div>
        </div>
    </div>
</body>
</html>