function setDate() {
    const d = new Date();
    $('#date').val(d.getFullYear() + " - " + d.getMonth() + " - " + d.getDate());
}

function setHour() {
    const d = new Date();
    $('#hour').val(d.getHours() + ' : ' + d.getMinutes() + ' : ' + d.getSeconds())
}