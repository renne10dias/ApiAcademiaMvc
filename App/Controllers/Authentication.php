<?php

namespace App\Controllers;

use App\Services\ClienteService;

header('Content-Type: application/json');
class Authentication{
    
    public function login(){
        http_response_code(200);
        echo json_encode(["status" => "Autenticado"]);
    }


    public function logout(){
        http_response_code(200);
        echo json_encode(["status" => "Autenticado"]);
    }

}