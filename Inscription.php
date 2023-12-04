<?php
require_once 'User.php';
require_once 'Address.php';
require_once 'Database.php';
$dsn = "mysql:host=localhost;dbname=rapidcookie";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Créez une instance de User et enregistrez l'utilisateur dans la base de données
    $user = new User(null,$username, $email, $password);
    $user->registerUser();

    // Récupérez l'ID de l'utilisateur nouvellement enregistré
    $userId = $user->getUserId();

    // Assurez-vous d'ajuster ces valeurs en fonction du formulaire d'inscription
    $address_line1 = $_POST['address_line1'];
    $address_line2 = $_POST['address_line2'];
    $city = $_POST['city'];
    $postal_code = $_POST['postal_code'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];

    // Créez une instance de Address et enregistrez l'adresse de l'utilisateur
    $address = new Address($userId, $address_line1, $address_line2, $city, $postal_code, $country, $phone);
    $address->saveAddress(new Database($dsn, $username, $password)); // Assurez-vous de passer une instance de Database
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <form method="post" action="">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Adresse e-mail:</label>
        <input type="email" id="email" name="email" required><br>

        <!-- Ajoutez les champs nécessaires pour l'adresse -->
        <label for="address_line1">Adresse ligne 1:</label>
        <input type="text" id="address_line1" name="address_line1" required><br>
        
        <label for="address_line2">Adresse ligne 2:</label>
        <input type="text" id="address_line2" name="address_line2"><br>
        
        <label for="city">Ville:</label>
        <input type="text" id="city" name="city" required><br>
        
        <label for="postal_code">Code Postal:</label>
        <input type="text" id="postal_code" name="postal_code" required><br>
        
        <label for="country">Pays:</label>
        <input type="text" id="country" name="country" required><br>
        
        <label for="phone">Téléphone:</label>
        <input type="text" id="phone" name="phone" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>
