<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Réservation de film</title>
    <link rel="stylesheet" href="../VCIStyle.css" />
</head>

<body id="user">
    <?php
    include '../base/VCITitre.php';
    include '../base/VCIMenu.html';
    ?>
    <p id="welcome">Sélectionnez le type de film que vous recherchez : <br /></p>
    <form id="selfilm" method="POST" action="VCIRes2.php">
        <select name='typefilm' id='typefilm' class="centerimg" required onchange="this.form.submit()">
            <option value=''>Sélectionnez le type recherché</option>
            <option value='act'>Action</option>
            <option value='ani'>Animation</option>
            <option value='com'>Comédie</option>
            <option value='hor'>Horreur</option>
            <option value='pol'>Policier</option>
            <option value='scf'>Science-fiction</option>
        </select>
    </form>

</body>

</html>