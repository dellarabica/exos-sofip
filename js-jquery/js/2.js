$('#btnDate').click(function() {
    const d = new Date();
    $('#date').val(d.getFullYear() + " - " + d.getMonth() + " - " + d.getDate());
})

$('#btnHour').click(function() {
    const d = new Date();
    $('#hour').val(d.getHours() + ' : ' + d.getMinutes() + ' : ' + d.getSeconds())
})