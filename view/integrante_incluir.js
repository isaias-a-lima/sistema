var nome = document.getElementById('nome');
nome.addEventListener('change',gerarSenha);


function gerarSenha(){
    var senha = document.getElementById('senha');
    var iniciais = nome.value.split(' ');
    var senhaGerada = '';
    for(var letra of iniciais){
        var numero = Math.round(Math.random() * 9.99);
        letra = letra.substring(0,1);
        senhaGerada += letra + numero;
    }
    if(senhaGerada.length > 1){
        senha.value = senhaGerada;
    }
    
}