<?php

namespace App\Services;

use App\Models\Database;

class ClienteService
{
    protected $db;

    public function __construct(){
        $this->db = new Database();
    }


    public function getAllClient(){
        $connection = $this->db->getConnection();
        
        $query = "SELECT * FROM tb_cliente";
        $statement = $connection->query($query);

        if ($statement) {
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }




    public function getAllClientsWithUserData(){
        $connection = $this->db->getConnection();
        
        // Execute uma consulta SQL com JOIN para obter dados de ambas as tabelas
        $query = "SELECT 
                     c.*, u.nome, u.email, u.cpf, u.userType, u.foto
                  FROM tb_cliente c
                  INNER JOIN tb_usuario u ON c.tb_usuario_id = u.id";

        $statement = $connection->query($query);

        // Recupere todos os resultados
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

        // Retorne os resultados
        return $results;
    }


    public function deleteClient($clienteId){

        $pdo = $this->db->getConnection(); // $this->db deve ser uma instância do PDO

        try {
            $pdo->beginTransaction(); // Inicie a transação

            // Exclua todos os registros de pagamento associados ao cliente
            $queryExcluirPagamentos = "DELETE FROM tb_pagamento WHERE tb_cliente_id = ?";
            $stmtPagamentos = $pdo->prepare($queryExcluirPagamentos);
            $stmtPagamentos->execute([$clienteId]);

            // Exclua o cliente
            $queryExcluirCliente = "DELETE FROM tb_cliente WHERE id = ?";
            $stmtCliente = $pdo->prepare($queryExcluirCliente);
            $stmtCliente->execute([$clienteId]);

            $pdo->commit(); // Confirme a transação

            return true;
        } catch (\PDOException $e) {
            $pdo->rollBack(); // Em caso de erro, reverta a transação
            return false;
        }
    }



    




}
