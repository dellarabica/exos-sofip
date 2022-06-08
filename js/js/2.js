function setDate() {
    const d = new Date();
    var month = d.getMonth();
    var year = d.getFullYear();
    var day = d.getDate();

    var fullDate = year + " - " + month + " - " + day;
    document.getElementById('date').value = fullDate;
}

function setHour() {
    const d = new Date();
    var hour = d.getHours();
    var min = d.getMinutes();

    var fullHour = hour + " : " + min;
    document.getElementById('hour').value = fullHour;
}