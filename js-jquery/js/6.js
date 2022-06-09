var prblm = false;

function checkFormat(decl) {
    if ($(prblm).val()) {
        $(prblm).val(false);
    }
    if (($(decl).val().indexOf('.') == 0) || ($(decl).val().indexOf(',') == 0)) {
        alert('Votre saisie commence par un point ou une virgule');
        decl.focus();
        $(prblm).val(true);
        return false;
    } else if (($(decl).val().indexOf('.') == $(decl).val().length - 1) || ($(decl).val().indexOf(',') == $(decl).val().length - 1)) {
        alert('Votre saisie finit par un point ou une virgule');
        decl.focus();
        $(prblm).val(true);
        return false;
    } else if ($(decl).val().indexOf('.') != $(decl).val().lastIndexOf('.')) {
        alert('Votre saisie contient au moins 2 points');
        decl.focus();
        $(prblm).val(true);
        return false;
    } else if ($(decl).val().indexOf(',') != $(decl).val().lastIndexOf(',')) {
        alert('Votre saisie contient au moins 2 virgules');
        decl.focus();
        $(prblm).val(true);
        return false;
    } else if (($(decl).val().indexOf(',') >= 0) && ($(decl).val().indexOf('.') >= 0)) {
        alert('Votre saisie contient une virgule et un point');
        decl.focus();
        $(prblm).val(true);
        return false;
    }
    if (!$(prblm).val()) {
        return true;
    } else {
        return false;
    }
}

$(":input").attr('type', 'number').bind('change', function() {
    if (checkFormat(this)) {
        if ($('#Qte1').val().indexOf(',') >= 0) {
            $('#Qte1').val(parseFloat($('#Qte1').val()) + '.' + $('#Qte1').val().substring($('#Qte1').val().indexOf(',') + 1));
        }
        if ($('#Qte2').val().indexOf(',') >= 0) {
            $('#Qte2').val(parseFloat($('#Qte2').val()) + '.' + $('#Qte2').val().substring($('#Qte2').val().indexOf(',') + 1));
        }
        if ($('#PrixU1').val().indexOf(',') >= 0) {
            $('#PrixU1').val(parseFloat($('#PrixU1').val()) + '.' + $('#PrixU1').val().substring($('#PrixU1').val().indexOf(',') + 1));
        }
        if ($('#PrixU2').val().indexOf(',') >= 0) {
            $('#PrixU2').val(parseFloat($('#PrixU2').val()) + '.' + $('#PrixU2').val().substring($('#PrixU2').val().indexOf(',') + 1));
        }

        $("#Tot1").val(parseFloat(parseFloat($('#Qte1').val()) * parseFloat($('#PrixU1').val())).toFixed(2));
        $("#Tot2").val(parseFloat(parseFloat($('#Qte2').val()) * parseFloat($('#PrixU2').val())).toFixed(2));
        $("#TotFin").val(parseFloat($("#Tot1").val() + $("#Tot2").val())).toFixed(2);
    }
})