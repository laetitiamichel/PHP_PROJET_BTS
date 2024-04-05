<?php
# connexion à la base
class AfficheData{
    static function afficheMembre(){
        if (isset($_SESSION['Id_client'])){      
        // Configuration de la base de données
        $serveur = "localhost";
        $nomBaseDeDonnees = "client_ligue";
        $utilisateur = "root";
        $motDePasse = "root";

        // Récupérer l'identifiant de l'utilisateur connecté depuis la session
        //$_nom = $_SESSION['nom'] ?? null;
        try{
        // Récupérer l'identifiant de l'utilisateur connecté depuis la session
        $id_client = $_SESSION['Id_client'];
        $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motDePasse);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $_response = $connexion->query('SELECT Id_client, nom, prenom, age, ville, email, image FROM clients WHERE Id_client = ?');
        $requete->execute(['Id_client']);
        if($_data = $_response->fetch()){
        echo "  <li>Nom : ".$_data["nom"]."</li>\n
                <li>Prénom : ".$_data["prenom"]."<li>\n
                <li>Age : ".$_data["age"]."<li>\n
                <li>Ville : ".$_data["ville"]."<li>\n
                <li>Email : ".$_data["email"]."<li>\n
                <li>\n<img src = ".$_data["image"]." loading=\"lazy\" alt=".$_data["nom"].">\n<li>";
        }

        $_response->closeCursor();  
        }
        catch(Exception $e){
        die("Error Data base de votre base ".$e->getMessage());
    }
    }
    }
    }
    AfficheData::afficheMembre();