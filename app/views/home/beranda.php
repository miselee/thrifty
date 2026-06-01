<!DOCTYPE html>
<html>
<head>

    <title>Beranda - Thrifty</title>

    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/beranda.css">

</head>
<body>

<?php include 'app/views/layouts/navbar.php'; ?>

<section class="hero">

    <div class="hero-text">

        <h1>
            Good Style,<br>
            Better Choice
        </h1>

        <p>
            Temukan pakaian thrift berkualitas
            dengan harga terjangkau.
        </p>

        <a
            href="index.php?page=produk"
            class="btn"
        >
            Belanja Sekarang
        </a>

    </div>

</section>

<section class="produk-section">

    <h2>Produk Terbaru</h2>

    <div class="produk-grid">

        <?php while($row = mysqli_fetch_assoc($products)) : ?>

        <div class="produk-card">

            <img
                src="assets/img/<?php echo $row['gambar']; ?>"
                alt=""
            >

            <h3>
                <?php echo $row['nama_produk']; ?>
            </h3>

            <p class="harga">
                Rp <?php echo number_format($row['harga']); ?>
            </p>

            <a
            href="index.php?page=detail&id=<?php echo $row['id_produk']; ?>"
            class="detail-btn">
                Detail
            </a>

        </div>

        <?php endwhile; ?>

    </div>

</section>

</body>
</html>