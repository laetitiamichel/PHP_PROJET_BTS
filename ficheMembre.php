<!-- confirmation.php -->
<?php 
    include_once __DIR__ ."head.inc.php";  
?>
<body>
<div class="ligne_rose"></div>
<div class="ligne_verte"></div>
<header class="page_accueil">
    <h1 class="h1_accueil">
        Maison des ligues tous les sports 
    </h1>
</header>
<main>
<div class="page_confirmation" id="confirmation">
    <?php
    // démarrer la session
    session_start();
    $prenom = $_GET['prenom'] ?? '';
    //récupérer les données du membre depuis la session:
    $newUser = $_SESSION['membre'] ?? null;
    //afficher les données du membre:
    if($newUser){
        echo"
        <h2 class="h2_fiche">
        Merci $prenom de vous être inscrit ! votre formulaire a été soumis avec succès.
        </h2>
        <h3 class="h3_fiche">
        <span>
            &#127942;
        </span>
        Vous êtes le nouveau membre:
    </h3>
    <div class="fiche_membre">
        <ul>
            <li>
                Nom : " .$newUser['nom']."
            </li>
            <li>
                Prénom : " .$newUser['prenom']."
            </li>
            <li>
                Date de naissance : " .$newUser['age']."
            </li>
            <li>
                Ville : " .$newUser['ville']."
            </li>
            <li>
                Mail : " .$newUser['email']."
            </li>
        </ul>   
        </div>
        <h4 class="photo_membre">Votre photo</h4>
        <figure class="photo_membre">
            <img src='" .$newUser['image']."' alt=' Photo du memebre'>
        </figure>
        <div class="bouton_accueil">
            <a class="clic_retour_accueil" href="connexionMembre.inc.php" target="blank">Revenir à l'accueil</a>
        </div>
    </div>";
    }
    else{
        echo "<p>Merci de vous être inscrit. Votre formulaire a été soumis avec succès.</p>"
    }
?>
</main>
<footer>
    <div class="img_logo">
        <img src="./asset/maquette_graphique/logo_jo.png" alt="logo jeux olympique">
    </div>
</footer>
</body>
</html>