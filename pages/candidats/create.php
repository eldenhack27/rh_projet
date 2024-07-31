<?php
// Configuration de la base de données
include "../../config/conn.php";

try {
    // Connexion à la base de données
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données du formulaire
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $date_naissance = $_POST['date_naissance'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['MotDePasse'], PASSWORD_DEFAULT);
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $date_inscription = $_POST['DateInscription'];

    // Gestion du fichier Profil
    $target_dir = "../../asset/candidats/";
    
    // Vérification si le dossier existe, sinon le créer
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["Profil"]["name"]);
    $profilFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Vérification du type de fichier
    $allowed_types = ['jpg', 'jpeg', 'png', 'pdf'];
    if (!in_array($profilFileType, $allowed_types)) {
        throw new Exception("Seuls les fichiers JPG, JPEG, PNG et PDF sont autorisés.");
    }

    // Vérification si le fichier existe déjà
    if (file_exists($target_file)) {
        throw new Exception("Désolé, le fichier existe déjà.");
    }

    // Déplacement du fichier téléchargé vers le dossier cible
    if (!move_uploaded_file($_FILES["Profil"]["tmp_name"], $target_file)) {
        throw new Exception("Désolé, une erreur s'est produite lors du téléchargement de votre fichier.");
    }

    // Préparation de la requête SQL
    $sql = "INSERT INTO candidats (Prénom, NomDeFamille, DateDeNaissance, Email, MotDePasse, Téléphone, Adresse, Profil, DateInscription) 
            VALUES (:prenom, :nom, :date_naissance, :email, :mot_de_passe, :telephone, :adresse, :profil, :date_inscription)";
    
    $stmt = $pdo->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':date_naissance', $date_naissance);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mot_de_passe', $mot_de_passe);
    $stmt->bindParam(':telephone', $telephone);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':profil', $target_file);
    $stmt->bindParam(':date_inscription', $date_inscription);

    // Exécution de la requête
    $stmt->execute();

    header("Location: candidat.php");
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
