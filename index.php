<?php
    session_start();
    include_once __DIR__ ."/controller/controller.inc.php";

    include_once __DIR__."/template/head.inc.php";
?>

<body>
<div class="ligne_rose"></div>
<div class="ligne_verte"></div>


<?php 
include_once __DIR__ ."/template/header.inc.php";
include_once __DIR__ ."/template/home.inc.php";
include_once __DIR__ ."/template/footer.inc.php";
?>
</body>
</html>