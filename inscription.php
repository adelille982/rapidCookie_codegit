<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once 'header.php';
require_once 'Database.php';
require_once 'User.php';
require_once 'Address.php';
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Création de l'instance de la base de données
    $db = new Database();

    // Création et enregistrement de l'utilisateur
    $user = new User($firstname, $lastname, $email, $password);
    $user->registerUser($db);

    // Récupération de l'ID de l'utilisateur nouvellement enregistré
    $userId = $user->getId();

     //Assurez-vous d'ajuster ces valeurs en fonction du formulaire d'inscription
    $address_line1 = $_POST['address_line1'];
    $address_line2 = $_POST['address_line2'];
    $city = $_POST['city'];
    $postal_code = $_POST['postal_code'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];

    // Créez une instance de Address et enregistrez l'adresse de l'utilisateur
    $address = new Address($userId, $address_line1, $address_line2, $city, $postal_code, $country, $phone);
    $address->saveAddress(new Database());

    $_SESSION['inscription_message'] = "Inscription réaliser avec succès !"; // Message pour les films
    header('Location: inscription.php');
    exit();
}
?>

<section>
    <h1 class="title-contact">Inscription</h1>
    <div class="skills-section2">
        <div class="contact-form">
            <form action="#" method="post">
                <div class="form-group">
                    <input type="text" name="firstname" id="firstname" placeholder="Nom" required>
                </div>
                <div class="form-group">
                    <input type="text" name="lastname" id="lastname" placeholder="Prénom" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" placeholder="Votre Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe" required>
                </div>
                <div class="form-group">
                    <input type="text" name="address_line1" id="address_line1" placeholder="Adresse (ligne 1)" required>
                </div>
                <div class="form-group">
                    <input type="text" name="address_line2" id="address_line2" placeholder="Adresse (ligne 2)">
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
                <?php
                    if (isset($_SESSION['inscription_message'])) {
                        echo "<div style='text-align: center; font-size: 40px'><p style='color: black;'>" . $_SESSION['inscription_message'] . "</p></div>";
                        unset($_SESSION['inscription_message']);
                    }
                ?>
            </form>
        </div>
    </div>
</section>

<?php
include_once 'footer.php'
?>