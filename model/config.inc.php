<?php
   

class Inscription {
        private $bdd;
    
        public function __construct() {
            # Connexion à la base de données (à adapter avec vos paramètres)
            $serveur = "localhost";
            $nomBaseDeDonnees = "client_ligue";
            $utilisateur = "root";
            $motDePasse = "root";
            try {
                $this->bdd = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motDePasse);
                $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                die("Erreur : " . $e->getMessage());
            }
        
           
        }
    
        public function inscrireMembre($nom, $prenom, $age, $ville, $email, $image) {
            // Vérifier si tous les champs sont remplis
            if (empty($nom) || empty($prenom) || empty($age) || empty($ville) || empty($email) || empty($image)) {
                die("Tous les champs doivent être remplis");
            }
    
            // Valider les données et sécuriser le code
            $nom = $this->dataValidate($nom);
            $prenom = $this->dataValidate($prenom);
            $age = $this->dataValidate($age);
    
    
            $ville = $this->dataValidate($ville);
            $email = $this->dataValidate($email);
    
            // Enregistrement dans la base de données
           $bdd = $this->bdd->prepare('INSERT INTO clients (nom, prenom, age, ville, email, image) VALUES (?, ?, ?, ?, ?, ?)');
           $bdd->execute([$nom, $prenom, $age, $ville, $email, $image]);
    
            print "Inscription réussie!";
        }
    
        private function dataValidate($data) {
            # Supprimer les espaces excessifs et échapper les caractères spéciaux pour les requêtes SQL : voir la démo
            $data = trim($data);
            /* $data = $this->bdd->quote($data); */
            return $data;
        }
        
        
    }