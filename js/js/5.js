var winPop;

function openPopup() {
    winPop = window.open("e5pop.html", "AaAaAaa", 'width=250 , height=200, toolbar=no, location=no, directories=no, status=no, menubar=no, scroolbars=no, resizable=no, top=300, left=400');
}

function closePopup() {
    winPop.close();
}

function movePopup() {
    winPop.focus();
    winPop.moveBy(100, 0);
}

function reducePopup() {
    var largeur = (winPop.document.body.offsetWidth / 5) * 4;
    var hauteur = (winPop.document.body.offsetHeight / 5) * 4;
    winPop.resizeTo(largeur, hauteur);
    winPop.focus();
} //ne fonctionne pas

function closeMain() {
    window.opener.close(); //ne fonctionne pas
}

function closePop() {
    window.self.close();
}