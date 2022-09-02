<?php
session_start();
$_SESSION['adhernum'] = $_POST['num'];
$_SESSION['adhername'] = $_POST['nom'];
$_SESSION['format'] = $_POST['format'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Confirmation</title>
    <link rel="stylesheet" href="../VCIStyle.css" />
</head>

<body id="user">
    <?php
    include '../base/VCITitre.php';
    include '../base/VCIMenu.html';

    $date = new DateTime('now', new DateTimeZone('Europe/Paris'));
    $d = $date->format('Y-m-d');

    try {
        $conn = new PDO("mysql:host=localhost;dbname=video", 'root', '');

        //check if db is empty
        $req = "SELECT * FROM location";
        $st = $conn->prepare($req);
        $st->execute();
        $res = $st->fetchAll(\PDO::FETCH_ASSOC);
        //check is user exists
        $req2 = "SELECT * FROM adherent WHERE NOM_ADHERENT='" . $_SESSION['adhername'] . "' AND NUM_ADHERENT='" . $_SESSION['adhernum'] . "'";
        $st = $conn->prepare($req2);
        $st->execute();
        $res2 = $st->fetchAll(\PDO::FETCH_ASSOC);
        //check if movie is already rented in this format
        $req3 = "SELECT * FROM location WHERE ID_FILM='" . $_SESSION['filmid'] . "' AND CODE_SUPPORT='" . $_SESSION['format'] . "'";
        $st = $conn->prepare($req3);
        $st->execute();
        $res3 = $st->fetchAll(\PDO::FETCH_ASSOC);
        // get film name
        $req4 = "SELECT * FROM film WHERE ID_FILM=" . $_SESSION['filmid'];
        $st = $conn->prepare($req4);
        $st->execute();
        $res4 = $st->fetchAll(\PDO::FETCH_ASSOC);
        $f = $res4[0];
        //get format name
        $req5 = "SELECT * FROM support WHERE CODE_SUPPORT='" . $_SESSION['format'] . "'";
        echo $req5;
        $st = $conn->prepare($req5);
        $st->execute();
        $res5 = $st->fetchAll(\PDO::FETCH_ASSOC);
        $f2 = $res5[0];
    } catch (PDOException $e) {
        echo "Connexion impossible : " . $e->getMessage();
    }

    $conn = null;

    if ((empty($res) && !empty($res2)) || (!empty($res2) && empty($res3))) {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=video", 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO `location`(`NUM_ADHERENT`, `ID_FILM`, `CODE_SUPPORT`, `DEBUT_LOCATION`, `DATE_RETOUR`, `TARIF_APPLIQUE`) 
            VALUES ('" . $_SESSION['adhernum'] . "','" . $_SESSION['filmid'] . "','" . $_SESSION['format'] . "','" . $d . "',NULL,NULL)";
            $conn->exec($sql);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;

        print("<p id='welcome'>Merci pour votre réservation, " . $_SESSION['adhername'] . " ! <br/>
          Il ne vous reste plus qu'à venir en boutique pour récupérer votre exemplaire du film " . utf8_encode($f['TITRE_FILM']) . ".");
        print("<br/><a href='../VCIAccueil.php'><input type='button' value='Retour au menu'/></a></p>");
    } else {
        if (empty($res2)) {
            print("<p id='welcome'>Attention : Les coordonnées client saisies sont erronnées !</p>");
        } else if (!empty($res3)) {
            print("<p id='welcome'>Attention : Il y a déjà une réservation pour le film " . utf8_encode($f['TITRE_FILM']) . " au format " . $f2['LIB_SUPPORT'] . " !</p>");
        }
        print("<br/><a href='VCIRes.php'><input type='button' value='Retour'/></a></p>");
    }
    session_unset();
    session_destroy();
    ?>


</body>

</html>