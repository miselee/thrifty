<!DOCTYPE html>
<html>
<head>
    <title>Kelola Produk - Thrifty Admin</title>
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
        .form-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; margin-top: 15px; }
        .form-group { display: flex; flex-direction: column; gap: 5px; }
        .form-group full { grid-column: span 2; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: #fff; border-radius: 12px; overflow: hidden; border: 1px solid #eee; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #f4fbf6; color: #4A7C59; }
        .btn-danger { background: #ff4d4f; color: white; padding: 6px 12px; border-radius: 6px; font-size: 14px; }
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
                <li><a href="index.php?page=admin-dashboard">Dashboard</a></li>
                <li><a href="index.php?page=admin-produk" class="active">Kelola Produk</a></li>
                <li><a href="index.php?page=admin-pesanan">Kelola Pesanan</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div class="checkout-card">
                <h3>Tambah Produk Thrift Baru</h3>
                <form method="POST" enctype="multipart/form-data" class="form-grid">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="nama_produk" required>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" required>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" name="stok" required>
                    </div>
                    <div class="form-group">
                        <label>Ukuran</label>
                        <input type="text" name="ukuran" placeholder="Contoh: L, XL, M" required>
                    </div>
                    <div class="form-group">
                        <label>Kondisi</label>
                        <input type="text" name="kondisi" placeholder="Contoh: 9/10, Like New" required>
                    </div>
                    <div class="form-group">
                        <label>Gambar Produk</label>
                        <input type="file" name="gambar" required>
                    </div>
                    <div class="form-group" style="grid-column: span 2;">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" required></textarea>
                    </div>
                    <div style="grid-column: span 2;">
                        <button type="submit" name="add_produk" class="pay-btn" style="padding: 12px; font-size: 16px;">Simpan Produk</button>
                    </div>
                </form>
            </div>

            <h2>Daftar Produk</h2>
            <table>
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Ukuran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($products)): ?>
                    <tr>
                        <td><img src="assets/img/<?php echo $row['gambar']; ?>" width="50" height="50" style="object-fit: cover; border-radius: 6px;"></td>
                        <td><?php echo $row['nama_produk']; ?></td>
                        <td>Rp <?php echo number_format($row['harga']); ?></td>
                        <td><?php echo $row['stok']; ?></td>
                        <td><?php echo $row['ukuran']; ?></td>
                        <td>
                            <a href="index.php?page=admin-produk&delete_id=<?php echo $row['id_produk']; ?>" class="btn-danger" onclick="return confirm('Hapus produk ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>