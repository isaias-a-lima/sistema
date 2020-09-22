<?php

namespace interfaces;

interface PagamentoCrud{
    
    function incluir($dto);

    function editar($dto);

    function remover($id);

    function selecionar($id);

    function listar($dtVencInicio,$dtVencFim,$statusPagamento);

}

?>