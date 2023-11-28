<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.css" />
  <link href="https://fonts.googleapis.com/css2?family=Ephesis&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
  <title>RAPIDCOOKIE</title>
</head>

<body>
  <header>
    <nav class="navbar">
      <div class="navbar-left">
        <a class="navbar-brand" href="index.php">
          <img src="./rapidCookieImages/Rapidcookielogotransparent.png" alt="RAPIDCOOKIE">
        </a>
        <ul class="navbar-nav">
          <li><a href="nos_cookies.php">Nos cookies</a></li>
        </ul>
      </div>
      <div class="navbar-section center">
        <form class="search-form">
          <input type="text" placeholder="Rechercher">
          <button type="submit"><strong>Rechercher</strong></button>
        </form>
      </div>
      <div class="navbar-section right">
        <div class="nav-item dropdown">
          <a class="nav-link">
            <i class="bi bi-person-circle"></i>
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="connexion.php"><strong>CONNEXION</strong></a>
            <a class="dropdown-item" href="inscription.php"><strong>INSCRIPTION</strong></a>
            <a class="dropdown-item" href="compte_utilisateur.php"><strong>MON COMPTE</strong></a>
          </div>
        </div>
        <script>
          document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('.nav-item').forEach(item => {
              item.addEventListener('click', event => {
                let dropdown = item.querySelector('.dropdown-menu');
                dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
              });
            });
          });
        </script>
        <a href="panier.php">
          <i class="bi bi-cart3"></i>
        </a>
      </div>
      </div>
    </nav>

    <section class="header-content">
    <div class="header-carousel">
        <img src="./rapidCookieImages/rapidcookieimageheader7.png" alt="Image 1" class="carousel-image">
        <img src="./rapidCookieImages/rapidcookieimageheader6.jpg" alt="Image 2" class="carousel-image">
        <img src="./rapidCookieImages/rapidcookieimageheader8.jpg" alt="Image 3" class="carousel-image">
        <img src="./rapidCookieImages/rapidcookieimageheader5.jpg" alt="Image 4" class="carousel-image">
        <img src="./rapidCookieImages/rapidcookieimageheader9.jpg" alt="Image 5" class="carousel-image">
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        let currentImageIndex = 0;
        const images = document.querySelectorAll('.carousel-image');
        const totalImages = images.length;

        images[currentImageIndex].style.opacity = 1; // Affiche la première image

        setInterval(() => {
            images[currentImageIndex].style.opacity = 0; // Cache l'image actuelle
            currentImageIndex = (currentImageIndex + 1) % totalImages; // Passe à l'image suivante
            images[currentImageIndex].style.opacity = 1; // Affiche la nouvelle image
        }, 3000); // Change d'image toutes les 3 secondes
    });
</script>
        <div class="header-slogan">
          <br>
            <h1>Cookies haut de gamme, moelleux et fondants.<br>
            Entièrement réalisés à la main avec des ingrédients d'excellence et locaux.<br>
            Expédition soignée et livraison de vos cookies dans la France entière.</h1>
        </div>
    </section>
</header>