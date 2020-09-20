
// MODAL
var myModal = document.getElementById('myModal');
var myModal2 = document.getElementById('myModal2');
var myModal3 = document.getElementById('myModal3');
function chamaModal(total, cont, msg) {
    var total = total;
    var cont = cont;
    var msg = msg;

    var percentual = (total / 100) * cont;

    myModal.style.display = "block";
    myModal3.innerHTML = msg;
    myModal3.style.width = percentual;

}

function fechaModal() {
    myModal.style.display = "none";
}