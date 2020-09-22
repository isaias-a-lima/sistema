
// Sistema | Consultar Usuários (Funcionários)
var btn_flis = document.getElementById('btn_flis');
btn_flis.addEventListener('click', listarFuncionarios);
function listarFuncionarios(){
    window.location.href='../view/?p=flis';
}

//Comissão | Incluir
var btn_comin = document.getElementById('btn_comin');
btn_comin.addEventListener('click', incluirComissao);
function incluirComissao(){
    window.location.href='../view/?p=comin';
}
//Comissão | Consultar
var btn_comlis = document.getElementById('btn_comlis');
btn_comlis.addEventListener('click',listarComissoes);
function listarComissoes(){
    window.location.href='../view/?p=comlis';
}

//Empresa | Visualizar
var btn_em = document.getElementById('btn_em');
btn_em.addEventListener('click', function(){
    window.location.href='../view/?p=em';
});

var btn_ilis = document.getElementById('btn_ilis');
btn_ilis.addEventListener('click',function(){
    window.location.href='../view/?p=ilis';
});

//PAGAMENTO | CONSULTAR
var btn_pgs = document.getElementById("btn_pgs");
btn_pgs.addEventListener("click",function(){
    var url = '../view/?p=pgs';    
    url += '&t=m'
    window.location.href = url;
});
