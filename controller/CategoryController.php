<?php

require_once "model/CategoryDAO.php";
require_once "model/Category.php";
require_once "view/View.php";

use Valitron\Validator;

class CategoryController
{
    private $data;

    public function index()
    {
        $this->data = array();
        $catdao = new CategoryDAO();

        try {
            $categories = $catdao->selectAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $this->data['categories'] = $categories;

        View::load('view/template/header.html');
        View::load('view/category/index.php', $this->data);
        View::load('view/template/footer.html');
    }

    public function show($id)
    {
        $this->data = array();
        $catdao = new CategoryDAO();

        try {
            $categories = $catdao->select($id);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $this->data['categories'] = $categories;

        View::load('view/template/header.html');
        View::load('view/category/show.php', $this->data);
        View::load('view/template/footer.html');
    }

    public function create()
    {
        View::load('view/template/header.html');
        View::load('view/category/create.html');
        View::load('view/template/footer.html');
    }

    public function store($data)
    {
        try {
            $v = new Validator($data);
            $v->rule('required', ['name', 'description']);
            if ($v->validate()) {
                $categoryNova = new Category();
                $categoryNova->setName($data['name']);
                $categoryNova->setDescription($data['description']);
                $catdao = new CategoryDAO();
                $catdao->insert($categoryNova);
                header('location: index.php?category=index');
            } else {
                print_r($v->errors());
            }
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function edit($id)
    {
        $this->data = array();
        $catdao = new CategoryDAO();

        try {
            $categories = $catdao->select($id);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $this->data['categories'] = $categories;

        View::load('view/template/header.html');
        View::load('view/category/edit.php', $this->data);
        View::load('view/template/footer.html');
    }

    public function update($category)
    {
        try {
            $v = new Validator($_POST);
            $v->rule('required', ['name', 'description']);
            if ($v->validate()) {
                $categoryEdit = new Category();
                $categoryEdit->setId($_POST['id']);
                $categoryEdit->setName($_POST['name']);
                $categoryEdit->setDescription($_POST['description']);
                $catdao = new CategoryDAO();
                $catdao->update($category);
                header('location: index.php?category=index');
            } else {
                print_r($v->errors());
            }
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $catdao = new CategoryDAO();
        try {
            $catdao->delete($id);
            header('location: index.php?category=index');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
