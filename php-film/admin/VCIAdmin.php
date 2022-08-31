<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Interface administrateur</title>
    <link rel="stylesheet" href="../VCIStyle.css" />
</head>

<body id="admin">
    <?php 
    include '../baseadmin/VCITitreAdmin.php';
    include '../baseadmin/VCIMenuAdmin.html';
    ?>
    <p id="welcome">Bienvenue sur l'interface admimistrateur !!</p>
</body>

</html>