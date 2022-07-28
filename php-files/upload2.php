<!DOCTYPE html>
<html>

<head>
    <title>Mise en ligne de fichiers</title>
    <link rel='stylesheet' href='style.css' />
</head>

<body>
    <?php
    $filetemp = $_FILES['fichier']['tmp_name'];
    $name = basename($_FILES['fichier']["name"]);
    $size = $_FILES['fichier']['size'];
    $type = $_FILES['fichier']['type'];
    $newloc = "./files";
    print("Copie de $name en cours...<br/>");
    if (move_uploaded_file($filetemp, $newloc . '/' . $name)) {
        print("Le fichier $name de taille <span>$size octets</span> et de type <span>$type</span> a été téléchargé avec succès.");
    } else {
        print("Erreur lors du transfert.");
    }
    ?>
</body>

</html>