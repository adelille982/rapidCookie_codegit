<?php
include_once 'header.php'
?>

<header>
    <section class="header-content">
        <div class="header-carousel">
            <img src="./rapidCookieImages/rapidcookieimageheader7.png" alt="Image 1" class="carousel-image">
            <img src="./rapidCookieImages/rapidcookieimageheader6.png" alt="Image 2" class="carousel-image">
            <img src="./rapidCookieImages/rapidcookieimageheader8.png" alt="Image 3" class="carousel-image">
            <img src="./rapidCookieImages/rapidcookieimageheader5.png" alt="Image 4" class="carousel-image">
            <img src="./rapidCookieImages/rapidcookieimageheader9.png" alt="Image 5" class="carousel-image">
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                let currentImageIndex = 0;
                const images = document.querySelectorAll('.carousel-image');
                const totalImages = images.length;

                images[currentImageIndex].style.opacity = 1; // Affiche la première image

                setInterval(() => {
                    images[currentImageIndex].style.opacity = 0; // Cache l'image actuelle
                    currentImageIndex = (currentImageIndex + 1) % totalImages; // Passe à l'image suivante
                    images[currentImageIndex].style.opacity = 1; // Affiche la nouvelle image
                }, 3000); // Change d'image toutes les 3 secondes
            });
        </script>
        </div>
        <div class="header-slogan">
            <br>
            <h1>Cookies haut de gamme, moelleux et fondants.<br>
                Entièrement réalisés à la main avec des ingrédients d'excellence et locaux.<br>
                Expédition soignée et livraison de vos cookies dans la France entière.</h1><br><br>
            <a href="commande.html" class="order-button">Commander vos cookies favoris dès maintenant !</a>
        </div>
    </section>
</header>

<?php
include_once 'footer.php'
?>