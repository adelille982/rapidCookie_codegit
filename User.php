<?php
class User {
    private ?int $id = null;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password;

    // Constructeur
    public function __construct($firstname, $lastname, $email, $password) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
    }

    // Méthodes d'accès
    public function getId(): ?int {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    

    public function getFirstname(): string {
        return $this->firstname;
    }

    public function getLastname(): string {
        return $this->lastname;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    /* fin des accès */

    public static function authenticateUser($identifiant, $enteredPassword) {
        $pdo = (new Database())->getPdo();
    
        $query = $pdo->prepare("SELECT * FROM user WHERE email = :email");
        $query->bindParam(":email", $identifiant);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
    
        if ($user && password_verify($enteredPassword, $user['password_hash'])) {
            // Créez l'objet User avec toutes les données, y compris l'ID.
            $userObj = new User($user['firstname'], $user['lastname'], $user['email'], $user['password_hash']);
            $userObj->setId($user['id']); // Assurez-vous que cette méthode existe et fonctionne correctement.
            return $userObj;
        }
    
        return null;
    }


    /* Hash du mdp*/
    public function authenticate($enteredPassword)
    {
        return password_verify($enteredPassword, $this->password);
    }

    /* enregistrement de l'inscription dans la base de donnée */
    public function registerUser(Database $db) {
        $pdo = $db->getPdo();

        $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO user (firstname, lastname, email, password_hash) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $this->firstname);
        $stmt->bindParam(2, $this->lastname);
        $stmt->bindParam(3, $this->email);
        $stmt->bindParam(4, $passwordHash);
        $stmt->execute();

        $this->id = $pdo->lastInsertId();
    }

    public function updateUser(Database $db) {
        $pdo = $db->getPdo();
        $dsn = "mysql:host=localhost;dbname=rapidcookie";
        $username = "root";
        $password = "";

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("UPDATE user SET firstname = ?, lastname = ?, email = ?, password = ? WHERE id = ?");
            $stmt->bindParam(1, $this->firstname);
            $stmt->bindParam(2, $this->lastname);
            $stmt->bindParam(3, $this->email);
            $stmt->bindParam(4, $this->password);
            $stmt->bindParam(5, $this->id);
            $stmt->execute();

            $pdo = null; // Fermer la connexion
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }

    public function deleteUser(Database $db) {
        $pdo = $db->getPdo();
        $dsn = "mysql:host=localhost;dbname=rapidcookie";
        $username = "root";
        $password = "";

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("DELETE FROM user WHERE id = ?");
            $stmt->bindParam(1, $this->id);
            $stmt->execute();

            $pdo = null; // Fermer la connexion
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }
}
