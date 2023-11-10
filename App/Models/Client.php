<?php

namespace App\Models;

class Client
{
    private $id;
    private $endereco;
    private $dataNascimento;
    private $turno;
    private $valorMensalidade;
    private $dataVencimento;
    private $statusCliente;
    private $horario;
    private $usuarioId;

    // Getter para $id
    public function getId()
    {
        return $this->id;
    }

    // Setter para $id
    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter para $endereco
    public function getEndereco()
    {
        return $this->endereco;
    }

    // Setter para $endereco
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    // Getter para $dataNascimento
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    // Setter para $dataNascimento
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    // Getter para $turno
    public function getTurno()
    {
        return $this->turno;
    }

    // Setter para $turno
    public function setTurno($turno)
    {
        $this->turno = $turno;
    }

    // Getter para $valorMensalidade
    public function getValorMensalidade()
    {
        return $this->valorMensalidade;
    }

    // Setter para $valorMensalidade
    public function setValorMensalidade($valorMensalidade)
    {
        $this->valorMensalidade = $valorMensalidade;
    }

    // Getter para $dataVencimento
    public function getDataVencimento()
    {
        return $this->dataVencimento;
    }

    // Setter para $dataVencimento
    public function setDataVencimento($dataVencimento)
    {
        $this->dataVencimento = $dataVencimento;
    }

    // Getter para $statusCliente
    public function getStatusCliente()
    {
        return $this->statusCliente;
    }

    // Setter para $statusCliente
    public function setStatusCliente($statusCliente)
    {
        $this->statusCliente = $statusCliente;
    }

    // Getter para $horario
    public function getHorario()
    {
        return $this->horario;
    }

    // Setter para $horario
    public function setHorario($horario)
    {
        $this->horario = $horario;
    }

    // Getter para $usuarioId
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    // Setter para $usuarioId
    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;
    }
}
 
