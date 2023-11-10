<?php
namespace App\Models;

class User extends Client
{
    private $id;
    private $nome;
    private $email;
    private $cpf;
    private $userType;
    private $foto;

    // Getter para o atributo 'id'
    public function getId()
    {
        return $this->id;
    }

    // Setter para o atributo 'id'
    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter para o atributo 'nome'
    public function getNome()
    {
        return $this->nome;
    }

    // Setter para o atributo 'nome'
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    // Getter para o atributo 'email'
    public function getEmail()
    {
        return $this->email;
    }

    // Setter para o atributo 'email'
    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Getter para o atributo 'cpf'
    public function getCpf()
    {
        return $this->cpf;
    }

    // Setter para o atributo 'cpf'
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    // Getter para o atributo 'userType'
    public function getUserType()
    {
        return $this->userType;
    }

    // Setter para o atributo 'userType'
    public function setUserType($userType)
    {
        $this->userType = $userType;
    }

    // Getter para o atributo 'foto'
    public function getFoto()
    {
        return $this->foto;
    }

    // Setter para o atributo 'foto'
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }
}

