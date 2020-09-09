//INTEGRANTE | EDITAR
var btn_ied = document.getElementById('btn_ied');
btn_ied.addEventListener('click',function(){
    var id = document.getElementById('idIntegrante').value;
    var idComissao = document.getElementById('idComissao').value;
    var url = '../view/?p=ied&id=' + id;
    url += '&ic=' + idComissao;
    url += '&t=ivis'
    window.location.href = url;
});