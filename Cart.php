<?php
class Cart {
    private $id;
    private $userId;
    private $createdAt;
    private $updatedAt;

    public function __construct($userId, $createdAt, $updatedAt) {
        $this->userId = $userId;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    // Méthode pour enregistrer le panier dans la base de données
    public function saveCart() {
        $dsn = "mysql:host=localhost;dbname=rapidcookie";
        $username = "root";
        $password = "";

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("INSERT INTO cart (user_id, created_at, updated_at) VALUES (?, ?, ?)");
            $stmt->bindParam(1, $this->userId);
            $stmt->bindParam(2, $this->createdAt);
            $stmt->bindParam(3, $this->updatedAt);
            $stmt->execute();

            $this->id = $pdo->lastInsertId(); // Récupérer l'ID de la dernière insertion

            $pdo = null; // Fermer la connexion
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }

    // Méthode pour récupérer l'ID du panier
    public function getId() {
        return $this->id;
    }

    // Autres méthodes et getters si nécessaire
}
?>
