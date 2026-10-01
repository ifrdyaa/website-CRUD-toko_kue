<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    header("Location: ../admin/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Sweet Cake</title>
    <link rel="stylesheet" href="../assets/style.css?v=3">
</head>

<body class="login-page">

    <div class="login-container">
        <div class="login-card">

            <h1>Login Admin</h1>
            <p>Silakan login untuk masuk ke dashboard.</p>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="login-alert">
                    <?= htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8'); ?>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <form action="proses_login.php" method="POST">

                <!-- USERNAME -->
                <label for="username">Username</label>

                <div class="login-input-wrapper">
                    <input
                        type="text"
                        id="username"
                        name="username"
                        autocomplete="username"
                        required
                    >

                    <button
                        type="button"
                        id="clearUsername"
                        class="clear-button"
                        aria-label="Hapus username"
                    >×</button>
                </div>

                <!-- PASSWORD -->
                <label for="password">Password</label>

                <div class="login-input-wrapper">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        autocomplete="current-password"
                        required
                    >

                    <button
                        type="button"
                        id="togglePassword"
                        class="password-button"
                        aria-label="Tampilkan password"
                    >👁</button>
                </div>

                <!-- TOMBOL LOGIN -->
                <div class="login-submit">
                    <button type="submit" class="btn">
                        Login
                    </button>
                </div>

            </form>

            <!-- KEMBALI KE WEBSITE -->
            <div class="back-to-website">
                <a href="../index.php">← Kembali ke Website</a>
            </div>

        </div>
    </div>

    <script>
        // Tombol hapus username
        const username = document.getElementById("username");
        const clearUsername = document.getElementById("clearUsername");

        function updateClearButton() {
            clearUsername.style.display =
                username.value.length > 0 ? "block" : "none";
        }

        username.addEventListener("input", updateClearButton);

        clearUsername.addEventListener("click", function () {
            username.value = "";
            username.focus();
            updateClearButton();
        });

        updateClearButton();
        window.addEventListener("pageshow", updateClearButton);

        // Tombol tampilkan/sembunyikan password
        const password = document.getElementById("password");
        const togglePassword = document.getElementById("togglePassword");

        togglePassword.addEventListener("click", function () {
            if (password.type === "password") {
                password.type = "text";
                togglePassword.textContent = "🙈";
                togglePassword.setAttribute(
                    "aria-label",
                    "Sembunyikan password"
                );
            } else {
                password.type = "password";
                togglePassword.textContent = "👁";
                togglePassword.setAttribute(
                    "aria-label",
                    "Tampilkan password"
                );
            }
        });
    </script>

</body>
</html>