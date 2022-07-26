<!DOCTYPE html>
<html>

<head>
    <title>Exercice 2</title>
</head>

<body>
    <?php
    $ipfull = $_SERVER["REMOTE_ADDR"];
    $ipsep = explode('.', $ipfull);
    print("La 1ere partie de votre IP est : $ipsep[0]<br/>");
    print("La 2eme partie de votre IP est : $ipsep[1]<br/>");
    print("La 3eme partie de votre IP est : $ipsep[2]<br/>");
    print("La 4eme partie de votre IP est : $ipsep[3]<br/>");
    print("Adresse entière : $ipfull");
    ?>
</body>

</html>