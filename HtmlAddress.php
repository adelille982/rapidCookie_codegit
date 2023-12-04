<?php
include_once('Database.php'); // Inclure votre classe Database
include_once('Address.php'); // Inclure la classe Address

// Assumez que vous avez déjà un utilisateur connecté avec un ID associé
$user_id = 1; // Remplacez par l'ID de l'utilisateur connecté

// Créer une instance de la classe Database
$dsn = "mysql:host=localhost;dbname=rapidcookie";
$username = "root";
$password = "";
$database = new Database($dsn, $username, $password);

// Récupérer les adresses de l'utilisateur
$addresses = Address::getUserAddresses($database, $user_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Adresses</title>
</head>
<body>
    <h2>Liste des Adresses</h2>

    <table border="1">
        <thead>
            <tr>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Code Postal</th>
                <th>Pays</th>
                <th>Téléphone</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($addresses as $address) : ?>
                <tr>
                    <td><?= $address['address_line1'] . ' ' . $address['address_line2'] ?></td>
                    <td><?= $address['city'] ?></td>
                    <td><?= $address['postal_code'] ?></td>
                    <td><?= $address['country'] ?></td>
                    <td><?= $address['phone'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
