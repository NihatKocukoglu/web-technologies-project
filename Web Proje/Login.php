<?php
$hata = "";
$girisBasarili = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dogru_email = "b221210054@sakarya.edu.tr";
    $dogru_sifre = "b221210054";

    $email = trim($_POST["email"]);
    $sifre = trim($_POST["password"]);

    if (empty($email) || empty($sifre)) {
        $hata = "Kullanıcı adı ve şifre boş bırakılamaz.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hata = "Geçerli bir e-posta adresi giriniz.";
    } elseif ($email === $dogru_email && $sifre === $dogru_sifre) {
        $girisBasarili = true;
    } else {
        $hata = "Kullanıcı adı veya şifre hatalı.";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>

<div class="login-wrapper">
    <div class="login-box">

        <?php if ($girisBasarili): ?>
            <h2>Hoşgeldiniz, <?php echo explode('@', $email)[0]; ?>!</h2>
            <div class="buttons">
                <a href="index.html">
                    <button>Ana Sayfaya Git</button>
                </a>
            </div>
        <?php else: ?>
            <h2>Giriş Yap</h2>
            <?php if (!empty($hata)) echo "<div class='error'>$hata</div>"; ?>

            <form method="post">
                <label for="email">Kullanıcı Adı (e-mail):</label>
                <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email ?? '') ?>">

                <label for="password">Şifre:</label>
                <input type="password" id="password" name="password">

                <input type="submit" value="Giriş Yap">
            </form>
        <?php endif; ?>

    </div>
</div>

</body>
</html>
