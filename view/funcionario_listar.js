let btn_busca = document.getElementById('btn_busca');
btn_busca.addEventListener('click', buscar);

function buscar(){
    var input = document.getElementById('busca').value;
    window.location.href="../view/?p=flis&busca="+input;
}

function editar(id){    
    var id = id;
    var form_fed = document.getElementById('form_fed');
    document.getElementById('id').value = id;
    document.getElementById('acao').value = 'editar';
    
    if(id != null && id > 0){        
        form_fed.submit();
    }    
}

function remover(id){    
    var id = id;
    var form_fed = document.getElementById('form_fed');
    var sessao = document.getElementById('sessao').value;
    document.getElementById('id').value = id;
    document.getElementById('acao').value = 'remover';

    if(sessao == id){
        alert("Não é possível remover o usuário que está logado!");
    }else if(id != null && id > 0){  
        let del = confirm("Deseja remover usuário?");
        if(del == true){
            form_fed.submit();
        }        
    }    
}

//Sistema | Incluir Usuário (Funcionário)
var btn_fin = document.getElementById('btn_fin');
btn_fin.addEventListener('click', incluirFuncionario);
function incluirFuncionario(){
    window.location.href='../view/?p=fin';
}