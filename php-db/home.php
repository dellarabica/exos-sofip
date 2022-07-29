<!DOCTYPE html>
<html>

<head>
    <title>Accès aux bases</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <form method="POST" action="db.php">
        <select name='classt' id="classt" required>
            <option value=''> - - - - - Choisissez un mode de tri - - - - - </option>
            <option value='nom'>Classement par nom</option>
            <option value='prn'>Classement par prénom</option>
            <option value='age'>Classement par âge</option>
            <option value='moy'>Moyenne d'âge</option>
        </select>
        <input type='submit' value='Exécuter' />
    </form>

</body>

</html>