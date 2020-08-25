var btn_fms = document.querySelector('#btn_fms');
btn_fms.addEventListener('click', mudarSenha);

function mudarSenha(){
    var confirmar = confirm("Ao alterar a senha você terá que logar novamente!\n Você confirma?");
    if(confirmar){
        window.location.href="../view/?p=fms";
    }
}

var btn_fad = document.getElementById('btn_fad');
btn_fad.addEventListener('click',alterarDados);

function alterarDados(){
    window.location.href="../view/?p=fad";
}