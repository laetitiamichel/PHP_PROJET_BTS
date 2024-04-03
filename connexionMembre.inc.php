<?php
    // Configuration de la base de données
    require_once "./model/config.inc.php";
    
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $age = $_POST["age"];
        $ville = $_POST["ville"];
        $email = $_POST["email"];
        $image = $_POST["image"];
    
        // Valider les données du formulaire
        $errors = [];
    
        if (empty($nom) || empty($prenom) || empty($age) || empty($ville) || empty($email) || empty($image)) {
            $errors[] = "Tous les champs sont obligatoires";
        }
    
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Adresse email invalide";
        }
        if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
            $photo_name = htmlspecialchars(basename($_FILES["image"]["name"]));
            
            # Vérifier l'extension et autoriser une extention
            $allowed_extensions = array("jpg", "jpeg", "png");
            $photo_extension = strtolower(pathinfo($photo_name, PATHINFO_EXTENSION));
    
            if (!in_array($photo_extension, $allowed_extensions)) {
                $errors[] = "L'extension de la photo doit être jpg, jpeg, ou png.";
            }
    
            # Vérifier la taille maximale (2 Mo ici, mais tu peux ajuster selon tes besoins)
            $max_size = 2 * 1024 * 1024; # 2 Mo
            if ($_FILES["photo"]["size"] > $max_size) {
                $errors[] = "La taille de la photo ne doit pas dépasser 2 Mo.";
            }
    
            move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/" . $photo_name);
        } else {
            $errors[] = "Erreur lors du téléchargement de la photo.";
        }
        
        // Si aucune erreur, procéder à l'insertion dans la base de données
        if (empty($errors)) {
            try {
                // Connexion à la base de données avec PDO
                $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $email);
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                // Hasher le mot de passe
                //$motDePasseHash = password_hash($password, PASSWORD_DEFAULT);
    
                // Préparer la requête SQL pour insérer les données dans la base de données
                $requete = $connexion->prepare("INSERT INTO clinents (nom, prenom, age, ville, email, image) VALUES (:nom, :prenom, :age, :ville, :email, :image)");
                // Binder les paramètres
                $requete->bindParam(":nom", $nom);
                $requete->bindParam(":prenom", $prenom);
                $requete->bindParam(":age", age);
                $requete->bindParam(":ville", ville);
                $requete->bindParam(":email", $email);
                $requete->bindParam(":image", $image);
    
                // Exécuter la requête
                $requete->execute();
                    $_SESSION['mail'] = $_POST["mail"];
                    //echo '<a class="success">' . $_SESSION['mail'] . '</a><em class="success"> Enregistrement réussi ! </em><a href="connexion.php" class="connec"> connectez-vous </a>';
                exit;
            } catch (PDOException $e) {
                echo "Erreur de connexion à la base de données : " . $e->getMessage();
               
            }
        } else {
            // Afficher les erreurs
            foreach ($errors as $error) {
                echo "<p class='error'>$error</p>";
            }
        }
    }
    
    ?>