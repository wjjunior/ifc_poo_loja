<?php

require_once "controller/CategoriaController.php";

if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
} else {
    $acao = 'index';
}

switch ($acao) {
    case 'index':
        $cat = new CategoriaController();
        $cat->principal();
        exit;
    case 'detalhes':
        $id = $_GET['id'];
        $cat = new CategoriaController();
        $cat->detalhes($id);
        exit;
    case 'incluir':
        $cat = new CategoriaController();
        $cat->incluir();
        exit;
    case 'gravaInserir':
        $categoriaNova = new Categoria();
        $categoriaNova->setNome($_POST['nome']);
        $categoriaNova->setDescricao($_POST['descricao']);
        $cat = new CategoriaController();
        $cat->inserir($categoriaNova);
        exit;
    case 'atualizar':
        $id = $_GET['id'];
        $cat = new CategoriaController();
        $cat->atualizar($id);
        exit;
    case 'gravaAtualizar':
        $categoriaNova = new Categoria();
        $categoriaNova->setId($_POST['id']);
        $categoriaNova->setNome($_POST['nome']);
        $categoriaNova->setDescricao($_POST['descricao']);
        $cat = new CategoriaController();
        $cat->gravaAtualizar($categoriaNova);
        exit;
    case 'excluir':
        $id = $_GET['id'];
        $cat = new CategoriaController();
        $cat->excluir($id);
        exit;
    default:
        echo "Ação inválida";
}




