<?php
// Hata mesajını tutacak değişken
$hata = "";

// Giriş başarılı olup olmadığını tutar
$girisBasarili = false;

// Form gönderildiğinde çalışır
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Doğru e-posta ve şifreyi tanımla
    $dogru_email = "b221210054@sakarya.edu.tr";
    $dogru_sifre = "b221210054";

    // Kullanıcıdan gelen verileri al ve boşluklarını temizle
    $email = trim($_POST["email"]);
    $sifre = trim($_POST["password"]);

    // Giriş bilgileri kontrolü
    if (empty($email) || empty($sifre)) {
        $hata = "Kullanıcı adı ve şifre boş bırakılamaz.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hata = "Geçerli bir e-posta adresi giriniz.";
    } elseif ($email === $dogru_email && $sifre === $dogru_sifre) {
        // Giriş başarılı
        $girisBasarili = true;
    } else {
        // Bilgiler yanlış
        $hata = "Kullanıcı adı veya şifre hatalı.";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Ortak CSS dosyasına bağlantı -->
    <link rel="stylesheet" href="style.css">

    <!-- Login sayfasına özel bazı stiller -->
    <style>
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px #aaa;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
        }

        .hata {
            color: red;
            margin-bottom: 10px;
        }

        .basarili {
            color: green;
        }
    </style>
</head>
<body>

<!-- Login formunu saran kutu -->
<div class="login-container">

    <?php if ($girisBasarili): ?>
        <!-- Giriş başarılıysa kullanıcıya mesaj -->
        <h2 class="basarili">Hoşgeldiniz, <?php echo explode('@', $email)[0]; ?>!</h2>

    <?php else: ?>
        <!-- Giriş formu -->
        <h2>Giriş Yap</h2>

        <!-- Hata varsa göster -->
        <?php if (!empty($hata)) echo "<div class='hata'>$hata</div>"; ?>

        <!-- Form -->
        <form method="post" action="">
            <label for="email">Kullanıcı Adı (e-mail):</label>
            <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email ?? '') ?>">

            <label for="password">Şifre:</label>
            <input type="password" name="password" id="password">

            <input type="submit" value="Giriş Yap">
        </form>
    <?php endif; ?>
</div>

</body>
</html>
