<?php
// Configuration de la base de données
include "../../config/conn.php";

try {
    // Connexion à la base de données
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données du formulaire
    $NomDuDépartement = $_POST['NomDuDépartement'];
    $ManagerID = $_POST['ManagerID'];
    

    // Préparation de la requête SQL
    $sql = "INSERT INTO départements (NomDuDépartement, ManagerID) 
            VALUES (:NomDuDépartement, :ManagerID)";
    
    $stmt = $pdo->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':NomDuDépartement', $NomDuDépartement);
    $stmt->bindParam(':ManagerID', $ManagerID);
   

    // Exécution de la requête
    $stmt->execute();

    header("Location: departement.php");
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
