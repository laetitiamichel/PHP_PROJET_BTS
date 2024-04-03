<?php
    const title = "Maison des Lgues";
        $_date = date("Y-m-d");

    /* création d'une classe avec les différentes variables, commence par une majuscule */
        class Page{
            static $_copyrigt = " LM ";
            /* quand c'est public => on appelle la variable en pointant 
            <?= $_page->_title ?>*/
            public $_link_reset = "./css/reset.css";
            public $_link_main = "./css/main.css";
            /* quand c'est static=> <?= Page::$_manifest ?> */
            static $_manifest = "./favicon/site.webmanifest";
            static $_lang = ["fr","en"];
        }

$_page = new Page();
?>