
var btn_fin = document.getElementById('btn_fin');
btn_fin.addEventListener('click', incluirFuncionario);
function incluirFuncionario(){
    window.location.href='../view/?p=fin';
}

var btn_flis = document.getElementById('btn_flis');
btn_flis.addEventListener('click', listarFuncionarios);
function listarFuncionarios(){
    window.location.href='../view/?p=flis';
}