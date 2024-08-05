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
                    <?php
                    // Remplacez ces variables par les vôtres
                    include "../../config/conn.php";
                    try {
                        $pdo = new PDO($dsn, $username, $password);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "SELECT * FROM postes";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        $index = 0;
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
                        <div class="card" data-index="<?php echo $index; ?>">
                            <h3><?php echo htmlspecialchars($row['NomDuPoste']); ?></h3>
                            <p>Description : <?php echo htmlspecialchars($row['Description']); ?></p>
                            <p>Date de début : <?php echo htmlspecialchars($row['DatePublication']); ?></p>
                            <p>Date de fin : <?php echo htmlspecialchars($row['DateExpiration']); ?></p>
                            <p>Statut : <?php echo htmlspecialchars($row['Statut']); ?></p>
                            <button id="openModalBtn" class="postuler-btn" data-poste-id="<?php echo htmlspecialchars($row['PosteID']); ?>">Postuler</button>
                        </div>
                        <?php 
                        $index++;
                        }
                    } catch (PDOException $e) {
                        echo 'Erreur : ' . $e->getMessage();
                    }
                    ?>
                </div>
                <div class="carousel-indicators">
                    <?php
                    for ($i = 0; $i < $index; $i++) {
                        echo "<button class='indicator' data-index='$i'></button>";
                    }
                    ?>
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


    <div id="formModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Formulaire</h2>
            <form id="myForm" method="post" action="create.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="NomDuPoste">NomDuPoste :</label>
                    <input type="text" id="NomDuPoste" name="NomDuPoste" required>
                </div>
                <div class="form-group">
                    <label for="Description">Description :</label>
                    <textarea id="Description" name="Description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="DatePublication">DatePublication :</label>
                    <input type="date" id="DatePublication" name="DatePublication" required>
                </div>
                <div class="form-group">
                    <label for="DateExpiration">DateExpiration :</label>
                    <input type="date" id="DateExpiration" name="DateExpiration" required>
                </div>
                <div class="form-group">
                    <label for="Statut">Statut :</label>
                    <input type="tel" id="Statut" name="Statut" required>
                </div>
                <button type="submit" class="btn">Envoyer</button>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>