<?php
// Oturumu başlat
session_start();

// Hataları göstermek için ayar
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sabit kullanıcı adı ve şifre 
    $kullanici_adi = "b221210054@sakarya.edu.tr";
    $sifre = "b221210054";

    // Formdan gelen veriler
    $gelen_kullanici = $_POST["kullanici"];
    $gelen_sifre = $_POST["sifre"];

    // Kontrol
    if ($gelen_kullanici == $kullanici_adi && $gelen_sifre == $sifre) {
        $_SESSION["giris"] = true;
        $_SESSION["kullanici"] = $kullanici_adi;
        header("Location: index.html"); // Başarılıysa anasayfaya yönlendir
        exit();
    } else {
        $error = "Kullanıcı adı veya şifre hatalı!";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Giriş Yap</h2>
    <form method="POST" action="Login.php">
        <label for="kullanici">Kullanıcı Adı:</label>
        <input type="text" id="kullanici" name="kullanici" required>

        <label for="sifre">Şifre:</label>
        <input type="password" id="sifre" name="sifre" required>

        <button type="submit">Giriş</button>

        <?php
        if ($error != "") {
            echo "<p style='color:red;'>$error</p>";
        }
        ?>
    </form>
</div>

</body>
</html>
