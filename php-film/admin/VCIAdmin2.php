<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ajout de film</title>
    <link rel="stylesheet" href="../VCIStyle.css" />
</head>

<body id="admin">
    <?php
    include '../baseadmin/VCITitreAdmin.php';
    include '../baseadmin/VCIMenuAdmin.html';

    try {
        $conn = new PDO("mysql:host=localhost;dbname=video", 'root', '');
        $req = "SELECT * FROM typefilm";
        $st = $conn->prepare($req);
        $st->execute();
        $res = $st->fetchAll(\PDO::FETCH_ASSOC);
        $req2 = "SELECT * FROM star";
        $st = $conn->prepare($req2);
        $st->execute();
        $res2 = $st->fetchAll(\PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Connexion impossible : " . $e->getMessage();
    }

    $conn = null;
    $listReal = listReal($res2);
    $listGenre = listGenre($res);
    $date = new DateTime('now', new DateTimeZone('Europe/Paris'));
    $d = $date->format('Y');

    print("<p id='welcome'>Saisie d'un nouveau film</p>");

    $str = "<form method='post' action='VCIAdmin.php'>
    <table class='tabins'>
    <tr>
    <td>Titre</td>
    <td><input type='text' name='titreFilm' id='titreFilm' required/></td>
    </tr>
    <tr>
    <td>Type de film</td>
    <td>" . $listGenre . "</td>
    </tr>
    <tr>
    <td>Réalisateur</td>
    <td>" . $listReal . "</td>
    </tr>
    <tr>
    <td>Année de sortie</td>
    <td><input type='number' name='anneeFilm' id='anneeFilm' pattern='[0-9]{4}' min='1900' max='" . $d . "' step='1' required/></td>
    </tr>
    <tr>
    <td>Affiche</td>
    <td><input type='text' name='pathImg' id='pathImg' placeholder='Entrer le chemin vers l&#39;affiche'/></td>
    </tr>
    <tr>
    <td>Résumé</td>
    <td><textarea id='rsm' name='rsm' rows='5' cols='30'></textarea></td>
    </tr>
    <td><input type='submit' value='Créer'/></td>
    <td><input type='reset' value='Réinitialiser'/></td>
    </tr>
    </table>
    </form>";
    print($str);



    function listReal($arrayReal)
    {
        $str = "<select name='real' id='real' required><option value=''>Choisir...</option>";
        for ($j = 0; $j < count($arrayReal); $j++) {
            $q = $arrayReal[$j];
            $str .= "<option value='" . $q['ID_STAR'] . "'>" . $q['PRENOM_STAR'] . " " . $q['NOM_STAR'] . "</option>";
        }
        $str .= "</select>";
        return $str;
    }

    function listGenre($arrayGenre)
    {
        $str = "<select name='gnr' id='gnr' required><option value=''>Choisir...</option>";
        for ($j = 0; $j < count($arrayGenre); $j++) {
            $q = $arrayGenre[$j];
            $str .= "<option value='" . $q['CODE_TYPE_FILM'] . "'>" . $q['LIB_TYPE_FILM'] . "</option>";
        }
        $str .= "</select>";
        return $str;
    }
    ?>

</body>

</html>