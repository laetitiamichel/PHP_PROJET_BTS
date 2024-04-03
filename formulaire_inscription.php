<?php
    include_once __DIR__ ."/head.inc.php";
?>
<body>
<div class="ligne_rose"></div>
<div class="ligne_verte"></div>
<header class="page_accueil" id="formulaire">
    <h1 class="h1_accueil">
        Maison des ligues tous les sports 
    </h1>
</header>
<main >
    <ul class="display_grid">
        <li class="img_accueil">
            <img src="https://placehold.co/400x400" alt="ligue angers">
            <legend>content</legend>
        </li>
        <li class="img_accueil">
            <img src="https://placehold.co/400x400" alt="ligue fc nantes">
            <legend>content</legend>
        </li>
        <li class="img_accueil">
            <img src="https://placehold.co/400x400" alt="ligue montpellier">
            <legend>content</legend>
        </li>
        <li class="img_accueil">
            <img src="https://placehold.co/400x400" alt="ligue losc">
            <legend>content</legend>
        </li>
        <li class="img_accueil">
            <img src=".https://placehold.co/400x400" alt="ligue paris">
            <legend>content</legend>
        </li>
    </ul>
    <div class="formulaire_inscription" id="inscription">
    <?php
                   include_once __DIR__ ."/connexionMembre.inc.php"
                ?>   
        <!-- formulaire pour créer un compte -->
        <div class="inner-form_inscription">
            <fieldset> <!-- encadré qui contient le formulaire-->
                <legend>
                    Inscription
                </legend>
                <form action="index.php" method="post" id="inscription">  
                    <label for="nomInscription">
                        Nom
                    </label>
                        <input 
                        id="nomInscription"
                        type="text"
                        name="nom"
                        placeholder="Nom" 
                        autofocus="true" 
                        aria-required="true"
                        >
    
                    <label for="prenomInscription">
                        Prénom
                    </label>
                        <input
                        id="prenomInscription"
                        type="text"
                        name="prenom"
                        placeholder="Prénom"
                        aria-required="true"
                        >
                    <label for="ageInscription">
                        Age
                    </label>
                        <input
                        id="ageInscription" 
                        type="date"
                        name="age"
                        placeholder="Age"
                        aria-required="true"
                        >
                    <label for="villeInscription">
                        Ville
                    </label>
                        <input
                        id="villeInscription" 
                        type="search"
                        name="ville"
                        placeholder="Ville"
                        aria-required="true"
                        >
                    <label for="emailInscription">
                        E-mail
                    </label>
                        <input 
                        id="emailInscription"
                        type="email"
                        name="mail"
                        placeholder="Votre email"
                        aria-required="true"
                        >
                <label for="photo">
                    <span class="material-symbols-outlined">download</span>
                        Téléchargez votre photo :
                <input 
                type="file" 
                id="photoInscription" 
                name="image" 
                accept="image/*" 
                required placeholder="">
            </label>
                    <input
                        id="btnValiderInscription"
                        type="submit"
                        value="valider "
                        >
                </form>
            </fieldset>            
        </div>
        <?php
                      
                      include_once __DIR__ ."/model/config.inc.php";
                      include_once __DIR__ ."/controller.inc.php";
                        // Déplacer la photo téléchargée vers un dossier (assurez-vous que le dossier "uploads" existe)
                      //move_uploaded_file($photoTmpName, $photoDestination);
      
                      // Instancier la classe Inscription
                      $inscription = new Inscription();
      
                      // Appeler la méthode d'inscription
                      $inscription->inscrireMembre($nom, $prenom, $age, $ville, $email, $image);
                      // Stocker les données du membre dans une session
                        session_start();
                        $_SESSION['membre'] = [
                            'nom' => $nom,
                            'prenom' => $prenom,
                            'age' => $age,
                            'ville' => $ville,
                            'email' => $email,
                            'image' => $photoDestination,
                        ];
                      // Rediriger l'utilisateur après l'inscription réussie
                      header("Location: confirmation.php?prenom=" . urlencode($prenom));
                     // exit();
                      ?>
</main>
<footer>
    <div class="img_logo">
        <img src="./asset/php/logo_jo.png" alt="logo jeux olympique">
    </div>
</footer>
</body>
</html>