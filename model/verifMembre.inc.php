<?php
  
  class VerifMembre{

    static function verification(){
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

//CONNEXION MEMBRE:
// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Valider les données du formulaire
    $errors = [];

    if (empty($email) || empty($password)) {
        $errors[] = "Veuillez saisir votre email et votre mot de passe";
    }

    // Si aucune erreur, procéder à la vérification dans la base de données
    if (empty($errors)) {
        try {
            // Connexion à la base de données avec PDO
            $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motDePasse);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Préparer la requête SQL pour récupérer l'utilisateur avec cet email
            $requete = $connexion->prepare("SELECT * FROM clients WHERE email = ?");
            $requete->execute([$email]);
            $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

            // Vérifier si l'utilisateur existe et si le mot de passe est correct
            if ($utilisateur && password_verify($password, $utilisateur['password'])) {
                // Redirection vers la page evenementMembre.inc.php
               header("Location: evenementMembre.php");
               exit;
            } else {
                $errors[] = "Email ou mot de passe incorrect";
            }
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }

    // Si des erreurs sont survenues, les afficher
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p class='error'>$error</p>";
        }
    }
}
    }
}