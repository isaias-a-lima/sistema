<?php

namespace interfaces;

interface Crud{
    
    function incluir($dto);

    function editar($dto);

    function remover($id);

    function selecionar($id);

    function listar($busca);

}

?>