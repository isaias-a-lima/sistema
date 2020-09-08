
//BUSCAR
var btn_busca = document.getElementById('btn_busca');
btn_busca.addEventListener('click', buscarIntegrantes);

var busca = document.getElementById('busca');
busca.addEventListener('keydown', function (event) {
    if (event.keyCode == 13) {
        buscarIntegrantes();
    }
})

function buscarIntegrantes(){
    var input = document.getElementById('busca').value;
    window.location.href="../view/?p=ilis&busca="+input;
}

//EXIBIR INTEGRANTE
function exibirIntegrante(id){
    var id = id;    
    var url = '../view/?p=ivis&id=' + id;    
    window.location.href = url;
}