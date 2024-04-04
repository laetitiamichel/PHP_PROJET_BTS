<?php
    include_once __DIR__ ."/controller/controller.inc.php";
    include_once __DIR__."/template/head.inc.php";
?>
<body>
<div class="ligne_rose"></div>
<div class="ligne_verte"></div>
<?php 
    include_once __DIR__ ."/template/headers.inc.php"; 
?>
<main >
<main>
<div class="page_confirmation" id="confirmation">
<?php
    $prenom = $_GET['prenom'] ?? '';

    // Récupérer les données du membre depuis la session
    $newUser = $_SESSION['membre'] ?? null;

    // Afficher les données du membre
    if ($newUser) {
        echo "
        <h2 class=\"h2_fiche\">
            Merci $prenom de vous être inscrit ! Votre formulaire a été soumis avec succès.
        </h2>
        <h3 class=\"h3_fiche\">
            <span>&#127942;</span>
            Vous êtes le nouveau membre :
        </h3>
        <div class=\"fiche_membre\">
            <ul>
                <li>
                    Nom : {$newUser['nom']}
                </li>
                <li>
                    Prénom : {$newUser['prenom']}
                </li>
                <li>
                    Date de naissance : {$newUser['age']}
                </li>
                <li>
                    Ville : {$newUser['ville']}
                </li>
                <li>
                    Mail : {$newUser['email']}
                </li>
            </ul>   
        </div>
        <h4 class=\"photo_membre\">Votre photo</h4>
        <figure class=\"photo_membre\">
            <img src='{$newUser['image']}' alt='Photo du membre'>
        </figure>
        <div class=\"bouton_accueil\">
        <a class=\"clic_retour_accueil\" href=\"index.php\" target=\"_blank\">Revenir à l'accueil</a>
            <a class=\"clic_retour_accueil\" href=\"connexionMembre.inc.php\" target=\"_blank\">Connectez-vous</a>
        </div>
        ";
    } /* else {
        echo "<p>Merci de vous être inscrit. Votre formulaire a été soumis avec succès.</p>";
    } */
?>
</main>
<?php 
    include_once __DIR__ ."/template/footer.inc.php";
?>
</body>
</html>