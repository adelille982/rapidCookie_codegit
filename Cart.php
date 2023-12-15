<?php
include_once 'header.php'
?>

<?php
//class Cart {
//  private $id;
// private $userId;
//    private $createdAt;
//    private $updatedAt;

//    public function __construct($userId, $createdAt, $updatedAt) {
//        $this->userId = $userId;
//        $this->createdAt = $createdAt;
//        $this->updatedAt = $updatedAt;
//    }

    // Méthode pour enregistrer le panier dans la base de données
//    public function saveCart() {
//        $dsn = "mysql:host=localhost;dbname=rapidcookie";
//        $username = "root";
//        $password = "";

//        try {
//            $pdo = new PDO($dsn, $username, $password);
//            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//            $stmt = $pdo->prepare("INSERT INTO cart (user_id, created_at, updated_at) VALUES (?, ?, ?)");
//            $stmt->bindParam(1, $this->userId);
//            $stmt->bindParam(2, $this->createdAt);
//            $stmt->bindParam(3, $this->updatedAt);
//            $stmt->execute();

//            $this->id = $pdo->lastInsertId(); // Récupérer l'ID de la dernière insertion

//            $pdo = null; // Fermer la connexion
//        } catch (PDOException $e) {
//            echo "Erreur: " . $e->getMessage();
//        }
//    }

    // Méthode pour récupérer l'ID du panier
//    public function getId() {
//        return $this->id;
//    }

    // Autres méthodes et getters si nécessaire
//}
?> 

<section class="cart-items">
    <h1 class="title-panier">Articles dans votre Panier</h1>
    <table>
        <thead>
            <tr>
                <th>Article</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Les articles du panier seront ajoutés ici -->
        </tbody>
    </table>
</section>

<section class="order-history">
    <h2 class="title-panier">Historique des Commandes</h2>
    <ul>
        <!-- L'historique des commandes sera ajouté ici -->
    </ul>
</section>

<?php
include_once 'footer.php'
?>