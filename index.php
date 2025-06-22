<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Početna</title>
    <link rel="stylesheet" href="css/pocetna.css" />
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
          <h1>Neograničeno 3D Printanje</h1>
          <p>
            Vaša ideja, naša realizacija. 
            Recite nam šta želite da uradimo za vas i mi ćemo to pretvoriti u stvarnost.
          </p>
          <button onclick="scrollToSection('#najnoviji-proizvodi')">Najnoviji Proizvodi</button>
          <button onclick="scrollToSection('#partneri')">Partneri</button>
          <button onclick="scrollToSection('#komentari')">Komentari</button>
          <button onclick="scrollToSection('#lokacija')">Lokacija</button>
        </div>
        <div class="column-right">
          <img
            src="./slike/logo.png"
            alt="illustration"
            class="hero-image"
          />
        </div>
      </div>
    </section>

    <section id="najnoviji-proizvodi">
      <div class="column-left">
        <h2>Proizvodi izrađeni od Najkvalitetnije ASA plastike!</h2>
        <p>
          U nasoj firmi mijenjamo način na koji razmišljate o 3D ispisu. 
          Naš inovativni dizajn i materijali vrhunske kvalitete oživljavaju vaše ideje, nudeći neusporedivu razinu prilagodbe i preciznosti. 
          Bilo da ste profesionalac koji traži detaljne modele ili hobist koji istražuje kreativne mogućnosti, imamo ponešto za svakoga. 
          Javite nam se sa svojim idejama, kako bi smo ih pretvorili u stvarnost ili izaberite neki od naših proizvoda iz našeg asortimana. 
          Uronite s nama u svijet 3D printanja, cekamo vas.
        </p>
      </div>
      <div class="column-right">
        <div class="slajder-proizvodi">
          <img src="slike/proizvod1.png" alt="Proizvod 1">
        </div>
        <div class="slajder-proizvodi">
          <img src="slike/proizvod2.png" alt="Proizvod 2">
        </div>
        <div class="slajder-proizvodi">
          <img src="slike/proizvod3.png" alt="Proizvod 3">
        </div>
        <div class="slajder-proizvodi">
          <img src="slike/proizvod4.png" alt="Proizvod 4">
        </div>
      </div>
    </section>

    <section id="partneri">
      <div class="column-left">
        <h2>Partneri sa kojima blisko surađujemo:</h2>
        <ul class="partneri-list">
          <li>
            <strong>BambuLab</strong>
            <p>Vodeći proizvođač 3D printera visokih performansi.</p>
          </li>
          <li>
            <strong>Anycubic</strong>
            <p>Specijalizirani za pristupačne i kvalitetne 3D printere.</p>
          </li>
          <li>
            <strong>Elegoo</strong>
            <p>Poznati po svojim preciznim i pouzdanim 3D printerima.</p>
          </li>
          <li>
            <strong>Crofil 3D</strong>
            <p>Hrvatski proizvođač visokokvalitetnih 3D printera i filamenata.</p>
          </li>
        </ul>
        <div class="partneri-slike">
          <a href="https://bambulab.com/en-eu" target="_blank">
            <img src="slike/bambulab.png" alt="BambuLab" class="partneri-slika">
          </a>
          <a href="https://store.anycubic.com/" target="_blank">
            <img src="slike/anycubic.png" alt="Anycubic" class="partneri-slika">
          </a>
          <a href="https://www.elegoo.com/" target="_blank">
            <img src="slike/elegoo.png" alt="Elegoo" class="partneri-slika">
          </a>
          <a href="https://crofil3d.com/" target="_blank">
            <img src="slike/crofil3d.png" alt="Crofil 3D" class="partneri-slika">
          </a>
        </div>
      </div>
    </section>
    
    <section id="komentari">
      <h2>Komentari</h2>
      <div class="komentari-container">
        <div class="komentar" id="komentar1" style="display:none;">
          <img src="slike/osoba1.png" alt="Ivan Horvat" class="komentar-slika">
          <p><strong>Ivan Horvat:</strong> "Izuzetno sam zadovoljan uslugom i kvalitetom 3D printanja. Tim je vrlo profesionalan i uspio je realizirati sve moje ideje. Preporučujem svima!"</p>
        </div>
        <div class="komentar" id="komentar2" style="display:none;">
          <img src="slike/osoba2.png" alt="Marija Kovačić" class="komentar-slika">
          <p><strong>Marija Kovačić:</strong> "Odlična usluga i brza isporuka! Proizvodi su izrađeni od vrhunskih materijala i izgledaju fantastično. Definitivno ću ponovno koristiti njihove usluge."</p>
        </div>
        <div class="komentar" id="komentar3" style="display:none;">
          <img src="slike/osoba3.png" alt="Petar Novak" class="komentar-slika">
          <p><strong>Petar Novak:</strong> "Kvaliteta 3D printanja je nevjerojatna! Tim je vrlo susretljiv i pomogao mi je u svakom koraku procesa. Hvala vam na izvrsnoj usluzi!"</p>
        </div>
        <div class="komentar" id="komentar4" style="display:none;">
          <img src="slike/osoba4.png" alt="Ana Babić" class="komentar-slika">
          <p><strong>Ana Babić:</strong> "Impresionirana sam brzinom i preciznošću izrade. Proizvodi su savršeni i točno onakvi kakve sam zamislila. Preporučujem ovu firmu svima koji traže kvalitetno 3D printanje."</p>
        </div>
      </div>
      <button onclick="prevComment()">Nazad</button>
      <button onclick="nextComment()">Naprijed</button>
    </section>


    <section id="lokacija">
      <h2>Lokacija</h2>
      <p>Lokacija firme 3D Printaj nalazi se na Adresi: Ul. 108. brigade ZNG 36, 35000, Slavonski Brod</p>
      <div class="map-container">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.951631278066!2d18.0115545153168!3d45.16524937909833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475dbb10832ad62f%3A0xd76e87019c155fb6!2sUl.%20108.%20brigade%20ZNG%2036%2C%2035000%2C%20Slavonski%20Brod%2C%20Croatia!5e0!3m2!1sen!2s!4v1614151234567!5m2!1sen!2s"
          width="600"
          height="450"
          allowfullscreen=""
          loading="lazy"
        ></iframe>
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