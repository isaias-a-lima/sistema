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

//INTEGRANTE | ENVIAR LINK
var btn_el = document.getElementById('btn_el');
btn_el.addEventListener('click',function(){
    var id = document.getElementById('idIntegrante').value;
    var idComissao = document.getElementById('idComissao').value;
    var url = '../view/?p=el&id=' + id;
    url += '&ic=' + idComissao;
    url += '&t=ivis'
    window.location.href = url;
});

//INTEGRANTE | VER LINK
function verLink(id){
    var id = id;
    var url = '../view/?p=lv&id=' + id;    
    url += '&t=ivis'
    window.location.href = url;
}