<?php
// Configuration de la base de données
include "../../config/conn.php";

try {
    // Connexion à la base de données
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données du formulaire
    $NomDuPoste = $_POST['NomDuPoste'];
    $Description = $_POST['Description'];
    $DatePublication = $_POST['DatePublication'];
    $DateExpiration = $_POST['DateExpiration'];
    $Statut = $_POST['Statut'];
    

    // Préparation de la requête SQL
    $sql = "INSERT INTO postes (NomDuPoste, Description, DatePublication, DateExpiration, Statut) 
            VALUES (:NomDuPoste, :Description, :DatePublication, :DateExpiration, :Statut)";
    
    $stmt = $pdo->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':NomDuPoste', $NomDuPoste);
    $stmt->bindParam(':Description', $Description);
    $stmt->bindParam(':DatePublication', $DatePublication);
    $stmt->bindParam(':DateExpiration', $DateExpiration);
    $stmt->bindParam(':Statut', $Statut);
     

    // Exécution de la requête
    $stmt->execute();

    header("Location: poste.php");
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
