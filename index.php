<?php

require_once "controller/CategoriaController.php";
require_once "vendor/autoload.php";

use Valitron\Validator;

if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
} else {
    $acao = 'index';
}

switch ($acao) {
    case 'index':
        $cat = new CategoriaController();
        $cat->principal();
        break;
    case 'detalhes':
        $id = $_GET['id'];
        $cat = new CategoriaController();
        $cat->detalhes($id);
        break;
    case 'incluir':
        $cat = new CategoriaController();
        $cat->incluir();
        break;
    case 'gravaInserir':
        $v = new Validator($_POST);
        $v->rule('required', ['nome', 'descricao']);
        if ($v->validate()) {
            $categoriaNova = new Categoria();
            $categoriaNova->setNome($_POST['nome']);
            $categoriaNova->setDescricao($_POST['descricao']);
            $cat = new CategoriaController();
            $cat->inserir($categoriaNova);
        } else {
            print_r($v->errors());
        }
        break;
    case 'atualizar':
        $id = $_GET['id'];
        $cat = new CategoriaController();
        $cat->atualizar($id);
        break;
    case 'gravaAtualizar':
        $v = new Validator($_POST);
        $v->rule('required', ['nome', 'descricao']);
        if ($v->validate()) {
            $categoriaEdit = new Categoria();
            $categoriaEdit->setId($_POST['id']);
            $categoriaEdit->setNome($_POST['nome']);
            $categoriaEdit->setDescricao($_POST['descricao']);
            $cat = new CategoriaController();
            $cat->gravaAtualizar($categoriaEdit);
        } else {
            print_r($v->errors());
        }
        break;
    case 'excluir':
        $id = $_GET['id'];
        $cat = new CategoriaController();
        $cat->excluir($id);
        break;
    default:
        echo "Ação inválida";
}
