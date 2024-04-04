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
<div class="formulaire_inscription" id="inscription">
   
   <!-- formulaire pour créer un compte -->
   <div class="inner-form_inscription">
        <div class="photo_membre">
            <img src= <?= $_SESSION['image'] ?> alt='Photo du membre'>
        </div>
       <fieldset> <!-- encadré qui contient le formulaire-->
           <legend>
                    Connection <?= $_SESSION['mail'] ?>
           </legend>
          
           <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="post" id="connection" >
           <label for="emailConnection">
                       Entrez votre e-mail
                    </label>
                        <input 
                        id="emailConnection"
                        type="email"
                        name="email"
                        placeholder="Votre email"
                        aria-required="true"
                        >
                    <label for="mdpCreation">
                        Entrez votre mot de passe
                    </label>
                            <input
                            id="mdpCreation" 
                            type="password"
                            name="password"
                            placeholder=""
                            aria-required="true"
                            >
                            <input
                        id="btnValiderInscription"
                        type="submit"
                        value="valider "
                        >
                </form>
                            </form>
            </fieldset> 
            <?php
                   include_once __DIR__ ."/model/config.inc.php"
                    
            ?>           
        </div>
    
</main>
<?php 
    include_once __DIR__ ."/template/footer.inc.php";
?>
</body>
</html>
