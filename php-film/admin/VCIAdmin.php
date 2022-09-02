<?php
session_start();
if (isset($_POST['titreFilm'])) {
    $_SESSION['titre'] = $_POST['titreFilm'];
    $_SESSION['genre'] = $_POST['gnr'];
    $_SESSION['real'] = $_POST['real'];
    $_SESSION['annee'] = $_POST['anneeFilm'];
    $_SESSION['img'] = $_POST['pathImg'];
    $_SESSION['resume'] = $_POST['rsm'];
}
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
    print("<p id='welcome'>Bienvenue sur l'interface administrateur !!</p>");
    if (!empty($_SESSION)) {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=video", 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO `film`(`CODE_TYPE_FILM`, `ID_REALIS`, `TITRE_FILM`, `ANNEE_FILM`, `REF_IMAGE`, `RESUME`) 
            VALUES ('" . $_SESSION['genre'] . "','" . $_SESSION['real'] . "','" . $_SESSION['titre'] . "','"  . $_SESSION['annee'] . "','" . $_SESSION['img'] . "','" . $_SESSION['resume'] . "')";
            $conn->exec($sql);
            print("<p id='welcome'>Le film " . $_SESSION['titre'] . " a bien été ajouté.</p>");
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
        session_unset();
        session_destroy();
    }
    ?>

</body>

</html>