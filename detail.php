<?php

require_once "config/database.php";

$id = isset($_GET['id'])
    ? (int)$_GET['id']
    : 0;

$query = mysqli_query(
    $conn,
    "SELECT * FROM produk
     WHERE id = $id"
);

$produk = mysqli_fetch_assoc($query);

if (!$produk) {
    die("Produk tidak ditemukan.");
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= htmlspecialchars($produk['nama']); ?> - Sweet Cake
    </title>

    <link
        rel="stylesheet"
        href="assets/style.css"
    >

</head>

<body>

<!-- NAVBAR -->

<nav class="detail-navbar">

    <div class="detail-navbar-container">

        <a
            href="index.php"
            class="detail-logo"
        >
            Sweet Cake
        </a>

        <div class="detail-nav">

            <a href="index.php">
                Beranda
            </a>

            <a href="produk.php">
                Produk
            </a>

        </div>

    </div>

</nav>


<!-- DETAIL PRODUK -->

<section class="detail-section">

    <div class="detail-container">

        <div class="detail-card">

            <?php if (!empty($produk['gambar'])): ?>

                <img
                    src="uploads/produk/<?= htmlspecialchars($produk['gambar']); ?>"
                    alt="<?= htmlspecialchars($produk['nama']); ?>"
                    class="detail-image"
                >

            <?php endif; ?>


            <div class="detail-info">

                <span class="detail-category">
                    <?= htmlspecialchars($produk['kategori']); ?>
                </span>

                <h1>
                    <?= htmlspecialchars($produk['nama']); ?>
                </h1>

                <h2>
                    Rp <?= number_format(
                        $produk['harga'],
                        0,
                        ',',
                        '.'
                    ); ?>
                </h2>


                <div class="detail-divider"></div>


                <h3>
                    Deskripsi Produk
                </h3>

                <p>
                    <?= nl2br(
                        htmlspecialchars($produk['deskripsi'])
                    ); ?>
                </p>


                <p class="detail-stock">

                    <strong>Ketersediaan:</strong>

                    <?php if ((int)$produk['stok'] > 0): ?>

                        <span class="stock-available">
                            Tersedia
                            (<?= (int)$produk['stok']; ?> stok)
                        </span>

                    <?php else: ?>

                        <span class="stock-empty">
                            Stok habis
                        </span>

                    <?php endif; ?>

                </p>


                <div class="detail-actions">

                    <a
                        href="produk.php"
                        class="detail-button secondary"
                    >
                        Kembali ke Produk
                    </a>

                    <a
                        href="index.php"
                        class="detail-button primary"
                    >
                        Kembali ke Beranda
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


</body>

</html>