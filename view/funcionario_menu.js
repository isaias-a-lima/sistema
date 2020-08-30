//Sistema | Incluir Usuário (Funcionário)
var btn_fin = document.getElementById('btn_fin');
btn_fin.addEventListener('click', incluirFuncionario);
function incluirFuncionario(){
    window.location.href='../view/?p=fin';
}
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