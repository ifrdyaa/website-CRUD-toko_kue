<?php

session_start();

require_once "../includes/auth.php";

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Tambah Produk - Sweet Cake</title>

    <link
        rel="stylesheet"
        href="../assets/style.css"
    >

    <style>

        /* =========================================
           HALAMAN TAMBAH PRODUK
        ========================================= */

        .admin-add-page {
            min-height: calc(100vh - 80px);
            background: #fff7fa;
            padding: 50px 20px 70px;
        }

        .admin-add-container {
            width: 100%;
            max-width: 950px;
            margin: 0 auto;
        }

        /* HEADER HALAMAN */

        .admin-add-heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .admin-add-label {
            display: block;
            color: #bd5f8b;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 3px;
            margin-bottom: 10px;
        }

        .admin-add-heading h1 {
            margin: 0 0 10px;
            color: #49352f;
            font-size: 36px;
            line-height: 1.3;
        }

        .admin-add-heading p {
            margin: 0;
            color: #806c67;
            font-size: 15px;
        }


        /* CARD FORM */

        .admin-add-card {
            background: #ffffff;
            border: 1px solid #f1dce5;
            border-radius: 18px;
            padding: 35px;
            box-shadow: 0 10px 30px rgba(73, 53, 47, 0.07);
        }


        /* FORM */

        .admin-product-form {
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .admin-form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .admin-form-group {
            display: flex;
            flex-direction: column;
        }

        .admin-form-group.full {
            width: 100%;
        }

        .admin-form-group label {
            color: #49352f;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .admin-form-group label span {
            color: #bd5f8b;
        }


        /* INPUT */

        .admin-form-group input[type="text"],
        .admin-form-group input[type="number"],
        .admin-form-group select,
        .admin-form-group textarea {
            width: 100%;
            box-sizing: border-box;

            border: 1px solid #e7ccd8;
            border-radius: 9px;

            background: #fffafb;
            color: #49352f;

            font-family: Arial, sans-serif;
            font-size: 15px;

            padding: 12px 14px;

            outline: none;

            transition: 0.2s ease;
        }

        .admin-form-group input[type="text"],
        .admin-form-group input[type="number"],
        .admin-form-group select {
            height: 45px;
        }

        .admin-form-group textarea {
            min-height: 130px;
            resize: vertical;
            line-height: 1.6;
        }

        .admin-form-group input:focus,
        .admin-form-group select:focus,
        .admin-form-group textarea:focus {
            border-color: #c2628d;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(194, 98, 141, 0.10);
        }


        /* INPUT FILE */

        .admin-file-box {
            border: 1px dashed #d99ab8;
            border-radius: 10px;
            background: #fff8fb;
            padding: 14px;
        }

        .admin-file-box input[type="file"] {
            width: 100%;
            color: #76645f;
            font-size: 14px;
        }

        .admin-file-info {
            margin-top: 7px;
            color: #927d78;
            font-size: 12px;
        }


        /* TOMBOL */

        .admin-form-actions {
            display: flex;
            align-items: center;
            gap: 12px;

            margin-top: 5px;
            padding-top: 25px;

            border-top: 1px solid #f1dce5;
        }

        .admin-save-button,
        .admin-back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-width: 145px;
            height: 45px;

            padding: 0 22px;

            border: none;
            border-radius: 8px;

            font-size: 14px;
            font-weight: 600;

            text-decoration: none;
            cursor: pointer;

            transition: 0.2s ease;
            box-sizing: border-box;
        }

        .admin-save-button {
            background: #c4608e;
            color: #ffffff;
        }

        .admin-save-button:hover {
            background: #ad4e79;
            transform: translateY(-1px);
        }

        .admin-back-button {
            background: #f2dce6;
            color: #49352f;
        }

        .admin-back-button:hover {
            background: #e8cbd8;
            transform: translateY(-1px);
        }


        /* NAVBAR KHUSUS ADMIN */

        .admin-add-navbar {
            background: #efb1d0;
            padding: 22px 20px;
            box-shadow: 0 2px 8px rgba(73, 53, 47, 0.05);
        }

        .admin-add-navbar-container {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .admin-add-brand {
            color: #49352f;
            font-size: 22px;
            font-weight: 700;
            text-decoration: none;
        }

        .admin-add-nav {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-add-nav a {
            color: #49352f;
            text-decoration: none;

            font-size: 14px;
            font-weight: 600;

            padding: 9px 15px;
            border-radius: 7px;

            transition: 0.2s ease;
        }

        .admin-add-nav a:hover {
            background: rgba(255, 255, 255, 0.35);
        }

        .admin-add-nav a.active {
            background: #ffffff;
            color: #b45482;
        }


        /* RESPONSIVE */

        @media (max-width: 700px) {

            .admin-add-page {
                padding: 35px 15px 50px;
            }

            .admin-add-heading h1 {
                font-size: 29px;
            }

            .admin-add-card {
                padding: 24px 20px;
                border-radius: 14px;
            }

            .admin-form-row {
                grid-template-columns: 1fr;
                gap: 22px;
            }

            .admin-form-actions {
                flex-direction: column;
            }

            .admin-save-button,
            .admin-back-button {
                width: 100%;
            }

            .admin-add-navbar-container {
                flex-direction: column;
                gap: 12px;
            }

        }

    </style>

</head>


<body>


<!-- NAVBAR ADMIN -->

<nav class="admin-add-navbar">

    <div class="admin-add-navbar-container">

        <a
            href="index.php"
            class="admin-add-brand"
        >
            Sweet Cake
        </a>

        <div class="admin-add-nav">

            <a href="index.php">
                Dashboard
            </a>

            <a
                href="produk.php"
                class="active"
            >
                Produk
            </a>

        </div>

    </div>

</nav>


<!-- HALAMAN TAMBAH PRODUK -->

<main class="admin-add-page">

    <div class="admin-add-container">


        <!-- JUDUL -->

        <div class="admin-add-heading">

            <span class="admin-add-label">
                KELOLA PRODUK
            </span>

            <h1>
                Tambah Produk
            </h1>

            <p>
                Tambahkan produk baru ke dalam katalog Sweet Cake.
            </p>

        </div>


        <!-- FORM CARD -->

        <div class="admin-add-card">

            <form
                action="proses_produk.php"
                method="POST"
                enctype="multipart/form-data"
                class="admin-product-form"
            >

                <input
                    type="hidden"
                    name="aksi"
                    value="tambah"
                >


                <!-- NAMA & KATEGORI -->

                <div class="admin-form-row">

                    <div class="admin-form-group">

                        <label for="nama">
                            Nama Produk <span>*</span>
                        </label>

                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            placeholder="Contoh: Donat Coklat"
                            required
                        >

                    </div>


                    <div class="admin-form-group">

                        <label for="kategori">
                            Kategori <span>*</span>
                        </label>

                        <select
                            id="kategori"
                            name="kategori"
                            required
                        >

                            <option value="">
                                Pilih kategori
                            </option>

                            <option value="Cake">
                                Cake
                            </option>

                            <option value="Brownies">
                                Brownies
                            </option>

                            <option value="Donat">
                                Donat
                            </option>

                        </select>

                    </div>

                </div>


                <!-- HARGA & STOK -->

                <div class="admin-form-row">

                    <div class="admin-form-group">

                        <label for="harga">
                            Harga <span>*</span>
                        </label>

                        <input
                            type="number"
                            id="harga"
                            name="harga"
                            min="0"
                            placeholder="Contoh: 30000"
                            required
                        >

                    </div>


                    <div class="admin-form-group">

                        <label for="stok">
                            Stok <span>*</span>
                        </label>

                        <input
                            type="number"
                            id="stok"
                            name="stok"
                            min="0"
                            placeholder="Contoh: 20"
                            required
                        >

                    </div>

                </div>


                <!-- DESKRIPSI -->

                <div class="admin-form-group full">

                    <label for="deskripsi">
                        Deskripsi Produk <span>*</span>
                    </label>

                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        rows="5"
                        placeholder="Tuliskan deskripsi produk, rasa, bahan, atau informasi lainnya..."
                        required
                    ></textarea>

                </div>


                <!-- GAMBAR -->

                <div class="admin-form-group full">

                    <label for="gambar">
                        Gambar Produk
                    </label>

                    <div class="admin-file-box">

                        <input
                            type="file"
                            id="gambar"
                            name="gambar"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <div class="admin-file-info">
                            Format yang didukung: JPG, JPEG, PNG, atau WEBP.
                        </div>

                    </div>

                </div>


                <!-- BUTTON -->

                <div class="admin-form-actions">

                    <button
                        type="submit"
                        class="admin-save-button"
                    >
                        Simpan Produk
                    </button>

                    <a
                        href="produk.php"
                        class="admin-back-button"
                    >
                        Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</main>


</body>

</html>