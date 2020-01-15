<?php

require_once "Product.php";
require_once "DAO.php";

class ProductDAO extends DAO
{
    public function selectAll()
    {
        $sql = "SELECT * FROM produto ORDER BY id";
        try {
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            $produtos = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Product', ['nome', 'descricao', 'foto', 'preco', 'id_categoria', 'id']);

            return $produtos;
        } catch (PDOException $e) {
            throw new PDOException($e);
        }
    }

    public function select($id)
    {
        $sql = "SELECT * FROM produto WHERE id = :valorid ORDER BY nome";
        try {
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':valorid', $id);
            $stmt->execute();
            $produtos = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Product', ['nome', 'descricao', 'foto', 'preco', 'id_categoria', 'id']);

            return $produtos;
        } catch (PDOException $e) {
            throw new PDOException($e);
        }
    }

    public function insert($produto)
    {
        $sql = "INSERT INTO produto (nome, descricao, foto, preco, id_categoria) VALUES (:nome, :descricao, :foto, :preco, :id_categoria)";
        $stmt = $this->conexao->prepare($sql);

        $nome = $produto->getNome();
        $descricao = $produto->getDescricao();
        $foto = $produto->getFoto();
        $preco = $produto->getPreco();
        $id_categoria = $produto->getIdCategoria();

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':foto', $foto);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':id_categoria', $id_categoria);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            throw $e;
            return false;
        }
    }

    public function update($produto)
    {
        $sql = "UPDATE produto SET nome = :nome, descricao = :descricao, foto = :foto, preco = :preco, id_categoria = :id_categoria WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);

        $id = $produto->getId();
        $nome = $produto->getNome();
        $descricao = $produto->getDescricao();
        $foto = $produto->getFoto();
        $preco = $produto->getPreco();
        $id_categoria = $produto->getIdCategoria();

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':foto', $foto);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':id_categoria', $id_categoria);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            throw $e;
            return false;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM produto WHERE id = :valorid";
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindParam(':valorid', $id);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            throw new PDOException($e);
        }
    }
}
