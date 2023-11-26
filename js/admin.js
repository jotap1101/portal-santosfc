var msg = document.getElementById("msg");

var data = new Date();
var hora = data.getHours();
var minuto = data.getMinutes();

if (hora >= 0 && hora < 12) {
    msg.innerHTML = 'Bom Dia';
} else if (hora >= 12 && hora < 18) {
    msg.innerHTML = 'Boa Tarde';
} else if (hora >= 18) {
    msg.innerHTML += 'Boa Noite';
}