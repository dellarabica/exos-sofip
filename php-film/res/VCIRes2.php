<?php
session_start();
$_SESSION['typefilm'] = strtoupper($_POST['typefilm']);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sélection du film</title>
    <link rel="stylesheet" href="../VCIStyle.css" />
</head>

<body id="user">
    <?php
    include '../base/VCITitre.php';
    include '../base/VCIMenu.html';
    $starttable = "<table class='tabfilm'><tr id='ent'><td>Nom</td><td>Année de sortie</td><td>Réalisateur</td><td>Affiche</td></tr>";
    try {
        $conn = new PDO("mysql:host=localhost;dbname=video", 'root', '');
        $req = "SELECT * FROM film as a INNER JOIN star as b ON a.ID_REALIS=b.ID_STAR WHERE a.CODE_TYPE_FILM='" . $_SESSION['typefilm'] . "' ORDER BY a.TITRE_FILM ASC";
        $st = $conn->prepare($req);
        $st->execute();
        $res = $st->fetchAll(\PDO::FETCH_ASSOC);
        $req2 = "SELECT * FROM typefilm WHERE CODE_TYPE_FILM='" . $_SESSION['typefilm'] . "'";
        $st = $conn->prepare($req2);
        $st->execute();
        $res2 = $st->fetchAll(\PDO::FETCH_ASSOC);
        $typechoisi = $res2[0]['LIB_TYPE_FILM'];
    } catch (PDOException $e) {
        echo "Connexion impossible : " . $e->getMessage();
    }
    if (empty($res)) {
        print("<p id='welcome'>Nous n'avons aucun film de type $typechoisi disponible dans notre catalogue.<br/></p>");
    } else {
        print("<p id='welcome'>Liste des films de type $typechoisi : <br/></p>");
        print("<p id='hd2'>Choisissez le film que vous désirez réserver : <br/></p>");
        print($starttable);
        for ($i = 0; $i < count($res); $i++) {
            $resint = $res[$i];
            $imgsrc = str_replace('Mini', '', "../pics/FilmAffiches/" . $typechoisi . "/" . $resint['REF_IMAGE']);
            $strtbl = "<tr><td><p onclick='postFilm(" . $resint['ID_FILM'] . ")' class='hyperlink'>" . utf8_encode($resint['TITRE_FILM']) . "</p></td>
            <td>" . $resint['ANNEE_FILM'] . "</td>
            <td>" . $resint['PRENOM_STAR'] . " " . $resint['NOM_STAR'] . "</td>
            <td><img src='" . $imgsrc . "' id='affmin' /></td></tr>";
            print($strtbl);
        }
        print("</table><br/>");
    }
    $conn = null;
    ?>
    <table class="tabbutton">
        <tr>
            <td>
                <a href="../VCIAccueil.php"><input type="button" value="Retour à l'accueil" /></a>
            </td>
            <td>
                <a href="VCIRes.php"><input type="button" value="Autre type de film" /></a>
            </td>
        </tr>
    </table>

    <script type="text/javascript">
        function postFilm(idfilm) {
            var form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("action", "VCIRes3.php");

            var params = {
                filmid: idfilm
            };
            for (var key in params) {
                if (params.hasOwnProperty(key)) {
                    var hiddenField = document.createElement("input");
                    hiddenField.setAttribute("type", "hidden");
                    hiddenField.setAttribute("name", key);
                    hiddenField.setAttribute("value", params[key]);

                    form.appendChild(hiddenField);
                }
            }

            document.body.appendChild(form);
            form.submit();
        }
    </script>
</body>

</html>