<!DOCTYPE html>
<html>
<head>

    <title>Belanja - Thrifty</title>

    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/produk.css">

</head>
<body>

<?php include 'app/views/layouts/navbar.php'; ?>

<section class="produk-page">

    <div class="page-title">
        <h1>Belanja Thrift</h1>
        <p>Temukan pakaian favoritmu</p>
    </div>

    <!-- <div class="kategori-filter">

        <a href="#" class="active">Semua</a>
        <a href="#">Y2K</a>
        <a href="#">Vintage</a>
        <a href="#">Goth</a>
        <a href="#">Jaket</a>
        <a href="#">Sweater</a>
        <a href="#">Atasan</a>
        <a href="#">Rok</a>
        <a href="#">Celana</a>
        <a href="#">Tas</a>
        <a href="#">Topi</a>
        <a href="#">Sepatu</a>

    </div> -->

    <div class="produk-grid">

        <?php while($row = mysqli_fetch_assoc($products)) : ?>

        <div class="produk-card">

            <img
                src="assets/img/<?php echo $row['gambar']; ?>"
                alt=""
            >

            <div class="produk-body">

                <h3>
                    <?php echo $row['nama_produk']; ?>
                </h3>

                <p class="ukuran">
                    Ukuran :
                    <?php echo $row['ukuran']; ?>
                </p>

                <p class="kondisi">
                    <?php echo $row['kondisi']; ?>
                </p>

                <h4>
                    Rp
                    <?php echo number_format($row['harga']); ?>
                </h4>

                <a
                    href="index.php?page=detail&id=<?php echo $row['id_produk']; ?>"
                    class="btn-detail"
                >
                    Lihat Detail
                </a>

            </div>

        </div>

        <?php endwhile; ?>

    </div>

</section>

</body>
</html>