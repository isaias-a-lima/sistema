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