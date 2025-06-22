<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>O Nama</title>
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
        <h1>O Nama</h1>
        <p>
            U 3D Printaj bavimo se uslugama visoko kvalitetnog 3D printanja. 
            Mijenjamo način na koji razmišljate o 3D ispisu. 
            Naš inovativni dizajn i materijali vrhunske kvalitete oživljavaju vaše ideje, nudeći neusporedivu razinu prilagodbe i preciznosti. 
            Bilo da ste profesionalac koji traži detaljne modele ili hobist koji istražuje kreativne mogućnosti, imamo ponešto za svakoga.
            Uronite s nama u svijet 3D printanja.
        </p>
      </div>
      <div class="column-right">
        <img src="./slike/onama.png" alt="O Nama" class="onama-image">
      </div>
    </div>
  </section>

  <section id="najnoviji-proizvodi">
    <div class="column-left">
      <h2>Povijest i briga za budućnost</h2>
      <p>
        3D Printaj više je od webshopa; mi smo pristupnik za oživljavanje vaših najambicioznijih projekata. 
        Uz dugogodišnje iskustvo u industriji 3D ispisa, naša je misija našim klijentima pružiti vrhunske, prilagodljive dizajne. 
        Naš tim strastveno se bavi inovacijama i kvalitetom, osiguravajući da svaki projekt koji poduzmemo bude izveden s najvećom preciznošću. 
        Od zamršenih arhitektonskih modela do jedinstvenih osobnih darova, naš portfelj dokaz je neograničenih mogućnosti 3D ispisa. 
        Vjerujemo u održivu praksu, korištenje ekološki prihvatljivih materijala kad god je to moguće i stalno poboljšavanje naših procesa kako bismo smanjili otpad. 
        Uz 3D Printaj vaša mašta postaje realnost!
        Javite nam se sa svojim idejama, kako bi smo ih pretvorili u stvarnost ili izaberite neki od naših proizvoda iz našeg asortimana.
            
      </p>
    </div>
</section>

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