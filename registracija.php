<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $korisnicko_ime = trim($_POST['korisnicko_ime']);
    $lozinka = password_hash($_POST['lozinka'], PASSWORD_DEFAULT);

    // Provjera postoji li već email ili korisničko ime
    $stmt = $conn->prepare("SELECT id FROM korisnici WHERE email = ? OR korisnicko_ime = ?");
    $stmt->bind_param("ss", $email, $korisnicko_ime);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $greska = "Email ili korisničko ime već postoji!";
    } else {
        $stmt->close();
        $stmt = $conn->prepare("INSERT INTO korisnici (email, korisnicko_ime, lozinka) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $korisnicko_ime, $lozinka);

        if ($stmt->execute()) {
            // Automatski prijavi korisnika i preusmjeri na podatci.php
            $_SESSION['korisnik_id'] = $conn->insert_id;
            $_SESSION['korisnicko_ime'] = $korisnicko_ime;
            header("Location: podatci.php");
            exit();
        } else {
            $greska = "Došlo je do greške prilikom registracije!";
        }
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registracija</title>
    <link rel="stylesheet" href="css/pocetna.css" />
    <style>
      .register-container {
        max-width: 400px;
        margin: 60px auto;
        background: #fff;
        padding: 32px 24px;
        border-radius: 8px;
        box-shadow: 0 2px 16px rgba(0,0,0,0.08);
      }
      .register-container h2 {
        text-align: center;
        margin-bottom: 24px;
      }
      .register-container label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
      }
      .register-container input[type="email"],
      .register-container input[type="text"],
      .register-container input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 18px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }
      .register-container button {
        width: 100%;
        padding: 10px;
        background: #333;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
      }
      .register-container .login-link {
        display: block;
        text-align: center;
        margin-top: 18px;
        color: #333;
        text-decoration: none;
      }
      .register-container .login-link:hover {
        text-decoration: underline;
      }
      .error-message {
        color: red;
        text-align: center;
        margin-bottom: 20px;
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
      </div>
    </nav>

    <div class="register-container">
      <h2>Registracija</h2>
      <?php if (isset($greska)): ?>
        <div class="error-message">
          <?php echo $greska; ?>
        </div>
      <?php endif; ?>
      <form method="post" action="">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required />

        <label for="korisnicko_ime">Korisničko ime</label>
        <input type="text" id="korisnicko_ime" name="korisnicko_ime" required />

        <label for="lozinka">Lozinka</label>
        <input type="password" id="lozinka" name="lozinka" required />

        <button type="submit">Registriraj se</button>
      </form>
      <a class="login-link" href="login.php">Već imaš račun? Prijavi se</a>
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