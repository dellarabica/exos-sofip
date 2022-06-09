function showSub(id) {
    var name = "sub" + id;
    if (document.getElementById(name).style.display != "block") {
        document.getElementById(name).style.display = "block";
    }
}

function hideSub(id) {
    if (document.getElementById(id).style.display != "none") {
        document.getElementById(id).style.display = "none";
    }
}