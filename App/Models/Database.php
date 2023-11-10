<?php

namespace App\Models;

class Database
{
    protected $connection;

    public function __construct()
    {
        $configFilePath = __DIR__ . '/../../config/database.php';

        if (file_exists($configFilePath)) {
            $config = require_once($configFilePath);

            $dsn = "mysql:host={$config['host']};dbname={$config['database']}";

            try {
                $this->connection = new \PDO($dsn, $config['username'], $config['password']);
                $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                die('Erro de conexão com o banco de dados: ' . $e->getMessage());
            }
        } else {
            die('Arquivo de configuração do banco de dados não encontrado.');
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
