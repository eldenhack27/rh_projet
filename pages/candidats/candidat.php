<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Candidats</title>
</head>
<body>
    <div class="page-container">
        <div class="content-wrap">
            <!-- la partie du siberbar-->
            <?php
                include "../../config/sidebar.php"
            ?>

            <!-- la parti des stat -->
            <div class="content">
                <h1>gestion des candidats</h1>
                <button id="openModalBtn" class="btn">ajoute un candidat</button>
                <div class="cards">
                    <div class="card">Statistique 1</div>
                    <div class="card">Statistique 2</div>
                    <div class="card">Statistique 3</div>
                </div>
                
                <div class="search-container">
                    <input type="text" id="searchInput" placeholder="Rechercher...">
                    <button id="searchBtn" class="btn">Rechercher</button>
                </div>
                
                <table class="dashboard-table">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Profil</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>DateInscription</th>
                            <th>voir</th>
                             
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../../config/conn.php";
                        try {
                            $pdo = new PDO($dsn, $username, $password);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $sql = "SELECT * FROM candidats" ;
                            $stmt = $pdo->prepare($sql);
                            
                            $stmt->execute();
                            $counter = 1;
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>" . $counter++ . "</td>";
                                echo "<td><img class='avatar' src='{$row['Profil']}'></td>";
                                echo "<td>" . htmlspecialchars($row['Prénom']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['NomDeFamille']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                                echo "<td>0" . htmlspecialchars($row['Téléphone']) . " Heures</td>";
                                echo "<td>" . htmlspecialchars($row['DateInscription']) . "</td>";
                                echo "<td><a href='profil.php?id=" . htmlspecialchars($row['CandidatID']) . "'><svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12 4.5C7.5 4.5 3.737 7.252 2 12c1.737 4.748 5.5 7.5 10 7.5s8.263-2.752 10-7.5c-1.737-4.748-5.5-7.5-10-7.5zm0 13c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5zm0-8.5c-1.93 0-3.5 1.57-3.5 3.5s1.57 3.5 3.5 3.5 3.5-1.57 3.5-3.5-1.57-3.5-3.5-3.5z' fill='currentColor'/></svg></a></td>";
                                echo "</tr>";
                            }
                            echo "</table>";

                        } catch (PDOException $e) {
                            echo 'Erreur : ' . $e->getMessage();
                        }
                        ?>
                    </tbody>
                </table>

                <div class="chart-container">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        
        <footer class="footer">
            <p>&copy; 2024 Votre Entreprise. Tous droits réservés.</p>
        </footer>
    </div>

    <div id="formModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Formulaire</h2>
            <form id="myForm" method="post" action="create.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Prénom">Prénom :</label>
                    <input type="text" id="Prénom" name="prenom" required>
                </div>
                <div class="form-group">
                    <label for="NomDeFamille">Nom :</label>
                    <input type="text" id="NomDeFamille" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="DateDeNaissance">DateDeNaissance :</label>
                    <input type="date" id="DateDeNaissance" name="date_naissance" required>
                </div>
                <div class="form-group">
                    <label for="Email">Email :</label>
                    <input type="email" id="Email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="Téléphone">Téléphone :</label>
                    <input type="tel" id="Téléphone" name="telephone" required>
                </div>
                <div class="form-group">
                    <label for="Adresse">Adresse :</label>
                    <input type="text" id="Adresse" name="adresse" required>
                </div>
                <div class="form-group">
                    <label for="DateInscription">DateInscription :</label>
                    <input type="date" id="DateInscription" name="DateInscription" required>
                </div>
                <div class="form-group">
                    <label for="Profil">Profil :</label>
                    <input type="file" id="Profil" name="Profil" required>
                </div>
                <div class="form-group">
                    <label for="MotDePasse">MotDePasse :</label>
                    <input type="password" id="MotDePasse" name="MotDePasse" required>
                </div>
                <button type="submit" class="btn">Envoyer</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>