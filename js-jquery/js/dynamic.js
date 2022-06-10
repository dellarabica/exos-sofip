var nbLine = 1,
    maxNbLine = 15,
    dbBook = new Array(
        new Book('bk1', 'Le grand livre de JavaScript', 17),
        new Book('bk2', 'HTML encore plus vite', 15.99),
        new Book('bk3', 'Le guide pour bien débuter en CSharp', 25),
        new Book('bk4', 'Angular pour les nuls', 32),
        new Book('bk5', 'Rendre une page web dynamique en 45 minutes', 28),
        new Book('bk6', 'Comment créer son site web', 39.99),
        new Book('bk7', 'PHP pour les nuls', 25)
    );

function Book(ref, name, uPrice) {
    this.ref = ref;
    this.name = name;
    this.uPrice = uPrice;
}

function showInfo(idSel) {
    let idChoix = $(idSel).attr("id").substring(6, $(idSel).attr("id").length),
        val = parseFloat($(idSel).val());
    if (val >= 0) {
        $('#qte' + idChoix).val('0');
        $('#ref' + idChoix).val(dbBook[val].ref);
        $('#uPrice' + idChoix).val(dbBook[val].uPrice);
        $('#price' + idChoix).val('0');
    } else {
        $('#qte' + idChoix).val('');
        $('#ref' + idChoix).val('');
        $('#uPrice' + idChoix).val('');
        $('#price' + idChoix).val('');
    }
}

function newLine() {
    if (nbLine < maxNbLine) {
        let option = '';
        for (let i = 0; i < dbBook.length; i++) {
            option = option + '<option value="' + i + '">' + dbBook[i].name + '</option> ';
        }
        $('<tr id="line' + nbLine + '"><td><select name="choix" id="choice' + nbLine +
            '"><option value="-1">Choisissez votre livre</option> ' + option + '</select> </td>' +
            '<td><input type="text" id="ref' + nbLine + '" readonly="readonly" /> </td>' +
            '<td><input type="number" min="0" step="1" id="qte' + nbLine + '"/> </td>' +
            '<td><input type="number" id="uPrice' + nbLine + '" readonly="readonly"/> </td>' +
            '<td><input type="number" id="price' + nbLine + '" readonly="readonly"/> </td>' +
            '<td><input type="button" value="-" id="bt' + nbLine + '" class="btn"></td></tr>').insertBefore('#lineTot');

        $('#choice' + nbLine).on('change', function() {
            showInfo(this);
            calcPrice($('#qte' + (nbLine - 1)).val(), $('#qte' + (nbLine - 1)).id);
        })
        $('#qte' + nbLine).on('blur', function() {
            calcPrice($(this).val(), $(this).attr("id").substring(3, $(this).attr("id").length));
        })
        $('#bt' + nbLine).on('click', function() {
            delLine(this);
        })
        nbLine++;
    } else {
        alert("Vous avez dépassé le nombre maximal de lignes !");
    }
}

function calcPrice(val, id) {

    $('#TotFin').val(parseFloat('0'));
    if (val === '0' || isNaN(parseFloat(val) * parseFloat($('#uPrice' + id).val()))) {
        $('#price' + id).val(parseFloat('0'));
    } else {
        $('#price' + id).val((parseFloat(val) * parseFloat($('#uPrice' + id).val())).toFixed(2));

    }
    for (let j = 0; j <= nbLine; j++) {
        if ($('#price' + j) !== null) {
            if (parseFloat($('#price' + j).val()) > 0) {
                $('#TotFin').val((parseFloat($('#TotFin').val()) + parseFloat($('#price' + j).val())).toFixed(2))
            }
        }
    }
}

function delLine(btn) {

    if (!($('#price' + $(btn).attr('id').substring(2, $(btn).attr('id').length)).val() === '')) {
        $('#TotFin').val((parseFloat($('#TotFin').val()) - parseFloat($('#price' + $(btn).attr('id').substring(2, $(btn).attr('id').length)).val())).toFixed(2))
    }
    $('#tab #line' + $(btn).attr('id').substring(2, $(btn).attr('id').length)).remove();
    maxNbLine += 1;
}

$(window).on('load', function() {
    newLine();
})

$('#addLine').on('click', function() {
    newLine();
})