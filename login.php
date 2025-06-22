<?php
require 'db.php'; // Povezivanje na bazu
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $lozinka = $_POST['lozinka'];

    $stmt = $conn->prepare("SELECT id, lozinka, korisnicko_ime FROM korisnici WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $hash, $korisnicko_ime);
        $stmt->fetch();
        if (password_verify($lozinka, $hash)) {
            $_SESSION['korisnik_id'] = $id;
            $_SESSION['korisnicko_ime'] = $korisnicko_ime;
            header("Location: index.php");
            exit();
        } else {
            $greska = "Pogrešan email ili lozinka!";
        }
    } else {
        $greska = "Pogrešan email ili lozinka!";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prijava</title>
    <link rel="stylesheet" href="css/pocetna.css" />
    <style>
      .login-container {
        max-width: 400px;
        margin: 60px auto;
        background: #fff;
        padding: 32px 24px;
        border-radius: 8px;
        box-shadow: 0 2px 16px rgba(0,0,0,0.08);
      }
      .login-container h2 {
        text-align: center;
        margin-bottom: 24px;
      }
      .login-container label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
      }
      .login-container input[type="email"],
      .login-container input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 18px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }
      .login-container button {
        width: 100%;
        padding: 10px;
        background: #333;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
      }
      .login-container .register-link {
        display: block;
        text-align: center;
        margin-top: 18px;
        color: #333;
        text-decoration: none;
      }
      .login-container .register-link:hover {
        text-decoration: underline;
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
      </div>
    </nav>

    <div class="login-container">
      <h2>Prijava</h2>
      <?php if (isset($greska)): ?>
        <div class="error-message">
          <?php echo $greska; ?>
        </div>
      <?php endif; ?>
      <form method="post" action="">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required />

        <label for="lozinka">Lozinka</label>
        <input type="password" id="lozinka" name="lozinka" required />

        <button type="submit">Prijavi se</button>
      </form>
      <a class="register-link" href="registracija.php">Nemaš račun? Registriraj se</a>
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