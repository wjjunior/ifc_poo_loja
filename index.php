<?php

require_once "controller/CategoriaController.php";
require_once "controller/ProdutoController.php";

//ROTAS -

if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
} else {
    $acao = 'index';
}

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
};

switch ($acao) {
    case 'index':
        $cat = new CategoriaController();
        $cat->index();
        break;
    case 'view':
        $cat = new CategoriaController();
        $cat->view($id);
        break;
    case 'add':
        $cat = new CategoriaController();
        $cat->add();
        break;
    case 'edit':
        $cat = new CategoriaController();
        $cat->edit($id);
        break;
    case 'delete':
        $cat = new CategoriaController();
        $cat->delete($id);
        break;
}
