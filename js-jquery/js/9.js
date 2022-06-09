function colorHexa(input) {
    var error = false,
        regex = /^[0-9A-F]{2}$/i;

    if (error) {
        error = false;
    } else {
        if (!regex.test($(input).val())) {
            window.alert("Veuillez saisir une valeur hexadécimale valide comprise entre 00 et FF");
            input.focus();
            error = true;
            return false;
        }
    }

    $('body').css('background-color', '#' + $('#RougeHexa').val() + $('#VertHexa').val() + $('#BleuHexa').val());
}

function colorRGB(input) {
    var error = false;

    if (error) {
        error = false;
    } else {
        if (!(0 <= parseInt($(input).val(), 10) <= 255)) {
            window.alert("Veuillez saisir une valeur comprise entre 0 et 255");
            input.focus();
            error = true;
            return false;
        }
    }
    $('body').css('background-color', 'rgb(' + parseInt($('#RougeRGB').val(), 10) + ',' + parseInt($('#VertRGB').val(), 10) + ',' + parseInt($('#BleuRGB').val(), 10) + ')');
}

$('#RougeHexa, #VertHexa, #BleuHexa').on('change', function() {
    colorHexa(this);
})

$('#RougeRGB, #VertRGB, #BleuRGB').on('change', function() {
    colorRGB(this);
})

$('#btnBleu').on('click', function() {
    $('body').css('backgroundColor', 'blue');
})

$('#btnRouge').on('click', function() {
    $('body').css('backgroundColor', 'red');
})

$('#btnVert').on('click', function() {
    $('body').css('backgroundColor', 'green');
})