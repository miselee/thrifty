<!DOCTYPE html>
<html>

<head>
    <title>Kelola Pesanan - Thrifty Admin</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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

        select {
            padding: 6px 10px;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        .btn-update {
            background: #4A7C59;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            cursor: pointer;
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
                <li><a href="index.php?page=admin-pesanan" class="active">Kelola Pesanan</a></li>
                <li><a href="index.php?page=admin-fragmentasi">Fragmentasi Produk</a></li>
            </ul>
        </div>
        <div class="main-content">
            <h1>Kelola Pesanan Masuk</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Pembeli</th>
                        <th>Total Transaksi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($orders)): ?>
                        <tr>
                            <td>#TRF<?php echo str_pad($row['id_pesanan'], 5, '0', STR_PAD_LEFT); ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td>Rp <?php echo number_format($row['total']); ?></td>
                            <td><strong><?php echo $row['status']; ?></strong></td>
                            <td>
                                <form method="POST" style="display: flex; gap: 10px; align-items: center;">
                                    <input type="hidden" name="id_pesanan" value="<?php echo $row['id_pesanan']; ?>">
                                    <select name="status">
                                        <option value="Menunggu COD" <?php echo $row['status'] == 'Menunggu COD' ? 'selected' : ''; ?>>Menunggu COD</option>
                                        <option value="Diproses" <?php echo $row['status'] == 'Diproses' ? 'selected' : ''; ?>>Diproses</option>
                                        <option value="Selesai" <?php echo $row['status'] == 'Selesai' ? 'selected' : ''; ?>>
                                            Selesai</option>
                                    </select>
                                    <button type="submit" name="update_status" class="btn-update">Update</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
