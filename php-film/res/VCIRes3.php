<?php
session_start();
$_SESSION['filmid'] = $_POST['filmid'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Résumé de la réservation</title>
    <link rel="stylesheet" href="../VCIStyle.css" />
</head>

<body>
    <?php 
    include '../base/VCITitre.php';
    include '../base/VCIMenu.html';
    try {
        $conn = new PDO("mysql:host=localhost;dbname=video", 'root', '');
        $req = "SELECT * FROM film as a INNER JOIN star as b ON a.ID_REALIS=b.ID_STAR WHERE a.ID_FILM='".$_SESSION['filmid']."'";
        $st = $conn->prepare($req);
        $st->execute();
        $res = $st->fetchAll(\PDO::FETCH_ASSOC);
        $f = $res[0];
        $req2 = "SELECT * FROM typefilm WHERE CODE_TYPE_FILM='".$_SESSION['typefilm']."'";
        $st = $conn->prepare($req2);
        $st->execute();
        $res2 = $st->fetchAll(\PDO::FETCH_ASSOC);
        $typechoisi = $res2[0]['LIB_TYPE_FILM'];

    } catch (PDOException $e) {
        echo "Connexion impossible : " . $e->getMessage();
    }
    $conn = null;
    print("<p id='welcome'>Voici le film sélectionné<br/></p>");
    $imgsrc = str_replace('Mini', '', "../pics/FilmAffiches/".$typechoisi."/".$f['REF_IMAGE']);
    $tbl = "<table class='tabsel'>
    <tr>
    <td rowspan='3'><img src='".$imgsrc."' id='affmin2'/></td>
    <td>Titre</td>
    <td>".utf8_encode($f['TITRE_FILM'])."</td></tr>
    <tr>
    <td>Année de sortie</td>
    <td>".$f['ANNEE_FILM']."</td>
    </tr>
    <tr>
    <td>Réalisateur</td>
    <td>".$f['PRENOM_STAR']." ".$f['NOM_STAR']."</td>
    </tr>
    </table>";
   print($tbl);
    ?>
    <form method="POST" action="VCIRes4.php">
        <table class="tabctr">
            <tr>
                <td>
                    Nom de famille
                </td>
                <td><input type="text" name="nom" pattern="[A-Za-z0-9\-]{3,}" required /></td>

            </tr>
            <tr>
                <td>
                    Numéro adhérent
                </td>
                <td><input type="number" name="num" required /></td>
            </tr>
            <tr>
                <td>Format</td>
                <td>
                    <select name='format' id='format' class="centerimg" required>
                        <option value=''>Sélectionnez le format</option>
                        <option value='B'>Blu-Ray</option>
                        <option value='D'>DVD</option>
                        <option value='K'>Cassette vidéo</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Réserver" />
                </td>
                <td>
                    <a href="VCIRes.php"><input type="button" value="Annuler" /></a>
                </td>
            </tr>
        </table>
    </form>

</body>

</html>