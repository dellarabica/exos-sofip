<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>

<body>
    <table id="header">
        <tr>
            <td id='hd1'><a href='../VCIAccueil.php'><img id='logovci' src="../pics/logo.png" /></a></td>
            <td id="hd2">
                <?php 
                $date = new DateTime('now', new DateTimeZone('Europe/Paris'));
                $mois = array(1=>" janvier "," février "," mars "," avril "," mai "," juin ", " juillet "," août "," septembre "," octobre "," novembre "," décembre ");
                $d = $date->format('d').$mois[$date->format('n')].$date->format('Y');
                print("Nous sommes le $d");
            ?>
                <br />
                <a class='hyperlink blue' onclick="openLogin();">Connexion</a>
            </td>
        </tr>
    </table>

    <div id="id01" class="modal">
        <div class="modal-content">
            <div class="container">
                <input type="text" placeholder="Enter Username" name="uname" id='log' required>
                <input type="password" placeholder="Enter Password" name="psw" id='log' required>
                <div id='bt'><button id="btnlogin" onclick="checkLogin()">Login</button></div>
            </div>
        </div>
    </div>

    <script>
    var modal = $('#id01');

    $(window).click(function(e) {
        closeLogin(e);
    });

    function openLogin() {
        $('#id01').show();
    }

    function closeLogin(e) {
        var target = $(e.target);
        if (target.is(modal)) {
            target.hide();
        }
    }

    function checkLogin() {
        var uAdmin = 'admin',
            pAdmin = 'admin',
            user = $("input[name='uname']").val(),
            pass = $("input[name='psw']").val();

            if(user == uAdmin && pass == pAdmin){
                location.replace("../admin/VCIAdmin.php");
            }
            else{
                alert("Identifiants incorrects !!");
            }

    }
    </script>
</body>

</html>