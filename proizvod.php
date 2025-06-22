<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Proizvodi</title>
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
        <h1>Naši Proizvodi</h1>
        <p>
          Dobrodošli u našu kolekciju visokokvalitetnih 3D printanih proizvoda. 
          Naša ponuda obuhvaća širok spektar proizvoda koji su pažljivo dizajnirani i izrađeni kako bi zadovoljili vaše potrebe i očekivanja. 
          Bilo da tražite funkcionalne predmete za svakodnevnu upotrebu, dekorativne elemente za vaš dom ili personalizirane poklone za vaše najmilije, kod nas ćete pronaći sve što vam treba.
        </p>
      </div>
      <div class="column-right">
        <div class="video-obrub">
            <iframe src="https://www.youtube.com/embed/m_QhY1aABsE?autoplay=1&mute=1&loop=1&playlist=m_QhY1aABsE&controls=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </section>

  <section id="proizvodi" class="proizvod-pozadina">
    <h2 class="proizvod-naslov">Proizvodi za kućnu upotrebu</h2>
    <div class="proizvod-grupa">
      <div class="proizvod" onclick="iskocniProzor('proizvod1')">
        <img src="slike/proizvod1.png" alt="Proizvod 1">
        <p>Ladica za ured</p>
      </div>
      <div class="proizvod" onclick="iskocniProzor('proizvod2')">
        <img src="slike/proizvod2.png" alt="Proizvod 2">
        <p>Držač slušalica</p>
      </div>
      <div class="proizvod" onclick="iskocniProzor('proizvod3')">
        <img src="slike/proizvod3.png" alt="Proizvod 3">
        <p>Posudica za olovke</p>
      </div>
      <div class="proizvod" onclick="iskocniProzor('proizvod4')">
        <img src="slike/proizvod4.png" alt="Proizvod 4">
        <p>Kutija za slatkiše</p>
      </div>
      <div class="proizvod" onclick="iskocniProzor('proizvod5')">
        <img src="slike/proizvod5.png" alt="Proizvod 5">
        <p>Držač telefona</p>
      </div>
      <div class="proizvod" onclick="iskocniProzor('proizvod6')">
        <img src="slike/proizvod6.png" alt="Proizvod 6">
        <p>Posudica za ključeve</p>
      </div>
    </div>
  </section>

  <!-- Modalni prozor -->
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <div class="proizvod-info">
        <table>
          <tr>
            <th>Visina</th>
            <td id="visina"></td>
          </tr>
          <tr>
            <th>Širina</th>
            <td id="sirina"></td>
          </tr>
          <tr>
            <th>Dužina</th>
            <td id="duzina"></td>
          </tr>
          <tr>
            <th>Težina</th>
            <td id="tezina"></td>
          </tr>
          <tr>
            <th>Vrsta materijala</th>
            <td id="materijal"></td>
          </tr>
        </table>
        <div class="proizvod-cijena" id="cijena"></div>
      </div>
    </div>
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