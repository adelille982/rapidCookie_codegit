<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'Database.php';
require_once 'User.php';
require_once 'Address.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Ephesis&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" type="image/png" href="./rapidCookieImages/Rapidcookielogotransparenticone.ico" />
  <title>RapidCookie</title>
</head>

<body>
  <nav class="navbar">
    <a href="index.php" class="navbar-brand">
      <img class="logo" src="./rapidCookieImages/Rapidcookielogotransparent.png" alt="RAPIDCOOKIE">
    </a>
    <div class="nav-left" id="menu-left">
      <!-- Éléments à gauche -->
      <ul>
        <li id="cookie"><a href="noscookies.php">Nos cookies</a></li>
        <li id=commander><a href="contact.php">Contact</a></li>
      </ul>
      <form class="search-form">
        <input type="text" placeholder="Rechercher">
        <button type="submit">Rechercher</button>
      </form>
    </div>

    <div class="nav-right" id="menu-right">
      <!-- Éléments à droite -->
      <div class="user-menu">
        <a><i class="bi bi-person-circle icon-shift-right"></i></a>
        <div class="dropdown-menu">
          <a href="connexion.php"><strong>CONNEXION</strong></a>
          <a href="inscription.php"><strong>INSCRIPTION</strong></a>
          <a href="compte_utilisateur.php"><strong>MON COMPTE</strong></a>
          <?php if (isset($_SESSION['user_id'])) : ?>
        <strong><p class="loginco"><?php echo htmlspecialchars($_SESSION['email']); ?></p></strong>
        <a class="logindec" href="logout.php">Déconnexion</a>
      <?php endif; ?>
        </div>
      </div>
      <a href="Cart.php"><i class="bi bi-cart3"></i></a>
    </div>
    <i class="bi bi-list hamburger-icon" alt="menu-hamburger"></i>
  </nav>
  <script>
    let isNavDisplayed = true;

    document.addEventListener('DOMContentLoaded', () => {
      const userMenu = document.querySelector('.user-menu');
      userMenu.addEventListener('click', (event) => {
        event.stopPropagation();
        let dropdown = userMenu.querySelector('.dropdown-menu');
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
      });

      document.addEventListener('click', () => {
        let dropdown = document.querySelector('.dropdown-menu');
        if (dropdown) {
          dropdown.style.display = 'none';
        }
      });

      const hamburgerBtn = document.querySelector('.hamburger-icon');
      hamburgerBtn.addEventListener('click', () => {
        const navLeft = document.querySelector('.nav-left');
        const navRight = document.querySelector('.nav-right');

        if (isNavDisplayed) {
          navLeft.classList.add('hidden');
          navRight.classList.add('hidden');
        } else {
          navLeft.classList.remove('hidden');
          navRight.classList.remove('hidden');
        }

        isNavDisplayed = !isNavDisplayed;
      });
    });
  </script>