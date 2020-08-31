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