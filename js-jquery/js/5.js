var winPop;

$('btnCloseMom').click(function() {
        window.opener.close();
    }) //ne fonctionne pas

$('#btnCloseSelf').click(function() {
    window.self.close();
})

$('#panneau').click(function() {
    winPop = open("e5pop.html", "AaAaAaa", 'width=500 , height=500, toolbar=no, location=no, directories=no, status=no, menubar=no, scroolbars=no, resizable=yes, top=300, left=400');
})

$('#btnClosePop').click(function() {
    winPop.focus();
    winPop.close();
})

$('#btnMovePop').click(function() {
    winPop.focus();
    winPop.moveBy(200, 0);
})

$('#btnRedPop').click(function() {
        winPop.focus();
        winPop.resizeBy(-300, -300);
    }) //not working