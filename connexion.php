<?php
require_once 'Database.php';
require_once 'User.php';

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = User::authenticateUser($email, $password);

    if ($user) {
        // Démarrer la session et définir les variables de session
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['email'] = $user->getEmail();

        header('Location: compte_utilisateur.php');
        exit();
    } else {
        $login_error = "Identifiant ou mot de passe incorrect";
    }
}
include_once 'header.php';
?>
<section>
    <h1 class="title-contact">Connexion</h1>
    <div class="skills-section2">
        <div class="contact-form">
            <form action="connexion.php" method="post">
                <div class="form-group">
                    <input type="email" name="email" id="email" placeholder="Votre Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Connexion">
                </div>
            </form>
        </div>
    </div>
</section>

<?php
include_once 'footer.php'
?>