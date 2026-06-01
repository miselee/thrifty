<!DOCTYPE html>
<html>
<head>

    <title>Detail Produk</title>

    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/detail.css">

</head>
<body>

<?php include 'app/views/layouts/navbar.php'; ?>

<section class="detail-container">

    <div class="detail-image">

        <img
            src="assets/img/<?php echo $product['gambar']; ?>"
            alt=""
        >

    </div>

    <div class="detail-info">

        <h1>
            <?php echo $product['nama_produk']; ?>
        </h1>

        <h2>
            Rp
            <?php echo number_format($product['harga']); ?>
        </h2>

        <p>
            <strong>Ukuran :</strong>
            <?php echo $product['ukuran']; ?>
        </p>

        <p>
            Stok :
            <?php echo $product['stok']; ?>
        </p>

        <p>
            <strong>Kondisi :</strong>
            <?php echo $product['kondisi']; ?>
        </p>

        <p class="deskripsi">
            <?php echo $product['deskripsi']; ?>
        </p>

        <?php if($product['stok'] > 0): ?>

            <a
            href="index.php?page=add-cart&id=<?php echo $product['id_produk']; ?>"
            class="btn-beli">

            Tambah ke Keranjang

            </a>

            <?php else: ?>

            <button
            class="btn-beli"
            disabled>

            Stok Habis

            </button>

        <?php endif; ?>

    </div>

</section>

</body>
</html>