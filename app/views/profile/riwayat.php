<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Pesanan</title>

    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/riwayat.css">
</head>
<body>

<?php include 'app/views/layouts/navbar.php'; ?>

<div class="riwayat-container">

    <h1>Riwayat Pesanan</h1>

    <?php while($order = mysqli_fetch_assoc($orders)): ?>

    <div class="order-card">

        <div class="order-info">

            <h3>
                #TRF<?php echo str_pad($order['id_pesanan'],5,'0',STR_PAD_LEFT); ?>
            </h3>

            <p>
                <?php echo date('d M Y H:i',strtotime($order['tanggal'])); ?>
            </p>

        </div>

        <div class="order-product">

            <img src="assets/img/jacket.jpg">

        </div>

        <div class="order-qty">

            <p>Pesanan</p>
            <h4>1 Barang</h4>

        </div>

        <div class="order-total">

            <p>Total</p>

            <h3>
                Rp <?php echo number_format($order['total']); ?>
            </h3>

        </div>

        <div class="order-action">

            <?php
            $class = '';

            if($order['status'] == 'Selesai'){
                $class = 'success';
            }elseif($order['status'] == 'Diproses'){
                $class = 'warning';
            }else{
                $class = 'danger';
            }
            ?>

            <span class="status <?php echo $class; ?>">
                <?php echo $order['status']; ?>
            </span>

            <a
                href="index.php?page=detail-pesanan&id=<?php echo $order['id_pesanan']; ?>"
                class="detail-btn">

                Lihat Detail

            </a>

        </div>

    </div>

    <?php endwhile; ?>

</div>

</body>
</html>