<?php

namespace App\Services;

use App\Models\Database;
use App\Models\User;

class UserService
{
    protected $db;


    // Método Construtor
    public function __construct(){
        $this->db = new Database();
    }




    public function cadastrarCliente($nome, $email, $cpf, $userType, $endereco){
        $connection = $this->db->getConnection();
        // Iniciar a transação
        $connection->beginTransaction();

        try {
            // Criando uma instância da classe User
            $user = new User();

            // Define os valores para os atributos do objeto User
            $user->setNome($nome);
            $user->setEmail($email);
            $user->setCpf($cpf);
            $user->setUserType($userType);
            // Dados do Cliente
            $user->setEndereco($endereco);

            // Use consultas preparadas para inserir os dados na tabela tb_usuario
            $queryUsuario = "INSERT INTO tb_usuario (nome, email, cpf, userType) VALUES (?, ?, ?, ?)";
            $stmtUsuario = $connection->prepare($queryUsuario);
            $stmtUsuario->execute([$user->getNome(), $user->getEmail(), $user->getCpf(), $user->getUserType()]);

            // Observe que a consulta acima é para a tabela 'tb_usuario'.

            // Recupere o ID do usuário inserido
            $usuarioID = $connection->lastInsertId();

            // Use consultas preparadas para inserir os dados na tabela tb_cliente
            $queryCliente = "INSERT INTO tb_cliente (endereco, dataNascimento, turno, valorMensalidade, dataVencimento, statusCliente, tb_usuario_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmtCliente = $connection->prepare($queryCliente);
            $stmtCliente->execute([$user->getEndereco(), 'dataNascimento', 'turno', 'valorMensalidade', 'dataVencimento', 'statusCliente', $usuarioID]);
            // Confirmar a transação
            $connection->commit();
            // Agora você tem os dados inseridos nas tabelas tb_usuario e tb_cliente.
            return true;

        } catch (\PDOException $e) {
            // Caso ocorra algum erro, reverter a transação
            $connection->rollback();
            return $e->getMessage();
        }
    }// Fim da função



 


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



}
