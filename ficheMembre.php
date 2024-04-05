<?php
    session_start();
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
<div class="page_membre" id="confirmation">
<h2 class="h2_fiche">
            Merci <?= $_SESSION['prenom'] ?> , vous êtes inscrit ! Votre formulaire a été soumis avec succès.
        </h2>
        <h3 class="h3_fiche">
            <span>
                &#127942;
            </span>
            Vous êtes le nouveau membre:
        </h3>
        <div class="fiche_membre">
            <ul class="fiche_membre_ul">
<?php
    include_once __DIR__ ."/model/afficheData.inc.php";
    ?>
            </ul>
</div>
</div>
</main>
<?php 


    include_once __DIR__ ."/template/footer.inc.php";
?>
</body>
</html>