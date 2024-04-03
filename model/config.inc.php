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
        $image = $_POST["image"];
    
        // Valider les données du formulaire
        $errors = [];
    
        if (empty($nom) || empty($prenom) || empty($age) || empty($ville) || empty($email) || empty($password) || empty($image)) {
            $errors[] = "Tous les champs sont obligatoires";
        }
    
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Adresse email invalide";
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
                $requete->bindParam(7, $image);
    
                // Exécuter la requête
                $requete->execute();
                // Déplacer le fichier téléchargé vers le dossier uploads
                move_uploaded_file($photoTmpName, $photoDestination);
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
            include_once __DIR__ . "/formulaire_inscription.php"; // Inclure le formulaire d'inscription
        }
   }
    

?>