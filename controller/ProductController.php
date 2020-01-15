<?php

require_once "model/ProductDAO.php";
require_once "model/Product.php";
require_once "model/Categoria.php";
require_once "view/View.php";

use Valitron\Validator;

class ProductController
{
    private $dados;

    public function principal()
    {
        $this->dados = array();
        $prodDAO = new ProductDAO();

        try {
            $products = $prodDAO->selectAll();
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }

        $this->dados['products'] = $products;

        View::carregar('view/template/cabecalho.html');
        View::carregar('view/product/listar.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

    public function detalhes($id)
    {
        $this->dados = array();
        $prodDAO = new ProductDAO();

        try {
            $products = $prodDAO->select($id);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }

        $this->dados['products'] = $products;

        View::carregar('view/template/cabecalho.html');
        View::carregar('view/product/detalhes.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

    public function incluir()
    {
        $this->dados = [];
        $catDAO = new CategoriaDAO;

        try {
            $categories = $catDAO->selectAll();
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
        $this->dados['categories'] =  $categories;
        View::carregar('view/template/cabecalho.html');
        View::carregar('view/product/incluir.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

    public function inserir($data)
    {
        try {
            $prodDAO = new ProductDAO();
            $v = new Validator($data);
            $v->rule('required', ['nome', 'descricao', 'preco', 'categoria']);
            if ($v->validate()) {
                $newProduct = new Product();
                $newProduct->setNome($data['nome']);
                $newProduct->setDescricao($data['descricao']);
                $newProduct->setFoto($data['foto']);
                $newProduct->setPreco($data['preco']);
                $newProduct->setIdCategoria($data['categoria']);
                $prodDAO->insert($newProduct);
                header('location: index.php?product=listar');
            } else {
                print_r($v->errors());
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function atualizar($id)
    {
        $this->dados = array();
        $prodDAO = new ProductDAO();
        $catDAO = new CategoriaDAO;

        try {
            $products = $prodDAO->select($id);
            $categories = $catDAO->selectAll();
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }

        $this->dados['products'] = $products;
        $this->dados['categories'] =  $categories;


        View::carregar('view/template/cabecalho.html');
        View::carregar('view/product/atualizar.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

    public function gravaAtualizar($data)
    {
        
        try {
            $prodDAO = new ProductDAO();
            $v = new Validator($data);
            $v->rule('required', ['nome', 'descricao', 'preco', 'categoria']);
            if ($v->validate()) {
                $product = new Product();
                $product->setId($data['id']);
                $product->setNome($data['nome']);
                $product->setDescricao($data['descricao']);
                $product->setFoto($data['foto']);
                $product->setPreco($data['preco']);
                $product->setIdCategoria($data['categoria']);
                $prodDAO->update($product);
                header('location: index.php?product=listar');
            } else {
                print_r($v->errors());
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function excluir($id)
    {
        $prodDAO = new ProductDAO();
        try {
            $prodDAO->delete($id);
            header('location: index.php?product=listar');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
