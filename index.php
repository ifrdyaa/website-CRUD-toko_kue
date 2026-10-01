<?php
require_once "config/database.php";

// Mengambil produk terbaru dari database
$query = mysqli_query(
    $conn,
    "SELECT * FROM produk ORDER BY id DESC LIMIT 6"
);

// Pengaturan halaman
$page_title = "Sweet Cake - Kue Lezat untuk Setiap Momen";
$active_page = "beranda";

// Memanggil header
include "includes/header.php";
?>

<!-- HERO -->
<section class="hero-section">

    <div class="hero-container">

        <div class="hero-text">

            <span class="hero-label">
                SELAMAT DATANG DI SWEET CAKE
            </span>

            <h1>
                Kelezatan Kue untuk
                <span>Setiap Momen</span>
            </h1>

            <p>
                Nikmati berbagai pilihan kue lezat yang dibuat
                untuk menemani momen spesialmu bersama orang tercinta.
            </p>

            <a href="#produk" class="home-button">
                Lihat Produk
            </a>

        </div>

    </div>

</section>


<!-- PRODUK TERBARU -->
<section class="product-section" id="produk">

    <div class="section-heading">

        <span>MENU PILIHAN</span>

        <h2>Produk Terbaru</h2>

        <p>
            Temukan kue favoritmu dari koleksi Sweet Cake.
        </p>

    </div>

    <div class="product-grid">

        <?php if ($query && mysqli_num_rows($query) > 0): ?>

            <?php while ($produk = mysqli_fetch_assoc($query)): ?>

                <a
                    href="detail.php?id=<?= (int)$produk['id']; ?>"
                    class="product-card-link"
                >
                    <div class="product-card">

                        <div class="product-image">

                            <?php if (!empty($produk['gambar'])): ?>

                                <img
                                    src="uploads/produk/<?= htmlspecialchars($produk['gambar']); ?>"
                                    alt="<?= htmlspecialchars($produk['nama']); ?>"
                                >

                            <?php else: ?>

                                <div class="no-image">
                                    Gambar tidak tersedia
                                </div>

                            <?php endif; ?>

                        </div>

                        <div class="product-info">

                            <span class="product-category">
                                <?= htmlspecialchars($produk['kategori']); ?>
                            </span>

                            <h3>
                                <?= htmlspecialchars($produk['nama']); ?>
                            </h3>

                            <p class="product-price">
                                Rp <?= number_format($produk['harga'], 0, ',', '.'); ?>
                            </p>

                            <p class="product-description">
                                <?= htmlspecialchars($produk['deskripsi']); ?>
                            </p>

                        </div>

                    </div>
                </a>

            <?php endwhile; ?>

        <?php else: ?>

            <p class="empty-product">
                Belum ada produk yang tersedia.
            </p>

        <?php endif; ?>

    </div>

</section>

<?php
// Memanggil footer
include "includes/footer.php";
?>
