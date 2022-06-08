function changeImage() {
    var imgId = document.getElementById("amp");
    if (imgId.src.match("img/AmpouleHS.GIF")) {
        imgId.src = "img/AmpouleOK.GIF";
    } else {
        imgId.src = "img/AmpouleHS.GIF";
    }
}