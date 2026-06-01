<!DOCTYPE html>
<html>
<head>

<title>Checkout</title>

<link rel="stylesheet" href="assets/css/global.css">
<link rel="stylesheet" href="assets/css/checkout.css">

</head>
<body>

<?php if(isset($_GET['success'])): ?>

    <div class="modal-overlay">

        <div class="success-modal">

            <h1>Pesanan Berhasil</h1>

            <p>
                Pembayaran menggunakan saldo berhasil.
                Hubungi penjual untuk menentukan lokasi COD.
            </p>

            <a
            href="index.php?page=riwayat"
            class="btn-primary">

                Lihat Riwayat

            </a>

        </div>

    </div>

    <?php endif; ?>


<?php include 'app/views/layouts/navbar.php'; ?>

<?php

$total = 0;
$data = [];

while($item = mysqli_fetch_assoc($items))
{
    $data[] = $item;
    $total += ($item['harga'] * $item['qty']);
}

$platform = ceil($total * 0.05);
$grand = $total + $platform;
$saldo = $_SESSION['user']['saldo'] ?? 0;

?>

<div class="checkout-container">

    <h1>Checkout</h1>

    <p class="subtitle">
        Periksa detail pesananmu sebelum melanjutkan
    </p>


    <div class="checkout-card">

        <h3>Ringkasan Produk</h3>

        <?php foreach($data as $item): ?>

        <div class="product-item">

            <img
            src="assets/img/<?php echo $item['gambar']; ?>"
            alt="">

            <div>

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

            <div class="price">
                Rp <?php echo number_format($item['harga']); ?>
            </div>

        </div>

        <?php endforeach; ?>

    </div>


    <div class="checkout-card">

        <h3>Metode Pengambilan</h3>

        <div class="method-card active">

            <h4>COD / Pick Up</h4>

            <p>
                Atur lokasi dan waktu pengambilan
                langsung dengan penjual melalui WhatsApp.
            </p>

        </div>

    </div>


    <div class="checkout-card">

        <h3>Metode Pembayaran</h3>

        <div class="payment-method active">

            <input
            type="radio"
            name="metode_pembayaran"
            value="saldo"
            checked>

            <div class="payment-info">

                <h4>Saldo Akun Thrifty</h4>

                <p>
                    Bayar langsung menggunakan saldo akun yang tersedia.
                </p>

            </div>

            <div class="saldo-badge">
                Saldo Aktif
            </div>

        </div>

    </div>

    <div class="checkout-card payment-card">

        <div class="payment-left">

            <h3>Ringkasan Pembayaran</h3>

            <div class="row">
                <span>Saldo Tersedia</span>
                <span>
                    Rp <?php echo number_format($saldo); ?>
                </span>
            </div>

            <div class="row">
                <span>Subtotal</span>
                <span>
                    Rp <?php echo number_format($total); ?>
                </span>
            </div>

            <div class="row">
                <span>Biaya Platform</span>
                <span>
                    Rp <?php echo number_format($platform); ?>
                </span>
            </div>

            <div class="total-row">

                <span>Total</span>

                <span>
                    Rp <?php echo number_format($grand); ?>
                </span>

            </div>

        </div>

        <div class="payment-right">

            <form
            method="POST"
            action="index.php?page=process-order">

                <?php if($saldo < $grand): ?>

                    <p style="color:red; margin-bottom:15px;">
                        Saldo tidak mencukupi untuk melakukan pembayaran.
                    </p>

                    <button class="pay-btn" disabled>
                        Saldo Tidak Cukup
                    </button>

                <?php else: ?>

                    <button class="pay-btn">
                        Bayar dengan Saldo
                    </button>

                <?php endif; ?>

            </form>

        </div>

    </div>

</div>

</body>
</html>