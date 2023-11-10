<?php

namespace App\Controllers;

use App\Services\ClienteService;

header('Content-Type: application/json');
class Usuario{
    
    public function home(){
        http_response_code(200);
        echo json_encode(["status" => "Online"]);
    }


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
    }


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
    }



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
    }

    


}