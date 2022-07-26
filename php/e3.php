<!DOCTYPE html>
<html>

<head>
    <title>Exercice 3</title>
</head>

<body>
    <?php
    $fichier = fopen("calepin.txt", 'r');
    if ($fichier) {
        while (($buffer = fgets($fichier)) !== false) {
            $str = explode('|', $buffer);
            print("Nom : $str[0]<br/>Prénom : $str[1]<br/>Adresse : $str[2]<br/>Code postal : $str[3]<br/>Ville : $str[4]<br/><br/><br/>");
        }
        if (!feof($fichier)) {
            print('ERREUR');
        }
    }
    fclose($fichier);
    ?>
</body>

</html>