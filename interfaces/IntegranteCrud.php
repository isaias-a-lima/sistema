<?php

namespace interfaces;

interface IntegranteCrud{
    function incluir($dto);
    function editar($dto);
    function remover($id);
    function listar($busca);
    function selecionar($id);
}

?>