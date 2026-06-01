<!DOCTYPE html>
<html>
<head>

<title>Detail Pesanan</title>

<link rel="stylesheet" href="assets/css/global.css">
<link rel="stylesheet" href="assets/css/detail_pesanan.css">

</head>
<body>

<?php include 'app/views/layouts/navbar.php'; ?>

<div class="detail-order-container">

    <div class="order-card">

        <h2>Ringkasan Produk</h2>

        <?php while($item = mysqli_fetch_assoc($detail)): ?>

        <div class="product-row">

            <img
            src="assets/img/<?php echo $item['gambar']; ?>">

            <div class="product-info">

                <h4>
                    <?php echo $item['nama_produk']; ?>
                </h4>

                <p>
                    Ukuran :
                    <?php echo $item['ukuran']; ?>

                    |

                    Kondisi :
                    <?php echo $item['kondisi']; ?>
                </p>

            </div>

            <div class="product-price">

                Rp
                <?php echo number_format($item['harga']); ?>

            </div>

        </div>

        <?php endwhile; ?>

    </div>

    <div class="order-card payment-card">

        <div class="payment-left">

            <h2>Detail Pesanan</h2>

            <div class="payment-row">
                <span>Status</span>
                <span class="status-badge">
                    <?php echo $pesanan['status']; ?>
                </span>
            </div>

            <div class="payment-row">
                <span>Total Pembayaran</span>
                <span>
                    Rp <?php echo number_format($pesanan['total']); ?>
                </span>
            </div>

            <div class="payment-row">
                <span>Metode Pembayaran</span>
                <span class="payment-method">
                    Saldo Akun Thrifty
                </span>
            </div>

            <div class="payment-row">
                <span>Metode Pengambilan</span>
                <span class="pickup-method">
                    COD / Pick Up
                </span>
            </div>

        </div>

    </div>

    <div class="order-card">

        <h2>Meet Your Seller</h2>

        <div class="seller-card">

            <img src="assets/img/default-user.png">

            <div>

                <h3>Penjual Thrifty</h3>

                <p>
                    Hubungi penjual untuk
                    mengatur lokasi COD / Pick Up
                </p>

            </div>

        </div>

        <a
        href="https://wa.me/<?php echo $_SESSION['user']['no_wa']; ?>"
        class="wa-btn">

        Hubungi Penjual via WhatsApp

        </a>

    </div>

    <div class="info-box">

        Ambil barang langsung di lokasi penjual.
        Hubungi penjual melalui WhatsApp untuk
        mengatur waktu dan lokasi pengambilan.

    </div>

    <a
    href="index.php?page=beranda"
    class="back-btn">

    Kembali ke Beranda

    </a>

</div>

</body>
</html>