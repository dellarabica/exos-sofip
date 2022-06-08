var q1, q2, prixU1, prixU2, prblm = false;

function checkFormat(decl) {
    var val = decl.value,
        indexPt = val.indexOf('.'),
        indexVir = val.indexOf(',');


    if (prblm) {
        prblm = false;
    } else {
        if ((indexPt == 0) || (indexVir == 0)) {
            alert('Votre saisie commence par un point ou une virgule');
            decl.focus();
            prblm = true;
            return false;
        }
        if ((indexPt == val.length - 1) || (indexVir == val.length - 1)) {
            alert('Votre saisie finit par un point ou une virgule');
            decl.focus();
            prblm = true;
            return false;
        }
        if (indexPt != val.lastIndexOf('.')) {
            alert('Votre saisie contient au moins 2 points');
            decl.focus();
            prblm = true;
            return false;
        }
        if (indexVir != val.lastIndexOf(',')) {
            alert('Votre saisie contient au moins 2 virgules');
            decl.focus();
            prblm = true;
            return false;
        }
        // contrôle de la présence d'une virgule et d'un point
        if ((val.indexOf(',') >= 0) && (val.indexOf('.') >= 0)) {
            alert('Votre saisie contient une virgule et un point');
            decl.focus();
            prblm = true;
            return false;
        }
        if (!prblm) {
            return true;
        } else {
            return false;
        }
    }
}

function calcTot(decl) {
    if (checkFormat(decl)) {
        var sub, qt1 = document.getElementById('Qte1').value,
            qt2 = document.getElementById('Qte2').value,
            pu1 = document.getElementById('PrixU1').value,
            pu2 = document.getElementById('PrixU2').value,
            st1 = document.getElementById('Tot1'),
            st2 = document.getElementById('Tot2');

        if (qt1.indexOf(',') >= 0) {
            var indexFoundVir = qt1.indexOf(',');
            sub = qt1.substring(indexFoundVir + 1);
            qt1 = parseFloat(qt1) + '.' + sub;
        }
        if (qt2.indexOf(',') >= 0) {
            var indexFoundVir = qt2.indexOf(',');
            sub = qt2.substring(indexFoundVir + 1);
            qt2 = parseFloat(qt2) + '.' + sub;
        }
        if (pu1.indexOf(',') >= 0) {
            var indexFoundVir = pu1.indexOf(',');
            sub = pu1.substring(indexFoundVir + 1);
            qt1 = parseFloat(pu1) + '.' + sub;
        }
        if (pu2.indexOf(',') >= 0) {
            var indexFoundVir = pu2.indexOf(',');
            sub = pu2.substring(indexFoundVir + 1);
            pu2 = parseFloat(pu2) + '.' + sub;
        }

        st1.value = parseFloat(qt1) * parseFloat(pu1);
        st2.value = parseFloat(qt2) * parseFloat(pu2);
        total = parseFloat(st1.value) + parseFloat(st2.value);

        document.getElementById("TotFin").value = total;
    }
}