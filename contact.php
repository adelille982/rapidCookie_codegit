<?php
include_once "header.php"
?>

<section>
    <h1 class="title-contact">Contact</h1>
    <div class="skills-section2">
        <div class="contact-form">
            <form action="#" method="post">
                <div class="form-group">
                    <input type="text" name="name" id="name" placeholder="Nom et Prénom" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" placeholder="Votre Email" required>
                </div>
                <div class="form-group">
                    <textarea name="message" id="message" placeholder="Votre Message" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Envoyer Votre Message">
                </div>
            </form>
        </div>
    </div>
</section>

<?php
include_once "footer.php"
?>