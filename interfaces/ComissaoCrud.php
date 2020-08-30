<?php

namespace interfaces;

interface ComissaoCrud{
    function incluir($dto);
    function editar($dto);
    function remover($id);
    function listar($busca);
    function selecionar($id);
}

?>