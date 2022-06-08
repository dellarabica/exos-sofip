function changeImage() {
    if ($('#amp').attr('src').includes('HS')) {
        $('#amp').attr('src', "img/AmpouleOK.GIF");
    } else {
        $('#amp').attr('src', "img/AmpouleHS.GIF");
    }
}