<?php
/**
 * Created by PhpStorm.
 * User: speroni
 * Date: 30/09/18
 * Time: 14:45
 */

require_once "model/CategoriaDAO.php";
require_once "model/Categoria.php";
require_once "view/View.php";

class ProdutoController
{

    public function cad_produtos() {
        // echo 'cadastrou';die;
        View::carregar('view/template/cabecalho.html');
        View::carregar('view/produto/cad_produtos.php');
        View::carregar('view/template/rodape.html');
    }
}