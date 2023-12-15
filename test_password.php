<?php
require_once 'Database.php';
// Remplacez ces valeurs par un email et un mot de passe réels de votre base de données.
$email = 'a.delille982@gmail.com';
$passwordTest = '123'; // Le mot de passe en clair pour le test.

// Création d'une nouvelle instance de Database et récupération de PDO.
$db = new Database();
$pdo = $db->getPdo();

// Récupération du hash de mot de passe pour l'utilisateur spécifique.
$stmt = $pdo->prepare("SELECT password_hash FROM user WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($passwordTest, $user['password_hash'])) {
    echo "Le mot de passe est correct.";
} else {
    echo "Le mot de passe est incorrect.";
}
?>
