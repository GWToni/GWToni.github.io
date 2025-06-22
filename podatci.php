<?php
require 'db.php';
session_start();

if (!isset($_SESSION['korisnik_id'])) {
    header("Location: login.php");
    exit();
}

$korisnik_id = $_SESSION['korisnik_id'];
$greska = "";
$uspjeh = "";

// Dohvati trenutne podatke korisnika
$stmt = $conn->prepare("SELECT email, korisnicko_ime, puno_ime, adresa, mobitel FROM korisnici WHERE id = ?");
$stmt->bind_param("i", $korisnik_id);
$stmt->execute();
$stmt->bind_result($email, $korisnicko_ime, $puno_ime, $adresa, $mobitel);
$stmt->fetch();
$stmt->close();

// Ako je forma poslana, ažuriraj podatke
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nova_lozinka = $_POST['nova_lozinka'];
    $potvrda_lozinke = $_POST['potvrda_lozinke'];
    $novo_puno_ime = trim($_POST['puno_ime']);
    $nova_adresa = trim($_POST['adresa']);
    $novi_mobitel = trim($_POST['mobitel']);

    // Ažuriraj dodatne podatke
    $stmt = $conn->prepare("UPDATE korisnici SET puno_ime = ?, adresa = ?, mobitel = ? WHERE id = ?");
    $stmt->bind_param("sssi", $novo_puno_ime, $nova_adresa, $novi_mobitel, $korisnik_id);
    $stmt->execute();
    $stmt->close();

    // Ažuriraj lozinku ako je unesena
    if (!empty($nova_lozinka) || !empty($potvrda_lozinke)) {
        if ($nova_lozinka !== $potvrda_lozinke) {
            $greska = "Lozinke se ne podudaraju!";
        } elseif (strlen($nova_lozinka) < 4) {
            $greska = "Lozinka mora imati barem 4 znaka!";
        } else {
            $hash_lozinka = password_hash($nova_lozinka, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE korisnici SET lozinka = ? WHERE id = ?");
            $stmt->bind_param("si", $hash_lozinka, $korisnik_id);
            if ($stmt->execute()) {
                $uspjeh = "Podaci i lozinka su uspješno ažurirani!";
            } else {
                $greska = "Došlo je do greške prilikom ažuriranja lozinke!";
            }
            $stmt->close();
        }
    } else {
        $uspjeh = "Podaci su uspješno ažurirani!";
    }

    // Ponovno dohvati podatke za prikaz
    $stmt = $conn->prepare("SELECT email, korisnicko_ime, puno_ime, adresa, mobitel FROM korisnici WHERE id = ?");
    $stmt->bind_param("i", $korisnik_id);
    $stmt->execute();
    $stmt->bind_result($email, $korisnicko_ime, $puno_ime, $adresa, $mobitel);
    $stmt->fetch();
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Korisnički podaci</title>
    <link rel="stylesheet" href="css/pocetna.css" />
    <style>
      .user-container {
        max-width: 400px;
        margin: 60px auto;
        background: #fff;
        padding: 32px 24px;
        border-radius: 8px;
        box-shadow: 0 2px 16px rgba(0,0,0,0.08);
      }
      .user-container h2 {
        text-align: center;
        margin-bottom: 24px;
      }
      .user-container label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
      }
      .user-container input[type="email"],
      .user-container input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 18px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }
      .user-container input[readonly] {
        background: #eee;
        color: #888;
      }
      .user-container input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 18px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }
      .user-container button {
        width: 100%;
        padding: 10px;
        background: #333;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
      }
      .success-message {
        color: green;
        text-align: center;
        margin-bottom: 16px;
      }
      .error-message {
        color: red;
        text-align: center;
        margin-bottom: 16px;
      }
    </style>
</head>
<body>
    <nav>
      <div class="logo">3D Printaj</div>
      <div class="hamburger" onclick="toggleMenu()">&#9776;</div>
      <div class="nav-items">
        <a href="index.php">Početna</a>
        <a href="proizvod.php">Proizvodi</a>
        <a href="onama.php">O Nama</a>
        <a href="kontakt.php">Kontakt</a>
        <a href="podatci.php">Moj profil</a>
        <a href="logout.php">Odjava</a>
      </div>
    </nav>

    <div class="user-container">
      <h2>Korisnički podaci</h2>
      <?php if ($uspjeh): ?>
        <div class="success-message"><?php echo $uspjeh; ?></div>
      <?php endif; ?>
      <?php if ($greska): ?>
        <div class="error-message"><?php echo $greska; ?></div>
      <?php endif; ?>
      <form method="post" action="">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" readonly />

        <label for="korisnicko_ime">Korisničko ime</label>
        <input type="text" id="korisnicko_ime" name="korisnicko_ime" value="<?php echo htmlspecialchars($korisnicko_ime); ?>" readonly />

        <label for="puno_ime">Puno ime i prezime</label>
        <input type="text" id="puno_ime" name="puno_ime" value="<?php echo htmlspecialchars($puno_ime ?? ''); ?>" />

        <label for="adresa">Adresa prebivališta</label>
        <input type="text" id="adresa" name="adresa" value="<?php echo htmlspecialchars($adresa ?? ''); ?>" />

        <label for="mobitel">Kontakt broj mobitela</label>
        <input type="text" id="mobitel" name="mobitel" value="<?php echo htmlspecialchars($mobitel ?? ''); ?>" />

        <hr style="margin: 24px 0;">
        <label for="nova_lozinka">Nova lozinka</label>
        <input type="password" id="nova_lozinka" name="nova_lozinka" placeholder="Ostavite prazno ako ne mijenjate" />

        <label for="potvrda_lozinke">Potvrda nove lozinke</label>
        <input type="password" id="potvrda_lozinke" name="potvrda_lozinke" placeholder="Ponovite novu lozinku" />

        <button type="submit">Spremi promjene</button>
      </form>
    </div>

    <footer>
      <p>&copy; 2025, 3D printaj</p>
      <div class="social-links">
        <a href="https://www.facebook.com/profile.php?id=100063699367611#" target="_blank">
          <img src="slike/facebook.png" alt="Facebook" class="social-icon">
        </a>
        <a href="https://www.instagram.com/sveucilisteuslavonskombrodu/" target="_blank">
          <img src="slike/instagram.png" alt="Instagram" class="social-icon">
        </a>
        <a href="https://www.youtube.com/channel/UCzlcLvAkTQUSmB9LUMenGGg" target="_blank">
          <img src="slike/youtube.png" alt="YouTube" class="social-icon">
        </a>
      </div>
    </footer>
    <script src="js/pocetna.js"></script>
</body>
</html>