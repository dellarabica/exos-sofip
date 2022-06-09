$('div.main').mouseover(function() {
    if ($('#sub' + this.id).css("display") != "block") {
        $('#sub' + this.id).css("display", "block");
    }
})

$('div.sub').click(function() {
    if ($('#' + this.id).css("display") != "none") {
        $('#' + this.id).css("display", "none");
    }
})