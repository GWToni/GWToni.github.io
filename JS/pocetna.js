let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("slajder-proizvodi");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  slides[slideIndex-1].style.display = "block";  
  setTimeout(showSlides, 3000); // Mjenjaj sliku svake 3 sekunde
}

/*Za hamburger opciju*/
function toggleMenu() {
  const navItems = document.querySelector('.nav-items');
  const heroContainer = document.querySelector('.hero-container');
  navItems.classList.toggle('active');
  heroContainer.classList.toggle('active');
}

/*Za ljespse skrolovanje*/
function scrollToSection(sectionId) {
  document.querySelector(sectionId).scrollIntoView({
    behavior: 'smooth'
  });
}

/*Za navigaciju*/
function toggleMenu() {
  const navItems = document.querySelector('.nav-items');
  const heroContainer = document.querySelector('.hero-container');
  navItems.classList.toggle('active');
  heroContainer.classList.toggle('active');
}

/*komentiranje*/
let currentComment = 1;
const totalComments = 4;

function showComment(index) {
  for (let i = 1; i <= totalComments; i++) {
    document.getElementById(`komentar${i}`).style.display = 'none';
  }
  document.getElementById(`komentar${index}`).style.display = 'block';
}

function prevComment() {
  currentComment = currentComment === 1 ? totalComments : currentComment - 1;
  showComment(currentComment);
}

function nextComment() {
  currentComment = currentComment === totalComments ? 1 : currentComment + 1;
  showComment(currentComment);
}

// Initial display
showComment(currentComment);

/* Iskocni prozor za proizvod */
function iskocniProzor(proizvod) {
  var modal = document.getElementById("myModal");
  var visina = document.getElementById("visina");
  var sirina = document.getElementById("sirina");
  var duzina = document.getElementById("duzina");
  var tezina = document.getElementById("tezina");
  var materijal = document.getElementById("materijal");
  var cijena = document.getElementById("cijena");

  if (proizvod === 'proizvod1') {
    visina.innerText = "10 cm";
    sirina.innerText = "15 cm";
    duzina.innerText = "20 cm";
    tezina.innerText = "200 g";
    materijal.innerText = "PLA plastika";
    cijena.innerText = "Cijena: 50€/100BAM";
  } else if (proizvod === 'proizvod2') {
    visina.innerText = "12 cm";
    sirina.innerText = "10 cm";
    duzina.innerText = "18 cm";
    tezina.innerText = "150 g";
    materijal.innerText = "ABS plastika";
    cijena.innerText = "Cijena: 30€/60BAM";
  } else if (proizvod === 'proizvod3') {
    visina.innerText = "8 cm";
    sirina.innerText = "8 cm";
    duzina.innerText = "12 cm";
    tezina.innerText = "100 g";
    materijal.innerText = "PETG plastika";
    cijena.innerText = "Cijena: 10€/20BAM";
  } else if (proizvod === 'proizvod4') {
    visina.innerText = "15 cm";
    sirina.innerText = "15 cm";
    duzina.innerText = "15 cm";
    tezina.innerText = "250 g";
    materijal.innerText = "PLA plastika";
    cijena.innerText = "Cijena: 100€/200BAM";
  } else if (proizvod === 'proizvod5') {
    visina.innerText = "10 cm";
    sirina.innerText = "10 cm";
    duzina.innerText = "10 cm";
    tezina.innerText = "120 g";
    materijal.innerText = "ABS plastika";
    cijena.innerText = "Cijena: 15€/30BAM";
  } else if (proizvod === 'proizvod6') {
    visina.innerText = "5 cm";
    sirina.innerText = "5 cm";
    duzina.innerText = "5 cm";
    tezina.innerText = "50 g";
    materijal.innerText = "PLA plastika";
    cijena.innerText = "Cijena: 5€/10BAM";
  }

  modal.style.display = "block";
}

function closeModal() {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
}

window.onclick = function(event) {
  var modal = document.getElementById("myModal");
  if (event.target == modal) {
    modal.style.display = "none";
  }
}