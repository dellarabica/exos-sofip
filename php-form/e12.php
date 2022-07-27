<!DOCTYPE html>
<html>

<head>
    <title>Confirmation</title>
    <link rel="stylesheet" href="form.css"/>
</head>

<body>
    <?php
    $res = fopen("result.txt", 'a');
    $str = $_POST['nom'].' | '.$_POST['age'].' | '.$_POST['mail'].' | '.str_replace(',', '.', $_POST['don']).PHP_EOL;
    fwrite($res, $str);
    fclose($res);
    print("Enregistrement réussi !<br/>");
    ?>
    <a href="e11.php"><input type="button" value="Retour" /></a>
</body>

</html>