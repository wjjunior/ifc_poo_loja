<?php

/**
 * RECEBE NOME E DESCRICAO NUM JSON
 * E PRECISA INSERIR NO BANCO DE DADOS
 */
require_once "../../model/Categoria.php";
require_once "../../model/CategoriaDAO.php";

// PEGO O JSON EM TEXTO, COMO CHEGOU
$dados_recebidos = file_get_contents('php://input');

// TRANSFORMO O TEXTO EM UM ARRAY
$dados = json_decode($dados_recebidos, true);

$id = $dados['id'];
$categoria = new Categoria($id);
$catdao = new CategoriaDAO();

if ($catdao->delete($categoria)) {
    header('HTTP/1.1 201 Created');
    header('Content-type: application/json');
    echo json_encode(['msg'=>'Categoria deletada com sucesso.']);
} else {
    header('Content-type: application/json');
    echo json_encode(['msg'=>'Erro ao deletar categoria!!']);
}