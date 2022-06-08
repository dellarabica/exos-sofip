function formatNomPrenom(nomPrenom, id) {
    var expREG = /^[a-zA-Z_\-\']/;
    if (expREG.test(nomPrenom) == false) {
        document.getElementById(id).focus();
        alert('Seuls les caractères alphanumériques sont autorisés !');
    }
}

function setCookie() {
    var nomCookie = ((document.getElementById("nom").value) + "*" + (document.getElementById("prenom").value));
    var expiration = new Date();
    expiration.setTime(expiration.getTime() + 30 * 24 * 60 * 60 * 1000);
    document.cookie = "Identification =" + escape(nomCookie) + "; expires=" + expiration.toGMTString();
    alert("Inscription effectuée !");
}

function getCookie(cookieName) {
    var infoCookieName = document.cookie.split("; ");
    var cookieLgth = infoCookieName.length;

    for (var i = 0; i < cookieLgth; i++) {

        var listInfo = infoCookieName[i].split("=");

        if (listInfo[0] == cookieName) {
            return unescape(listInfo[1]);
        }
    }
    return null;
}

function showCookieInfo() {
    var listCookie = getCookie('Identification');
    var sepInfo = unescape(listCookie).split('*');
    var nom = sepInfo[0];
    var prenom = sepInfo[1];
    if (listCookie == null)
        document.getElementById("auth").style.display = "block";
    else {
        var affichage = '<h1 align="center"><font color="green">Bonjour ' + prenom + ' ' + nom + '</font></h1>';
        document.write(affichage);
    }
}

window.addEventListener('load', function() {
    "use strict";
    showCookieInfo();

    var wrName = document.getElementById('nom');
    var wrSurname = document.getElementById('prenom');

    document.getElementById('nom').addEventListener('blur', function() {
        formatNomPrenom(wrName.value, wrName.id);
    });
    document.getElementById('prenom').addEventListener('blur', function() {
        formatNomPrenom(wrSurame.value, wrSurname.id);
    });
    document.getElementById('btn1').addEventListener('click', setCookie);


});