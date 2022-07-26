<!DOCTYPE html>
<html>

<head>
    <title>Form Sondage</title>
    <link rel="stylesheet" href="form.css" />
</head>

<body>
    <form method="POST" action="e12.php">
        <table>
            <tr>
                <td>Nom et prénom :</td>
                <td><input type="text" name="nom" pattern="[A-Z]{1}[A-Za-z][ ]{1}[A-Z]{1}[A-Za-z]" required /></td>
            </tr>
            <tr>
                <td>Âge : </td>
                <td><input type="text" inputmode="numeric" pattern="[0-9]{2}" name="age" required /></td>
            </tr>
            <tr>
                <td>Mail : </td>
                <td><input type="text" name="mail" pattern="^[a-z][a-z0-9_\-\.]+@[a-z0-9_\-\.]+\.[a-z]{2,3}$" required /></td>
            </tr>
            <tr>
                <td>Montant du don : </td>
                <td><input type="text" inputmode="numeric" pattern="[0-9]{1,9}[\.\,]{0,1}[0-9]{0,2}" name="don" required /></td>
            </tr>
        </table>
        <input type="submit" value="OK" />
        <a href="e13.php"><input type="button" value="Résultats" /></a>
    </form>
</body>

</html>