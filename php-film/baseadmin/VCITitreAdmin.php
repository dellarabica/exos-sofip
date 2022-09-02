<table id="header">
    <tr>
        <td id='hd1'><a href='../admin/VCIAdmin.php'><img id='logovci' src="../pics/logo.png" /></a></td>
        <td id="hd2">
            <?php
            $date = new DateTime('now', new DateTimeZone('Europe/Paris'));
            $mois = array(1 => " janvier ", " février ", " mars ", " avril ", " mai ", " juin ", " juillet ", " août ", " septembre ", " octobre ", " novembre ", " décembre ");
            $d = $date->format('d') . $mois[$date->format('n')] . $date->format('Y');
            print("Nous sommes le $d");
            ?>
            <br />
            <p>Bonjour Admin.<br /></p>
            <a href='../VCIAccueil.php'>Déconnexion</a>
        </td>
    </tr>
</table>