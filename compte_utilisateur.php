<?php
include_once 'header.php'
?>

<section class="user-info">
    <h1 class="title-utilisateur">Informations du Compte</h1>
    <p>Nom : <span id="user-firstname"></span></p>
    <p>Prénom : <span id="user-lastname"></span></p>
    <p>Email : <span id="user-email"></span></p>
    <p>Adresse : <span id="user-address"></span></p>
    <p>Téléphone : <span id="user-tel"></span></p>
</section>

<section>
    <div class="skills-section2">
        <div class="contact-form">
            <h2 class="title-utilisateur">Modifications</h2>
            <form action="#" method="post">
                <div class="form-group">
                    <input type="text" name="name" id="firstname" placeholder="Nom" required>
                    <input type="submit" value="Mettre à jour">
                    <input type="submit" value="Supprimer">
                </div>
                <div class="form-group">
                    <input type="text" name="name" id="lastname" placeholder="Prénom" required>
                    <input type="submit" value="Mettre à jour">
                    <input type="submit" value="Supprimer">
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" placeholder="Votre Email" required>
                    <input type="submit" value="Mettre à jour">
                    <input type="submit" value="Supprimer">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe" required>
                    <input type="submit" value="Mettre à jour">
                    <input type="submit" value="Supprimer">
                </div>
                <div class="form-group">
                    <input type="text" name="address1" id="address1" placeholder="Adresse (ligne 1)" required>
                    <input type="submit" value="Mettre à jour">
                    <input type="submit" value="Supprimer">
                </div>
                <div class="form-group">
                    <input type="text" name="address2" id="address2" placeholder="Adresse (ligne 2)" required>
                    <input type="submit" value="Mettre à jour">
                    <input type="submit" value="Supprimer">
                </div>
                <div class="form-group">
                    <input type="text" name="city" id="city" placeholder="Ville" required>
                    <input type="submit" value="Mettre à jour">
                    <input type="submit" value="Supprimer">
                </div>
                <div class="form-group">
                    <input type="number" name="postal_code" id="postal_code" placeholder="Code Postal" required>
                    <input type="submit" value="Mettre à jour">
                    <input type="submit" value="Supprimer">
                </div>
                <div class="form-group">
                    <input type="text" name="country" id="country" placeholder="Pays" required>
                    <input type="submit" value="Mettre à jour">
                    <input type="submit" value="Supprimer">
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" id="phone" placeholder="Téléphone" required>
                    <input type="submit" value="Mettre à jour">
                    <input type="submit" value="Supprimer">
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