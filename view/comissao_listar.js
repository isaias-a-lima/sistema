//COMISSÃO | Busca Comissões
var btn_busca = document.getElementById('btn_busca');
btn_busca.addEventListener('click', buscarComissões);

var busca = document.getElementById('busca');
busca.addEventListener('keydown', function (event) {
    if (event.keyCode == 13) {
        buscarComissões();
    }
})
function buscarComissões() {
    var keyWord = busca.value;
    window.location.href = '../view/?p=comlis&busca=' + keyWord;
}

//COMISSÃO | Editar
function editar(id) {
    var id = id;
    document.getElementById('id').value = id;
    document.getElementById('acao').value = 'Editar';
    var form_comed = document.getElementById('form_comed');
    if (id == null || id == '') {
        alert('Nenhuma comissão foi selecionada!');
    }
    form_comed.submit();
}

//COMISSÃO | Cancelar
function cancelar(id) {
    var id = id;
    document.getElementById('id').value = id;
    document.getElementById('acao').value = 'Cancelar';
    var form_comed = document.getElementById('form_comed');
    if (id == null || id == '') {
        alert('Nenhuma comissão foi selecionada!');
    }
    let del = confirm("Deseja cancelar Comissão?");
    if (del == true) {
        form_fed.submit();
    }    
}

//COMISSÃO | Visão
function visao(id){
    var id = id;
    window.location.href="../view/?p=comvis&id="+id;
}

//Comissão | Incluir
var btn_comin = document.getElementById('btn_comin');
btn_comin.addEventListener('click', incluirComissao);
function incluirComissao(){
    window.location.href='../view/?p=comin';
}