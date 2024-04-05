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
<?php
    include_once __DIR__ ."/template/display_grid.inc.php";
?> 
    <div class="formulaire_inscription" id="inscription">
   
        <!-- formulaire pour créer un compte -->
        <div class="inner-form_inscription">
            <fieldset> <!-- encadré qui contient le formulaire-->
                <legend>
                    Inscription
                </legend>
                <form action="formulaire_inscription.php" method="post" id="inscription" enctype="multipart/form-data">  
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
                        type="int"
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
                        name="email"
                        placeholder="Votre email"
                        aria-required="true"
                        >
                    <label for="mdpCreation">
                        Choisir votre mot de passe
                    </label>
                            <input
                            id="mdpCreation" 
                            type="password"
                            name="password"
                            placeholder=""
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
            <?php
                   include_once __DIR__ ."/model/config.inc.php";
                  
                      
            ?>           
        </div>
    
</main>
<?php 
    include_once __DIR__ ."/template/footer.inc.php";
?>
</body>
</html>