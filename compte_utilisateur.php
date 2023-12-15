<?php
include_once 'header.php';
require_once 'Database.php';
require_once 'User.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}

$db = new Database();
$userId = $_SESSION['user_id'];

$user = User::getUserById($db, $userId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user->updateUser($db);
}

$addressData = Address::getUserAddresses($db, $userId)[0];

$fullAddress = $addressData['address_line1'] . ", ";
if (!empty($addressData['address_line2'])) {
    $fullAddress .= $addressData['address_line2'] . ", ";
}
$fullAddress .= $addressData['city'] . ", " . $addressData['postal_code'] . ", " . $addressData['country'];
$phoneNumber = $addressData['phone'];

?>

<section class="user-info">
    <h1 class="title-utilisateur">Informations du Compte</h1>
    <strong>
        <p>Nom :
    </strong><span id="firstname"><?php echo htmlspecialchars($user->getFirstname()); ?></span></p>
    <strong>
        <p>Prénom :
    </strong><span id="lastname"><?php echo htmlspecialchars($user->getLastname()); ?></span></p>
    <strong>
        <p>Email :
    </strong><span id="email"><?php echo htmlspecialchars($user->getEmail()); ?></span></p>
    <p><strong>Adresse : </strong><span><?php echo htmlspecialchars($fullAddress); ?></span></p>
    <p><strong>Téléphone : </strong><span><?php echo htmlspecialchars($phoneNumber); ?></span></p>
</section>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['updateUserInfo'])) {
        // Mise à jour des informations de l'utilisateur
        if (!empty($_POST['firstname'])) {
            $user->setFirstname($_POST['firstname']);
        }
        if (!empty($_POST['lastname'])) {
            $user->setLastname($_POST['lastname']);
        }
        if (!empty($_POST['email'])) {
            $user->setEmail($_POST['email']);
        }
        if (!empty($_POST['password'])) {
            // Hash du mot de passe
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->setPassword($hashedPassword);
        }
        $user->updateUser($db);
    } elseif (isset($_POST['updateAddressInfo'])) {
        // Mise à jour des informations d'adresse
        if (!empty($_POST['address1']) || !empty($_POST['address2']) || !empty($_POST['city']) || !empty($_POST['postal_code']) || !empty($_POST['country']) || !empty($_POST['phone'])) {
            $address = new Address($userId, $_POST['address1'], $_POST['address2'], $_POST['city'], $_POST['postal_code'], $_POST['country'], $_POST['phone']);
            $address->updateAddress($db);
        }
    }

    // Redirection pour afficher les modifications
    header('Location: compte_utilisateur.php');
    exit();
}
?>

<section>
    <div class="skills-section2">
        <div class="contact-form">
            <h2 class="title-utilisateur">Modifications</h2>
            <form action="compte_utilisateur.php" method="post">
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
                    <input type="hidden" name="updateUserInfo" value="1">
                    <input type="submit" value="Mettre à jour">
                </div>
            </form>
        </div>
    </div>
</section>

<br>

<section>
    <div class="skills-section2">
        <div class="contact-form">
            <h2 class="title-utilisateur">Modifications</h2>
            <form action="compte_utilisateur.php" method="post">
                <div class="form-group">
                    <input type="text" name="address1" id="address1" placeholder="Adresse (ligne 1)" required>
                </div>
                <div class="form-group">
                    <input type="text" name="address2" id="address2" placeholder="Adresse (ligne 2)">
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
                    <input type="hidden" name="updateAddressInfo" value="1">
                    <input type="submit" value="Mettre à jour">
                </div>
            </form>
        </div>
    </div>
</section>

<section class="order-history">
    <h2>Historique des Commandes</h2>
    <ul id="order-list">

    </ul>
</section>

<?php
include_once 'footer.php'
?>