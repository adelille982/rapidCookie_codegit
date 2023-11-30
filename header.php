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
  <nav class="navbar">
    <a href="index.php" class="navbar-brand">
      <img class="logo" src="./rapidCookieImages/Rapidcookielogotransparent.png" alt="RAPIDCOOKIE">
    </a>

    <div class="nav-left">
      <!-- Éléments à gauche -->
      <ul>
        <li id="cookie"><a href="nos_cookies.php">Nos cookies</a></li>
        <li id = commander><a href="commander.php">Commander</a></li>
      </ul>
      <form class="search-form">
        <input type="text" placeholder="Rechercher">
        <button type="submit">Rechercher</button>
      </form>
    </div>

    <div class="nav-right">
      <!-- Éléments à droite -->
      <div class="user-menu">
        <a><i class="bi bi-person-circle"></i></a>
        <div class="dropdown-menu">
          <a href="connexion.php"><strong>CONNEXION</strong></a>
          <a href="inscription.php"><strong>INSCRIPTION</strong></a>
          <a href="compte_utilisateur.php"><strong>MON COMPTE</strong></a>
        </div>
      </div>
      <a href="panier.php"><i class="bi bi-cart3"></i></a>
    </div>
      <i class="bi bi-list hamburger-icon" alt="menu-hamburger"></i>
  </nav>
  <script>
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
    });
  </script>
</body>

</html>