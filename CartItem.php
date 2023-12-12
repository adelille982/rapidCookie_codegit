<?php
class CartItem {
    private $id;
    private $cartId;
    private $cookieTypeId;
    private $quantity;

    public function __construct($cartId, $cookieTypeId, $quantity) {
        $this->cartId = $cartId;
        $this->cookieTypeId = $cookieTypeId;
        $this->quantity = $quantity;
    }

    // Méthode pour enregistrer l'article du panier dans la base de données
    public function saveCartItem() {
        $dsn = "mysql:host=localhost;dbname=rapidcookie";
        $username = "root";
        $password = "";

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("INSERT INTO cart_item (cart_id, cookie_type_id, quantity) VALUES (?, ?, ?)");
            $stmt->bindParam(1, $this->cartId);
            $stmt->bindParam(2, $this->cookieTypeId);
            $stmt->bindParam(3, $this->quantity);
            $stmt->execute();

            $this->id = $pdo->lastInsertId(); // Récupérer l'ID de la dernière insertion

            $pdo = null; // Fermer la connexion
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }

    // Autres méthodes et getters si nécessaire
}
?> 