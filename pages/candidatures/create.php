<?php
// Configuration de la base de données
include "../../config/conn.php";

try {
    // Connexion à la base de données
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données du formulaire
    $CandidatID = $_POST['CandidatID'];
    $PosteID = $_POST['PosteID'];
    $DateCandidature = $_POST['DateCandidature'];
    $Statut = $_POST['Statut'];
    

    // Préparation de la requête SQL
    $sql = "INSERT INTO candidatures (CandidatID, PosteID, DateCandidature, Statut) 
            VALUES (:CandidatID, :PosteID, :DateCandidature, :Statut)";
    
    $stmt = $pdo->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':CandidatID', $CandidatID);
    $stmt->bindParam(':PosteID', $PosteID);
    $stmt->bindParam(':DateCandidature', $DateCandidature);
    $stmt->bindParam(':Statut', $Statut);
     

    // Exécution de la requête
    $stmt->execute();

    header("Location: candidature.php");
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
