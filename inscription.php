<?php
include_once 'header.php'
?>

<section>
    <h1 class="title-contact">Inscription</h1>
    <div class="skills-section2">
        <div class="contact-form">
            <form action="#" method="post">
                <div class="form-group">
                    <input type="text" name="name" id="firstname" placeholder="Nom" required>
                </div>
                <div class="form-group">
                    <input type="text" name="name" id="lastname" placeholder="Prénom" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" placeholder="Votre Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe" required>
                </div>
                <div class="form-group">
                    <input type="text" name="address1" id="address1" placeholder="Adresse (ligne 1)" required>
                </div>
                <div class="form-group">
                <input type="text" name="address2" id="address2" placeholder="Adresse (ligne 2)" required>
                </div>
                <div class="form-group">
                    <input type="text" name="city" id="city" placeholder="Ville" required>
                </div>
                <div class="form-group">
                    <input type="number" name="postal_code" id="postal_code" placeholder="Code Postal" required>
                </div>
                <div class="form-group">
                    <input type="text" name="country" id="country" placeholder="Pays" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" id="phone" placeholder="Téléphone" required>
                </div>
                <div class="form-group">
                <input type="submit" value="Inscription">
                </div>
            </form>
        </div>
    </div>
</section>

<?php
include_once 'footer.php'
?>