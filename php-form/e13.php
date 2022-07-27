<!DOCTYPE html>
<html>

<head>
    <title>Résultats</title>
    <link rel="stylesheet" href="form.css" />
</head>

<body>
    <?php
    $fichier = fopen("result.txt", 'r+');
    $nblignes = 0;
    $noms = array();
    $ages = array();
    $mails = array();
    $dons = array();

    if ($fichier) {
        while (($buffer = fgets($fichier)) !== false) {
            $nblignes++;
            $l = explode(' | ', $buffer);
            array_push($noms, $l[0]);
            array_push($ages, $l[1]);
            array_push($mails, $l[2]);
            array_push($dons, $l[3]);
        }
        if (!feof($fichier)) {
            print('ERREUR');
        }
    }
    fclose($fichier);

    $totdons = array_sum($dons);
    $totages = array_sum($ages);
    $moyages = round($totages / $nblignes, 0, PHP_ROUND_HALF_UP);

    for ($i = 0; $i < $nblignes; $i++) {
        print("$noms[$i] ($ages[$i] ans) a donné $dons[$i] euros. <br/>");
        /*mail(
            $mails[$i],
            "Votre don",
            "Bonjour,\n\n
          Merci pour votre don de $dons[$i] euros.\n\n
          La somme totale des dons reçus est de $totdons euros.\n
          La moyenne d'âge des personnes ayant répondu au sondage est d'environ $moyages ans."
        );*/
    }

    print("<br/><br/>La somme totale des dons est de $totdons euros<br/>");
    print("La moyenne d'âge des personnes ayant répondu au sondage est d'environ $moyages ans.<br/><br/>");

    ?>
    <a href="e11.php"><input type="button" value="Retour" /></a>
</body>

</html>