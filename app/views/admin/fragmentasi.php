<!DOCTYPE html>
<html>

<head>
    <title>Fragmentasi Produk - Thrifty Admin</title>
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
        }

        .sidebar ul li a.active,
        .sidebar ul li a:hover {
            background: #DDE8C8;
            color: #2D4D35;
        }

        .main-content {
            flex: 1;
        }

        .summary-cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .summary-card {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 16px;
            padding: 20px;
        }

        .summary-card h3 {
            margin-bottom: 10px;
            color: #4A7C59;
        }

        .summary-card p {
            margin: 0;
            color: #555;
            font-size: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #eee;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #f4fbf6;
            color: #4A7C59;
        }

        .status-chip {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 600;
        }

        .status-chip.tersedia {
            background: #DDE8C8;
            color: #2D4D35;
        }

        .status-chip.habis {
            background: #fde2e2;
            color: #a12727;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <h2>Thrifty Admin</h2>
        </div>
        <ul>
            <li><a href="index.php?page=logout">Logout</a></li>
        </ul>
    </nav>

    <div class="admin-wrapper">
        <div class="sidebar">
            <ul>
                <li><a href="index.php?page=admin-dashboard">Dashboard</a></li>
                <li><a href="index.php?page=admin-produk">Kelola Produk</a></li>
                <li><a href="index.php?page=admin-pesanan">Kelola Pesanan</a></li>
                <li><a href="index.php?page=admin-fragmentasi" class="active">Fragmentasi Produk</a></li>
            </ul>
        </div>

        <div class="main-content">
            <h1>Fragmentasi Produk</h1>
            <p>Menampilkan tabel fragmen produk terpisah sesuai status "tersedia" dan "habis".</p>

            <div class="summary-cards">
                <div class="summary-card">
                    <h3>Produk Tersedia</h3>
                    <p><?php echo $data['produk_tersedia']; ?> baris</p>
                </div>
                <div class="summary-card">
                    <h3>Produk Habis</h3>
                    <p><?php echo $data['produk_habis']; ?> baris</p>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID Produk</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Ukuran</th>
                        <th>Kondisi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($fragmentasi)): ?>
                        <tr>
                            <td><?php echo $row['id_produk']; ?></td>
                            <td><?php echo $row['nama_produk']; ?></td>
                            <td>Rp <?php echo number_format($row['harga']); ?></td>
                            <td><?php echo $row['stok']; ?></td>
                            <td><?php echo $row['ukuran']; ?></td>
                            <td><?php echo $row['kondisi']; ?></td>
                            <td>
                                <span class="status-chip <?php echo strtolower($row['status']); ?>">
                                    <?php echo $row['status']; ?>
                                </span>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
