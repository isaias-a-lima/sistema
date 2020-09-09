//COMISSÃO | Editar
function editar(id) {
    var id = id;
    document.getElementById('id').value = id;
    document.getElementById('acao').value = 'Editar';
    var form_comvis = document.getElementById('form_comvis');
    if (id == null || id == '') {
        alert('Nenhuma comissão foi selecionada!');
    }
    form_comvis.submit();
}

//COMISSÃO | Cancelar
function cancelar(id) {
    var id = id;
    document.getElementById('id').value = id;
    document.getElementById('acao').value = 'Cancelar';
    var form_comvis = document.getElementById('form_comvis');
    if (id == null || id == '') {
        alert('Nenhuma comissão foi selecionada!');
    }else{
        var cancel = confirm('Cancelar comissão!\nVocê confirma?');
        if(cancel == true){
            form_comvis.submit();
        }
    }
}

//INTEGRANTES | INCLUIR
var btn_iin = document.getElementById('btn_iin');
btn_iin.addEventListener('click', incluirIntegrante);
function incluirIntegrante(){
    var idComissao = document.getElementById('idComissao').value;
    window.location.href='../view/?p=iin&t=comvis&ic='+idComissao;
}

//INTEGRANTE | EXIBIR
function exibirIntegrante(id,idComissao){
    var id = id;
    var idComissao = idComissao;
    var url = '../view/?p=ivis&id=' + id;
    url += '&ic=' + idComissao;
    window.location.href = url;
}

//INTEGRANTE | EDITAR
function editarIntegrante(id,idComissao){
    var id = id;
    var idComissao = idComissao;
    var url = '../view/?p=ied&id=' + id;
    url += '&ic=' + idComissao;
    url += '&t=comvis'
    window.location.href = url;
}