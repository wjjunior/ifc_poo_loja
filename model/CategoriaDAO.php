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
        $sql = "SELECT * FROM categoria ORDER BY id ASC";
        try {
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            // $categorias = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Categoria', ['nome', 'descricao', 'id']);
            $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $categorias;
        } catch (PDOException $e) {
            throw new PDOException($e);
        }
    }

    public function select_id($id)
    {
        $sql = "SELECT * FROM categoria WHERE id = $id ORDER BY nome";
        try {
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            // $categorias = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Categoria', ['nome', 'descricao', 'id']);
            $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $categorias;
        } catch (PDOException $e) {
            throw new PDOException($e);
        }
    }

    public function insert($name, $description)
    {
        $sql = "INSERT INTO categoria (nome, descricao) VALUES (:nome, :descricao)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':nome', $name);
        $stmt->bindParam(':descricao', $description);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id)
    {
        $sql = "SELECT * FROM categoria WHERE id = $id ORDER BY nome";
        try {
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            // $categorias = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Categoria', ['nome', 'descricao', 'id']);
            $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($_POST != null) {
                $name = $_POST['nome'];
                $description = $_POST['descricao'];
                
                $sql = 'UPDATE categoria SET nome = "' . $name . '", descricao = "' . $description . '" WHERE id = "' . $id . '"';
                $stmt = $this->conexao->prepare($sql);
                if ($stmt->execute()) {
                    header("location: index.php");
                    return true;
                } else {
                    return false;
                }
            }

            return $categorias;
        } catch (PDOException $e) {
            throw new PDOException($e);
        }
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM categoria WHERE id = "' . $id . '"';
        try {
            $stmt = $this->conexao->prepare($sql);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            throw new PDOException($e);
        }
    }
}