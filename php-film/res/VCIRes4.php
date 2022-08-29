<?php
session_start();
$_SESSION['adhernum'] = $_POST['num'];
$_SESSION['adhername'] = $_POST['nom'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Confirmation</title>
    <link rel="stylesheet" href="../VCIStyle.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <?php 
    include '../base/VCITitre.php';
    include '../base/VCIMenu.html';
    ?>


</body>

</html>