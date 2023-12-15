<?php
// Démarre la session seulement si elle n'est pas déjà active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Vérifie si l'utilisateur est connecté, sinon redirige vers la page de connexion
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}
// Maintenant, vous pouvez utiliser $_SESSION['email'] pour obtenir l'email de l'utilisateur connecté
$email = $_SESSION['email'];

