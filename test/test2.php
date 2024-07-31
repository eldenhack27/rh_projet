<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Dashboard Exemple</title>
</head>
<body>
    <div class="page-container">
        <div class="content-wrap">
            <div class="sidebar">
                <div class="user-info">
                    <img src="../asset/user/logo.png" alt="Logo" class="logo">
                    <span class="user-name">jin</span>
                    <button class="logout-btn">logout</button>
                </div>
                <button class="menu-toggle">Menu</button>
                <div class="menu-content">
                    <h2>Menu</h2>
                    <ul>
                        <li><a href="#">Tableau de bord</a></li>
                        <li><a href="#">Rapports</a></li>
                        <li><a href="#">Paramètres</a></li>
                    </ul>
                </div>
            </div>


            <div class="content">
                <h1>Bienvenue dans votre tableau de bord</h1>
                <button id="openModalBtn" class="btn">Ouvrir le formulaire</button>
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
                            <th>Colonne 1</th>
                            <th>Colonne 2</th>
                            <th>Colonne 3</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Donnée 1</td>
                            <td>Donnée 2</td>
                            <td>Donnée 3</td>
                        </tr>
                        <tr>
                            <td>Donnée 4</td>
                            <td>Donnée 5</td>
                            <td>Donnée 6</td>
                        </tr>
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
            <form id="myForm">
                <div class="form-group">
                    <label for="name">Nom :</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message :</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button type="submit" class="btn">Envoyer</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>