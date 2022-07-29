<!DOCTYPE html>
<html>

<head>
    <title>Database</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    $typeclasst = $_POST['classt'];
    $req = "SELECT * from repertoire ";
    $starttable = "<table><tr id='ent'><td>Nom</td><td>Prénom</td><td>Adresse</td><td>Age</td></tr>";
    try {
        $conn = new PDO("mysql:host=localhost;dbname=testrepertoire", 'root', '');
        echo "Connexion réussie.<br/><br/>";

        switch ($typeclasst) {
            case 'nom':
                echo "Classement par nom.<br/><br/>";
                showRes('nom', $req, $starttable, $conn);
                break;

            case 'prn':
                echo "Classement par prénom.<br/><br/>";
                showRes('prenom', $req, $starttable, $conn);
                break;

            case 'age':
                echo "Classement par âge.<br/><br/>";
                showRes('age', $req, $starttable, $conn);
                break;

            case 'moy':
                echo "Moyenne d'âge des inscrits.<br/><br/>";
                $st = $conn->prepare("SELECT age from repertoire");
                $st->execute();
                $res = $st->fetchAll(\PDO::FETCH_ASSOC);
                $res2 = [];
                for ($i = 0; $i < count($res); $i++) {
                    $res2[$i] = $res[$i]['age'];
                }
                $totages = array_sum($res2);
                $moyages = round($totages / count($res2), 0, PHP_ROUND_HALF_UP);
                print("La moyenne d'âge des personnes inscrites est d'environ $moyages ans.<br/><br/>");
                break;

            default:
                break;
        }
    } catch (PDOException $e) {
        echo "Connexion impossible : " . $e->getMessage();
    }

    $conn = null;

    function showRes($sortby, $basereq, $starttable, $conn)
    {
        $reqfull = $basereq . "ORDER BY " . $sortby . " ASC;";
        $st = $conn->prepare($reqfull);
        $st->execute();
        $res = $st->fetchAll(\PDO::FETCH_ASSOC);

        print($starttable);
        for ($i = 0; $i < count($res); $i++) {
            $resint = $res[$i];
            $strtbl = "<tr><td>" . $resint['nom'] . "</td><td>" . $resint['prenom'] . "</td><td>" . $resint['adresse'] . "</td><td>" . $resint['age'] . "</td></tr>";
            print($strtbl);
        }
        print("</table><br/>");
    }
    ?>
    <a href="home.php"><input type="button" value="Retour" /></a>

</body>

</html>