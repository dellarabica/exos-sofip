<!DOCTYPE html>
<html>

<head>
    <title>Exercice 4</title>
</head>

<body>
    <?php
    $fichier = fopen("cpt.txt", 'r+');
    if ($fichier) {
        while (($buffer = fgets($fichier)) !== false) {
            $buff1 = $buffer + 1;
            $buff2 = $buffer + 2;
            print("Nombre de visites avant : $buffer<br/>Nombre de visites actuelles : $buff1<br/>Nombre de visites après : $buff2");
            rewind($fichier);
            fwrite($fichier, $buff1);
        }
        if (!feof($fichier)) {
            print('ERREUR');
        }
    }
    fclose($fichier);
    ?>
</body>

</html>