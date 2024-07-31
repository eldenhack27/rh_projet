<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Mon Site Web</title>
</head>
<body>
    <header>
        <div class="logo">
            <!-- Espace réservé pour le logo -->
            <img src="chemin/vers/votre/logo.png" alt="Logo du site" id="logo">
        </div>
        <h1>Bienvenue sur mon site</h1>
        <nav>
            <ul>
                <li><a href="#poste">Poste</a></li>
                <li><a href="#accueil">Accueil</a></li>
                <li><a href="#a-propos">À propos</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="poste">
            <h2>Poste</h2>
            <div class="carousel-container">
                <div class="carousel">
                    <div class="card">
                        <h3>Développeur Web Frontend</h3>
                        <p>Description : Création d'interfaces utilisateur réactives et modernes.</p>
                        <p>Date de début : 01/09/2023</p>
                        <p>Date de fin : 31/12/2023</p>
                    </div>
                    <div class="card">
                        <h3>Développeur Backend</h3>
                        <p>Description : Gestion de bases de données et développement d'API RESTful.</p>
                        <p>Date de début : 15/09/2023</p>
                        <p>Date de fin : 15/03/2024</p>
                    </div>
                    <div class="card">
                        <h3>Designer UX/UI</h3>
                        <p>Description : Conception d'expériences utilisateur intuitives et esthétiques.</p>
                        <p>Date de début : 01/10/2023</p>
                        <p>Date de fin : 30/04/2024</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="accueil">
            <h2>Accueil</h2>
            <p>Bienvenue sur mon site web. Découvrez mes services et mon travail.</p>
        </section>
        <section id="a-propos">
            <h2>À propos</h2>
            <p>Je suis un développeur web passionné par la création de sites web innovants et fonctionnels.</p>
        </section>
        <section id="services">
            <h2>Mes services</h2>
            <ul>
                <li>Développement de sites web</li>
                <li>Conception responsive</li>
                <li>Optimisation SEO</li>
            </ul>
        </section>
        <section id="contact">
            <h2>Contact</h2>
            <p>N'hésitez pas à me contacter pour toute question ou projet.</p>
            <a href="mailto:contact@monsite.com">contact@monsite.com</a>
        </section>
    </main>
    <footer>
        <p>© 2023 Mon Site Web</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>