<?php
    // Configuration de la base de données
    $serveur = "localhost";
    $nomBaseDeDonnees = "client_ligue";
    $utilisateur = "root";
    $motDePasse = "root";
    
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $age = $_POST["age"]:
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