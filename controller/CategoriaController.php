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

class CategoriaController
{
    private $dados;

    public function index()
    {
        $this->dados = array();
        $catdao = new CategoriaDAO();

        try {
            $categorias = $catdao->selectAll();
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }

        $this->dados['categorias'] = $categorias;

        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/list.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

    public function view($id)
    {
        $this->dados = array();
        $catdao = new CategoriaDAO();

        try {
            $categorias = $catdao->select_id($id);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }

        $this->dados['categorias'] = $categorias;

        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/view.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

    public function add()
    {
        if ($_POST != NULL) {
            $this->dados = array();
            $catdao = new CategoriaDAO();

            $name = $_POST['nome'];
            $description = $_POST['descricao'];

            try {
                $categorias = $catdao->insert($name,$description);
                header("location: index.php");
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        
        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/add.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

    public function edit($id)
    {
        $this->dados = array();
        $catdao = new CategoriaDAO();

        try {
            $categorias = $catdao->update($id);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }

        $this->dados['categorias'] = $categorias;

        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/edit.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

    public function delete($id)
    {
        $this->dados = array();
        $catdao = new CategoriaDAO();

        try {
            $categorias = $catdao->delete($id);
            header("location: index.php");
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}