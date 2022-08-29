<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Accès refusé</title>
    <link rel="stylesheet" href="VCIStyle.css" />
</head>

<body>
    <?php 
    include 'base/VCITitre.php';
    include 'base/VCIMenu.html';
    header("refresh:3;url=VCIAccueil.php");
    ?>
    <p id="welcome">Site en cours de construction.<br/>Merci de repasser plus tard.</p>
    <img src="pics/chantier.png" class="centerimg"/>
</body>

</html>