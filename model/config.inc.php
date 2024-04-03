<?php
   
   
         // Configuration de la base de données
    $serveur = "localhost";
    $nomBaseDeDonnees = "client_ligue";
    $utilisateur = "root";
    $motDePasse = "root";

     // Gérer le téléchargement de la photo
     $image = $_FILES['image'] ?? '';
     $photoName = $image['name'] ?? '';
     $photoTmpName = $image['tmp_name'] ?? '';
     $photoDestination = 'uploads/' . $photoName;

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $age = $_POST["age"];
        $ville = $_POST["ville"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $image = $_FILES["image"];
    
        // Valider les données du formulaire
        $errors = [];
    
        if (empty($nom) || empty($prenom) || empty($age) || empty($ville) || empty($email) || empty($password) || empty($image)) {
            $errors[] = "Tous les champs sont obligatoires";
        }
    
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Adresse email invalide";
        }
        
        if ($_FILES['image']["error"] == UPLOAD_ERR_OK) {
            $photoName = htmlspecialchars(basename($_FILES['image']['name']));
            
            # Vérifier l'extension et autoriser une extention
            $allowed_extensions = array("jpg", "jpeg", "png");
            $photo_extension = strtolower(pathinfo($photoName, PATHINFO_EXTENSION));
    
            if (!in_array($photo_extension, $allowed_extensions)) {
                $errors[] = "L'extension de la photo doit être jpg, jpeg, ou png.";
            }
    
            # Vérifier la taille maximale (2 Mo)
            $max_size = 2 * 1024 * 1024; 
            if ($_FILES['image']["size"] > $max_size) {
                $errors[] = "La taille de la photo ne doit pas dépasser 2 Mo.";
            }
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                // Le fichier image a été téléchargé avec succès
                // Vous pouvez accéder aux informations sur le fichier à partir de $_FILES['image']
                $photoName = $_FILES['image']['name']; // Nom du fichier
                $photoTmpName = $_FILES['image']['tmp_name']; // Emplacement temporaire du fichier
                $photoType = $_FILES['image']['type']; // Type MIME du fichier
                $photoSize = $_FILES['image']['size']; // Taille du fichier en octets
                move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $photoName);
        } else {
            $errors[] = "Erreur lors du téléchargement de la photo.";
        }

        // Si aucune erreur, procéder à l'insertion dans la base de données
        if (empty($errors)) {
            try {
                // Connexion à la base de données avec PDO
                $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motDePasse);
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                // Hasher le mot de passe
                $motDePasseHash = password_hash($password, PASSWORD_DEFAULT);
    
                // Préparer la requête SQL pour insérer les données dans la base de données
                $requete = $connexion->prepare("INSERT INTO clients (nom, prenom, age, ville, email, password, image) VALUES (?,?,?,?,?,?,?)");
                // Binder les paramètres
                $requete->bindParam(1, $nom);
                $requete->bindParam(2, $prenom);
                $requete->bindParam(3, $age);
                $requete->bindParam(4, $ville);
                $requete->bindParam(5, $email);
                $requete->bindParam(6, $motDePasseHash);
                $requete->bindParam(7, $photoName);
    
                // Exécuter la requête
                $requete->execute();
                //echo "<p class='ok'>'inscription réussie'</p>";
                $_SESSION['prenom'] = $_POST["prenom"];
                echo '<a class="success">' . $_SESSION['prenom'] . '</a><em class="success"> Enregistrement réussi ! </em><a href="ficheMembre.php" class="connec"> connectez-vous </a>';
            } catch (PDOException $e) {
                echo "Erreur de connexion à la base de données : " . $e->getMessage();
            }

        } else {
            // Afficher les erreurs et le formulaire
            foreach ($errors as $error) {
                echo "<p class='error'>$error</p>";
            }
           // include_once __DIR__ . "/formulaire_inscription.php"; // Inclure le formulaire d'inscription
        }
   }
}
    

?>