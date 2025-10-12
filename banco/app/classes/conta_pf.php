<?php

declare(strict_types=1);
require_once './banco/app/classes/Conta.php';

class ContaPF extends Conta
{
    private string $nomeCompleto;
    private string $cpf;
    private string $dataNascimento;

    public function __construct
    (
        string $nomeCompleto,
        string $cpf,
        string $dataNascimento,
        string $telefone
    )
    {
        // Chamando o construtor da classe Conta
        parent::__construct($telefone);

        $this->nomeCompleto = $nomeCompleto;
        $this->cpf = $cpf;
        $this->dataNascimento = $dataNascimento;
    }

}
