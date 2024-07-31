<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Postes</title>
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
                <h1>gestion des postes</h1>
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
                            <th>NomDuPoste</th>
                            <th>DatePublication</th>
                            <th>DateExpiration</th>
                            <th>Statut</th>
                            <th>voir</th>
                             
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../../config/conn.php";
                        try {
                            $pdo = new PDO($dsn, $username, $password);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $sql = "SELECT * FROM postes" ;
                            $stmt = $pdo->prepare($sql);
                            
                            $stmt->execute();
                            $counter = 1;
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>" . $counter++ . "</td>";
                                echo "<td>" . htmlspecialchars($row['NomDuPoste']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['DatePublication']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['DateExpiration']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['Statut']) . "</td>";
                                echo "<td><a href='profil.php?id=" . htmlspecialchars($row['PosteID']) . "'><svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12 4.5C7.5 4.5 3.737 7.252 2 12c1.737 4.748 5.5 7.5 10 7.5s8.263-2.752 10-7.5c-1.737-4.748-5.5-7.5-10-7.5zm0 13c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5zm0-8.5c-1.93 0-3.5 1.57-3.5 3.5s1.57 3.5 3.5 3.5 3.5-1.57 3.5-3.5-1.57-3.5-3.5-3.5z' fill='currentColor'/></svg></a></td>";
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