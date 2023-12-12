<?php
//require_once 'Cart.php';
require_once 'CartItem.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $userId = $_POST['user_id'];
    $createdAt = date('Y-m-d H:i😒');
    $updatedAt = $createdAt;

    // Créer une instance de Cart
    $cart = new Cart($userId, $createdAt, $updatedAt);

    // Enregistrer le panier dans la base de données
    $cart->saveCart();

    // Vérifier si les données des articles du panier sont définies
    if (isset($_POST['cookie_type']) && isset($_POST['quantity'])) {
        $cookieTypes = $_POST['cookie_type'];
        $quantities = $_POST['quantity'];

        // Enregistrer chaque article du panier dans la table cart_items
        for ($i = 0; $i < count($cookieTypes); $i++) {
            $cookieTypeId = $cookieTypes[$i];
            $quantity = $quantities[$i];

            // Créer une instance de CartItem
            $cartItem = new CartItem($cart->getId(), $cookieTypeId, $quantity);

            // Enregistrer l'article du panier dans la base de données
            $cartItem->saveCartItem();
        }
    } else {
        echo "Erreur : Les données des articles du panier ne sont pas définies.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Réservation</title>
</head>
<body>
    <h2>Formulaire de Réservation</h2>
    <form method="post" action="">
        <label for="user_id">ID de l'utilisateur:</label>
        <input type="text" id="user_id" name="user_id" required><br>

        <!-- Champs pour les articles du panier -->
        <label for="cookie_type[]">Type de cookie:</label>
        <input type="text" id="cookie_type[]" name="cookie_type[]" required> <br>
        <label for="quantity[]">Quantité:</label>
        <input type="text" id="quantity[]" name="quantity[]" required><br>

        <!-- Ajoutez plus de champs si nécessaire -->

        <button type="submit">Effectuer la réservation</button>
    </form>
</body>
</html> 