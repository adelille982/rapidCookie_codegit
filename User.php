<?php
class User {
    private $username;
    private $email;
    private $password;

    public function __construct($username, $email, $password) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function authenticate($enteredPassword) {
        return password_verify($enteredPassword, $this->password);
    }

    // Utilisation de PDO pour enregistrer l'utilisateur dans la base de données
    public function registerUser() {
        $dsn = "mysql:host=localhost;dbname=rapidcookie";
        $username = "root";
        $password = "";

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("INSERT INTO user (username, email, password_hash) VALUES (?, ?, ?)");
            $stmt->bindParam(1, $this->username);
            $stmt->bindParam(2, $this->email);
            $stmt->bindParam(3, $passwordHash);
            $stmt->execute();

            $pdo = null; // Fermer la connexion
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }
}
?>
