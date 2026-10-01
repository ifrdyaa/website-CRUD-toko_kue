<?php
$page_title = $page_title ?? "Sweet Cake";
$active_page = $active_page ?? "";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title); ?></title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body class="home-page">

    <!-- HEADER -->
    <header class="home-header">
        <div class="home-header-container">

            <a href="index.php" class="home-logo">
                Sweet Cake
            </a>

            <nav class="home-nav">
                <a href="index.php"
                   class="<?= $active_page == 'beranda' ? 'active' : ''; ?>">
                    Beranda
                </a>

                <a href="index.php#produk">
                    Produk
                </a>

                <a href="tentang.php"
                   class="<?= $active_page == 'tentang' ? 'active' : ''; ?>">
                    Tentang Kami
                </a>

                <a href="auth/login.php">
                    Login Admin
                </a>
            </nav>

        </div>
    </header>