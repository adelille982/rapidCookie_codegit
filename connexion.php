<?php
include_once 'header.php'
?>

<?php

class Database {

    public static function getPdo(){
        // Inclure le fichier de configuration
        include_once('config.php');

        try {
            $pdo = new PDO(DB_DSN, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    // Méthode pour exécuter une requête et récupérer un seul résultat
    public static function queryOne($query, $params) {
        $pdo = self::getPdo();

        try {
            $stmt = $pdo->prepare($query);

            // Liage des paramètres
            if ($params) {
                foreach ($params as $key => $value) {
                    $stmt->bindParam("😒key", $value);
                }
            }

            // Exécution de la requête
            $stmt->execute();

            // Récupération du résultat
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Fermeture du statement
            $stmt->closeCursor();

            // Renvoie le résultat en tant que tableau associatif
            return $result;
        } catch (PDOException $e) {
            die("Erreur de requête : " . $e->getMessage());
        }
    }
}
?> 

<section>
    <h1 class="title-contact">Connexion</h1>
    <div class="skills-section2">
        <div class="contact-form">
            <form action="#" method="post">
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