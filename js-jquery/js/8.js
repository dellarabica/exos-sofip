function formatNomPrenom(nomPrenom, id) {
    var expREG = /^[a-zA-Z_\-\']/;
    if (expREG.test(nomPrenom) == false) {
        $(id).focus();
        alert('Seuls les caractères alphanumériques sont autorisés !');
    }
}

$(window).on('load', function() {
    var pp = Cookies.get('name').split('//');

    if (pp == null) {
        $('#auth').css('display', 'block');
    } else {
        $('#auth').css('display', 'none');
        $('#showCookie').css({
            'text-align': 'center',
            'color': 'green',
            'font-size': '3em',
            'font-weight': 'bolder'
        });
        $('#showCookie').text('Bonjour ' + pp[1] + ' ' + pp[0] + ' !');
    }



})

$('#nom').on('blur', function() {
    formatNomPrenom($('#nom').val(), $('#nom').id)
});

$('#prenom').on('blur', function() {
    formatNomPrenom($('#prenom').val(), $('#prenom').id)
});

$('#btn1').on('click', function() {
    Cookies.set('name', $('#nom').val() + '//' + $('#prenom').val(), { expires: 7 });
    alert("Inscription effectuée !");
})