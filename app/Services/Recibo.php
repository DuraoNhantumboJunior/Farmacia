<?php
namespace App\Services;

class Recibo
{
    public $numero;
    public $data;
    public $cliente;
    public $valor;
    public $descricao;

    public function __construct($numero, $data, $cliente, $valor, $descricao)
    {
        $this->numero = $numero;
        $this->data = $data;
        $this->cliente = $cliente;
        $this->valor = $valor;
        $this->descricao = $descricao;
    }

    public function formatarValor()
    {
        return number_format($this->valor, 2, ',', '.') . ' MZN';
    }
}

?>