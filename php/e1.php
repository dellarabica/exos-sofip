<!DOCTYPE html>
<html>

<head>
    <title>Exercice 1</title>
</head>

<body>
    <?php
    $date = new DateTime('now', new DateTimeZone('Europe/Paris'));
    $d = $date->format('d.m.Y');
    $h = $date->format('H:i:s');
    print("Nous sommes le : $d <br/>Il est : $h");
    ?>
</body>

</html>