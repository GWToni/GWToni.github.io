<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kontakt</title>
  <link rel="stylesheet" href="css/pocetna.css">
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
      <?php if (isset($_SESSION['korisnik_id'])): ?>
      <a href="podatci.php">Moj profil</a>
      <a href="logout.php">Odjava</a>
    <?php else: ?>
      <a href="login.php">Prijava</a>
    <?php endif; ?>
  </div>
  </nav>

  <section class="hero">
    <div class="hero-container">
      <div class="column-left">
        <h1>Kontakt</h1>
        <p>
          Imate pitanja ili trebate više informacija? Slobodno nas kontaktirajte putem donjeg obrasca ili nas posjetite na našoj adresi.
        </p>
        <p>
          <strong>Lokacija:</strong> Ul. 108. brigade ZNG 36, Slavonski Brod<br>
          <strong>Telefon:</strong> <a href="tel:+385981843822">+385981233223</a><br>
          <strong>Email:</strong> <a href="mailto:info@3dprintaj.com">info@3dprintaj.com</a><br>
        </p>
      </div>
      <div class="column-right">
        <div class="map-container">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.951631278066!2d18.0115545153168!3d45.16524937909833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475dbb10832ad62f%3A0xd76e87019c155fb6!2sUl.%20108.%20brigade%20ZNG%2036%2C%2035000%2C%20Slavonski%20Brod%2C%20Croatia!5e0!3m2!1sen!2s!4v1614151234567!5m2!1sen!2s" width="800" height="600"  allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div>
    </div>
  </section>

  <section id="kontakt-forma">
    <div class="form-container">
      <h2>Kontaktirajte nas</h2>
      <form action="mailto:info@3dprintaj.com" method="post" enctype="text/plain" onsubmit="return validateForm()">
        <label for="name">Ime:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="message">Poruka:</label>
        <textarea id="message" name="message" rows="4" required></textarea>
        <br>
        <button type="submit">Pošalji</button>
      </form>
    </div>
  </section>
  
  <script>
    function validateForm() {
      const email = document.getElementById('email').value;
      const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
      if (!emailPattern.test(email)) {
        alert('Molimo unesite ispravan email.');
        return false;
      }
      return true;
    }
  </script>

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