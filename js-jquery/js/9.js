var rHexVal,
    gHexVal,
    bHexVal,
    rRGBVal,
    gRGBVal,
    bRGBVal;

function colorHexa(input) {
    var error = false,
        saisie = input.value,
        hexacode = "";

    if (error) {
        error = false;
    } else {
        if (saisie < "00" || saisie > "FF") {
            window.alert("Veuillez saisir une valeur hexadécimale valide comprise entre 00 et FF");
            input.focus();
            error = true;
            return false;
        } else {
            var name = input.name;
            switch (name) {
                case "Rouge":
                    rHexVal = input.value;
                    alert('Je suis dans la case rouge et rHexVal = ' + rHexVal);
                    break;
                case "Vert":
                    gHexVal = input.value;
                    alert('Je suis dans la case verte et gHexVal = ' + gHexVal);
                    break;
                case "Bleu":
                    bHexVal = input.value;
                    alert('Je suis dans la case bleue et gHexVal = ' + bHexVal);
                    break;
                default:
                    window.alert('Aucune correspondance hexadécimale');
            }
        }
    }
    hexacode = "#" + rHexVal + gHexVal + gHexVal;
    document.body.style.backgroundColor = hexacode;
}

function colorRGB(input) {
    var error = false,
        saisie = parseInt(input.value, 10),
        rgbcode = "";

    if (error) {
        error = false;
    } else {
        if (saisie < 0 || saisie > 255) {
            window.alert("Veuillez saisir une valeur comprise entre 0 et 255");
            input.focus();
            error = true;
            return false;
        } else {
            var name = input.name;
            switch (name) {
                case "Rouge":
                    rRGBVal = parseInt(input.value, 10);
                    break;
                case "Vert":
                    gRGBVal = parseInt(input.value, 10);
                    break;
                case "Bleu":
                    bRGBVal = parseInt(input.value, 10);
                    break;
                default:
                    window.alert('Aucune correspondance RGB');
            }
        }
    }
    rgbcode = 'rgb(' + rRGBVal + ',' + gRGBVal + ',' + bRGBVal + ')';
    document.body.style.backgroundColor = rgbcode;
}

window.addEventListener('load', function() {
    rHexVal = document.getElementById('RougeHexa').value;
    gHexVal = document.getElementById('VertHexa').value;
    bHexVal = document.getElementById('BleuHexa').value;
    rRGBVal = document.getElementById('RougeRGB').value;
    gRGBVal = document.getElementById('VertRGB').value;
    bRGBVal = document.getElementById('BleuRGB').value;

    document.getElementById('btnRouge').addEventListener('click', function() {
        document.body.style.backgroundColor = "red"
    });
    document.getElementById('btnVert').addEventListener('click', function() {
        document.body.style.backgroundColor = "green"
    });
    document.getElementById('btnBleu').addEventListener('click', function() {
        document.body.style.backgroundColor = "blue"
    });
});