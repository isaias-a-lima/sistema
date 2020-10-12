//PAGAMENTO | Editar
function editarPagamento(idPagamento){
    var idPagamento = idPagamento;    
    var url = '../view/?p=pged&ip=' + idPagamento;
    url += '&t=pgs'
    window.location.href = url;
}

//INTEGRANTE | EXIBIR
function exibirIntegrante(id,idComissao){
    var id = id;
    var idComissao = idComissao;
    var url = '../view/?p=ivis&id=' + id;
    url += '&ic=' + idComissao;
    url += '&t=pgs';
    window.location.href = url;
}