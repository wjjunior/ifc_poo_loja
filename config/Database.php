<?php
class Database
{
    const HOST = 'localhost';
    const DATABASE = 'loja';
    const USER = 'seller';
    const PASSWORD = '123456';

    public static $conexao;

    public static function getConexao()
    {
        $dsn = 'mysql://host='.self::HOST.';dbname='.self::DATABASE.';charset=utf8';
        try {
            self::$conexao = new PDO($dsn, self::USER, self::PASSWORD);
            self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$conexao;
        } catch (PDOException $e) {
            throw new PDOException($e);
        }
    }
}