<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

$total_produk = 3;
$total_kategori = 3;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Sweet Cake</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-container">
            <h2>Sweet Cake</h2>

            <div class="nav-menu">
                <a href="index.php" class="active">Dashboard</a>
                <a href="produk.php">Produk</a>
                <a href="../index.php" target="_blank">Website</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <!-- KONTEN DASHBOARD -->
    <main class="container">

        <div class="dashboard-header">
            <h1>Dashboard Admin</h1>
            <p>
                Selamat datang,
                <strong>
                    <?= htmlspecialchars($_SESSION['admin_nama'] ?? 'Administrator') ?>
                </strong>
            </p>
        </div>

        <!-- RINGKASAN -->
        <section class="summary">

            <div class="summary-card">
                <h3>Total Produk</h3>
                <p><?= $total_produk ?></p>
            </div>

            <div class="summary-card">
                <h3>Total Kategori</h3>
                <p><?= $total_kategori ?></p>
            </div>

            <div class="summary-card">
                <h3>Status Toko</h3>
                <p class="status">Aktif</p>
            </div>

        </section>

        <!-- MANAJEMEN -->
        <section class="management">
            <h2>Manajemen Toko</h2>

            <div class="management-list">

                <div class="management-card">
                    <h3>Manajemen Produk</h3>
                    <p>Kelola katalog produk Sweet Cake.</p>
                    <a href="produk.php" class="btn">Kelola Produk</a>
                </div>

            </div>
        </section>

    </main>

</body>
</html>