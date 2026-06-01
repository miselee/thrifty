<!DOCTYPE html>
<html>
<head>

    <title>Keranjang Saya</title>

    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/keranjang.css">

</head>
<body>

<?php include 'app/views/layouts/navbar.php'; ?>

<?php

$total = 0;
$cartData = [];

while($item = mysqli_fetch_assoc($items))
{
    $cartData[] = $item;
    $total += ($item['harga'] * $item['qty']);
}

$biaya_platform = ceil($total * 0.05);
$grand_total = $total + $biaya_platform;

?>

<div class="cart-wrapper">

    <h1>Keranjang Saya</h1>

    <div class="cart-box">

        <div class="cart-products">

            <?php foreach($cartData as $item): ?>

            <div class="cart-item">

                <div class="check">
                    ✓
                </div>

                <img
                src="assets/img/<?php echo $item['gambar']; ?>"
                alt="">

                <div class="item-info">

                    <h4>
                        <?php echo $item['nama_produk']; ?>
                    </h4>

                    <h3>
                        Rp <?php echo number_format($item['harga']); ?>
                    </h3>

                    <p>
                        Ukuran :
                        <?php echo $item['ukuran']; ?>

                        |

                        Kondisi :
                        <?php echo $item['kondisi']; ?>
                    </p>

                </div>

                <a
                href="index.php?page=hapus-cart&id=<?php echo $item['id_keranjang']; ?>"
                class="delete-btn">

                    🗑

                </a>

            </div>

            <?php endforeach; ?>

        </div>

        <div class="cart-summary">

            <h3>Ringkasan Belanja</h3>

            <div class="summary-row">

                <span>Subtotal</span>

                <span>
                    Rp <?php echo number_format($total); ?>
                </span>

            </div>

            <div class="summary-row">

                <span>Ongkos Platform</span>

                <span>
                    Rp <?php echo number_format($biaya_platform); ?>
                </span>

            </div>

            <div class="summary-total">

                <span>Total</span>

                <span>
                    Rp <?php echo number_format($grand_total); ?>
                </span>

            </div>

            <a
            href="index.php?page=checkout"
            class="checkout-btn">

                Checkout

            </a>

        </div>

    </div>

</div>

</body>
</html>