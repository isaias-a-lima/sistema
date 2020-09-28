//PAGAMENTO | Editar
function editarPagamento(idPagamento){
    var idPagamento = idPagamento;    
    var url = '../view/?p=pged&ip=' + idPagamento;
    url += '&t=pgs'
    window.location.href = url;
}