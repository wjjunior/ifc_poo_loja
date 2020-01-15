<?php

require_once "controller/CategoriaController.php";
require_once "controller/ProductController.php";
require_once "vendor/autoload.php";

use Valitron\Validator;

if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
} elseif (isset($_GET['product'])) {
    $acao = $_GET['product'];
} else {
    $acao = 'index';
}

if (isset($_GET['product'])) {
    switch ($acao) {
        case 'listar':
            $product = new ProductController();
            $product->principal();
            break;
        case 'detalhes':
            $product = new ProductController();
            $product->detalhes($_GET['id']);
            break;
        case 'incluir':
            $product = new ProductController();
            $product->incluir();
            break;
        case 'gravaInserir':
            $product = new ProductController();
            $product->inserir($_POST);
            break;
        case 'excluir':
            $product = new ProductController();
            $product->excluir($_GET['id']);
            break;
        case 'atualizar':
            $product = new ProductController();
            $product->atualizar($_GET['id']);
            break;
        case 'gravaAtualizar':
            $product = new ProductController();
            $product->gravaAtualizar($_POST);
            break;
        default:
            echo "Ação inválida";
    }
} else {
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
}
