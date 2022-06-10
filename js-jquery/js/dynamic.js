var nbLine = 1,
    maxNbLine = 15;

var dbBook = new Array();
dbBook[0] = new Book('bk1', 'Le grand livre de JavaScript', 17);
dbBook[1] = new Book('bk2', 'HTML encore plus vite', 15.99);
dbBook[2] = new Book('bk3', 'Le guide pour bien débuter en CSharp', 25);
dbBook[3] = new Book('bk4', 'Angular pour les nuls', 32);
dbBook[4] = new Book('bk5', 'Rendre une page web dynamique en 45 minutes', 28);
dbBook[5] = new Book('bk6', 'Comment créer son site web', 39.99);
dbBook[6] = new Book('bk7', 'PHP pour les nuls', 25);

function Book(ref, name, uPrice) {
    this.ref = ref;
    this.name = name;
    this.uPrice = uPrice;
}

function showInfo(idSel) {
    let idChoix = $('#' + idSel).charAt(idSel.length - 1),
        val = parseInt($('#' + idSel).val(), 10);

    if (val >= 0) {
        $('#qte' + idChoix).val('0');
        $('#ref' + idChoix).val(dbBook[val].ref);
        $('#uPrice' + idChoix).val(dbBook[val].uPrice);
    } else {
        $('#qte' + idChoix).val('');
        $('#ref' + idChoix).val('');
        $('#uPrice' + idChoix).val('');
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
            showInfo(this.id);
            calcPrice($('#qte' + nbLine).val(), nbLine);
        })
        $('#qte' + nbLine).on('blur', function() {
            calcPrice($(this).val(), nbLine);
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

    let prix = (parseInt(val) * parseInt(document.getElementById('uPrice' + id).value));
    if (val === '' || isNaN(prix)) prix = 0;
    document.getElementById('price' + id).value = prix;
    let tot = 0;
    for (let j = 0; j <= nbLine; j++) {
        if (document.getElementById('price' + j) !== null) {
            var prixCalc = document.getElementById('price' + j).value;
            if (prixCalc > 0) {
                tot = parseInt(tot) + parseInt(prixCalc);
            }
        }
    }
    // Affichage du total
    document.getElementById('TotFin').value = tot;
}

function delLine(btn) {
    let xid;
    if (nbLine < 10) {
        xid = btn.id.slice(-1);
    } else {
        xid = btn.id.substr(2, btn.id.length);
    }
    if (!(document.getElementById('price' + xid).value === '')) {
        document.getElementById('TotFin').value = parseInt(document.getElementById('TotFin').value) - parseInt(document.getElementById('price' + xid).value);
    }
    document.getElementById('tab').removeChild(document.getElementById('line' + xid));

    maxNbLine += 1;
}

$(window).on('load', function() {
    newLine();
})

$('#addLine').on('click', function() {
    newLine();
})