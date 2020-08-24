let btn_fms = document.querySelector('#btn_fms');
btn_fms.addEventListener('click', mudarSenha);

let msg = document.getElementById('msg');

function resetarMsg(){
    msg.className='';
    msg.innerHTML='';
}

function exibirMsg(txt){
    var txt = txt;
    msg.className='alert alert-danger';
    msg.innerHTML=txt;
    setTimeout('resetarMsg()',3000);
}

function mudarSenha(){
    
    let form_fms = document.getElementById('form_fms');
    let senhaAtual = document.querySelector('#senhaAtual').value;
    let senhaNovaA = document.querySelector('#senhaNovaA').value;
    let senhaNovaB = document.querySelector('#senhaNovaB').value;

    if(senhaAtual == '' || senhaNovaA == '' || senhaNovaB == ''){
        exibirMsg('Os campos são obrigatórios!');        
    }else if(senhaAtual == senhaNovaA || senhaAtual == senhaNovaB){
       exibirMsg('A SENHA NOVA deve ser diferente da SENHA ATUAL!');
    }else if(senhaNovaB != senhaNovaA){
        exibirMsg('A CONFIRMAÇÃO DE SENHA deve ser idêntica a SENHA NOVA ')
    }else{
        form_fms.submit();
    }
}