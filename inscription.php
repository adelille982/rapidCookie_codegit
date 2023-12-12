<?php
include_once 'header.php';
require_once 'User.php';
require_once 'Address.php';
require_once 'Database.php';
$dsn = "mysql:host=localhost;dbname=rapidcookie";
?>

<?php

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

<section>
    <h1 class="title-contact">Inscription</h1>
    <div class="skills-section2">
        <div class="contact-form">
            <form action="#" method="post">
                <div class="form-group">
                    <input type="text" name="name" id="firstname" placeholder="Nom" required>
                </div>
                <div class="form-group">
                    <input type="text" name="name" id="lastname" placeholder="Prénom" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" placeholder="Votre Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe" required>
                </div>
                <div class="form-group">
                    <input type="text" name="address1" id="address1" placeholder="Adresse (ligne 1)" required>
                </div>
                <div class="form-group">
                    <input type="text" name="address2" id="address2" placeholder="Adresse (ligne 2)" required>
                </div>
                <div class="form-group">
                    <input type="text" name="city" id="city" placeholder="Ville" required>
                </div>
                <div class="form-group">
                    <input type="number" name="postal_code" id="postal_code" placeholder="Code Postal" required>
                </div>
                <div class="form-group">
                    <input type="text" name="country" id="country" placeholder="Pays" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" id="phone" placeholder="Téléphone" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Inscription">
                </div>
            </form>
        </div>
    </div>
</section>

<?php
include_once 'footer.php'
?>