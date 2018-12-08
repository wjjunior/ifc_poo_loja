<?php

/**
 * Created by PhpStorm.
 * User: speroni
 * Date: 29/09/18
 * Time: 22:24
 *
 * Classe de Acesso a Dados de Categoria - Contem os métodos para manipulacao dos dados
 */

require_once "Categoria.php";
require_once "DAO.php";

class CategoriaDAO extends DAO
{
    public function selectAll()
    {
        $sql = "SELECT * FROM categoria ORDER BY nome";
        try {
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            $categorias = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Categoria', ['nome', 'descricao', 'id']);

            return $categorias;
        } catch (PDOException $e) {
            throw new PDOException($e);
        }
    }

    public function select($id)
    {
        $sql = "SELECT * FROM categoria WHERE id = :valorid ORDER BY nome";
        try {
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':valorid', $id);
            $stmt->execute();
            $categorias = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Categoria', ['nome', 'descricao', 'id']);

            return $categorias;
        } catch (PDOException $e) {
            throw new PDOException($e);
        }
    }

    public function insert($categoria)
    {
       $sql = "INSERT INTO categoria (nome, descricao) VALUES (:nome, :descricao)";
       $stmt = $this->conexao->prepare($sql);
       
       $nome = $categoria->getNome();
       $descricao = $categoria->getDescricao();
       
       $stmt->bindParam(':nome', $nome);
       $stmt->bindParam(':descricao', $descricao);
       try {
           $stmt->execute();
           return true;
        } catch (PDOException $e) {
            throw $e;
            return false;
        }
    }

    public function update($categoria)
    {
        $sql = "UPDATE categoria SET nome = :nome, descricao = :descricao WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);

        $id = $categoria->getId();
        $nome = $categoria->getNome();
        $descricao = $categoria->getDescricao();

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            throw $e;
            return false;
        }
    }

    public function delete($categoria)
    {
        $sql = "DELETE FROM categoria WHERE id = :valorid";
        $stmt = $this->conexao->prepare($sql);

        $id = $categoria->getId();
        $stmt->bindParam(':valorid', $id);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            throw new PDOException($e);
        }
    }
}