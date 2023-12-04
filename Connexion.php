<?php
require_once 'User.php';
require_once 'Authenticator.php';

// Assurez-vous que la session est démarrée
session_start();

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Authentifier l'utilisateur
    $user = new User($id,$username, '', $password); // Notez le champ vide pour l'e-mail
    if ($user->authenticate($password)) {
        // L'authentification a réussi
        $_SESSION['username'] = $username; // Stocker les informations de l'utilisateur dans la session
        header('Location: accueil.php'); // Rediriger vers la page d'accueil
        exit();
    } else {
        // L'authentification a échoué
        // Vous pouvez rediriger vers une page d'erreur ou simplement afficher un message ici
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <form method="post" action="">
        <!-- Cette partie CSRF a été retirée -->
        
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
