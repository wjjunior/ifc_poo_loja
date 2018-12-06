<?php

// altera o cabecalho HTTP para dizer que o conteúdo é JSON
header('Content-type:application/json');

// vai usar o CategoriaDAO.php
require_once "../../model/CategoriaDAO.php";

// cria uma instância do CategoriaDAO
$dao = new CategoriaDAO();

// faz a consulta e guarda o array com os dados em $categorias
$resultadocats = $dao->selectAll();
// print_r($resultadocats);

/*
 * como o array retornado contem objetos, e estes objetos têm atributos privados, precisamos percorrê-los
 * para usar os métodos getId(), getNome() e getDescricao().
 */
$arCats = array();
foreach ($resultadocats as $itemcat) {
    $categoria = ['id' => $itemcat['id'], 'nome' => $itemcat['nome'], 'descricao' => $itemcat['descricao']];
    $categorias[] = $categoria;
}

// print_r($categorias);
echo json_encode($categorias);