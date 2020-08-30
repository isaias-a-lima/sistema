var btn_comin = document.getElementById('btn_comin');
btn_comin.addEventListener('click',incluirComissao);

function incluirComissao(){    
    var valorProjeto = document.getElementById('valorProjeto');
    valorProjeto.addEventListener('keydown',function(e){
        if([69].includes(e.keyCode)){
            e.preventDefault();
        }
    })
    
    document.getElementById('form_comin').submit();
    
}