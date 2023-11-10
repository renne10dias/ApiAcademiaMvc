<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\ClienteService;
use App\Services\UserService;

header('Content-Type: application/json');
class Cliente{
    
    //http://  /cliente/home
    public function home(){
        http_response_code(200);
        echo json_encode(["status" => "Online"]);
    }// Fim da Função



    //http://   /cliente/clientes
    public function clientes(){
        // Crie uma instância do serviço
        $clienteService = new ClienteService();
        // Use o serviço para buscar os clientes
        $clientes = $clienteService->getAllClient();

        // Verifique se há clientes
        if (!empty($clientes)) {
            // Dados encontrados, envie como JSON
            http_response_code(200);
            echo json_encode($clientes);
        } else {
            // Nenhum cliente encontrado
            http_response_code(404);
            echo json_encode(["status" => "error", "message" => "Nenhum cliente encontrado"]);
        }
    }// Fim da Função


    public function allclientes(){
        // Crie uma instância do serviço
        $clienteService = new ClienteService();
        // Use o serviço para buscar os clientes
        $clientes = $clienteService->getAllClientsWithUserData();

        // Verifique se há clientes
        if (!empty($clientes)) {
            // Dados encontrados, envie como JSON
            http_response_code(200);
            echo json_encode(["status" => "success", "data" => $clientes]);
        } else {
            // Nenhum cliente encontrado
            http_response_code(404);
            echo json_encode(["status" => "error", "message" => "Nenhum cliente encontrado"]);
        }
    }// Fim da Função



    public function deleteCliente(){
        // Verifique se a variável ID está presente na URL
        if (isset($_GET['id'])) {
            // Pegue o ID da URL
            $clienteId = $_GET['id'];

            // Agora você tem o $clienteId para usar na exclusão do cliente
            // Chame o serviço para deletar o cliente com base no $clienteId
            $clienteService = new ClienteService();
            $result = $clienteService->deleteClient($clienteId);

            if ($result) {
                // Cliente deletado com sucesso
                http_response_code(200);
                echo json_encode(["status" => "success", "message" => "Cliente deletado com sucesso"]);
            } else {
                // Não foi possível deletar o cliente (por exemplo, cliente não encontrado)
                http_response_code(404);
                echo json_encode(["status" => "error", "message" => "Cliente não encontrado ou não pode ser deletado"]);
            }
        } else {
            // ID não encontrado na URL
            http_response_code(400); // Bad Request
            echo json_encode(["status" => "error", "message" => "ID do cliente não fornecido na URL"]);
        }
    }// Fim da Função



    public function cadastrar(){
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);

            if (!$data) {
                // JSON incorreto
                http_response_code(400); // Código de resposta "Bad Request"
                echo json_encode(["message" => "JSON incorreto na requisição."]);
                return;
            }

            // Verifique se todos os campos necessários estão presentes
            $camposObrigatórios = ['nome', 'email', 'cpf', 'userType', 'endereco'];
            foreach ($camposObrigatórios as $campo) {
                if (!array_key_exists($campo, $data) || empty($data[$campo])) {
                    // Campo em branco
                    http_response_code(400); // Código de resposta "Bad Request"
                    echo json_encode(["message" => "Campo '$campo' em branco ou ausente na requisição."]);
                    return;
                }
            }

            // Dados do cliente
            $nomeCliente = $data['nome'];
            $emailCliente = $data['email'];
            $cpfCliente = $data['cpf'];
            $userTypeCliente = $data['userType'];
            $enderecoCliente = $data['endereco'];

            // Crie uma instância do serviço
            $userService = new UserService();
            // Chame o método para cadastrar o cliente
            $resultado = $userService->cadastrarCliente($nomeCliente, $emailCliente, $cpfCliente, $userTypeCliente, $enderecoCliente);

            if ($resultado === true) {
                // O cadastro foi bem-sucedido
                http_response_code(201); // Código de resposta "Created"
                echo json_encode(["message" => "Cliente cadastrado com sucesso."]);
            } else {
                // O cadastro falhou
                http_response_code(500); // Código de resposta "Internal Server Error"
                echo json_encode(["message" => "Falha no cadastro do cliente: " . $resultado]);
            }
        } else {
            echo json_encode(["message" => "Método HTTP inválido para esta requisição"]);
            http_response_code(405); // Código de resposta "Method Not Allowed"
        }
    }// Fim da Função

    


}