<?php

declare(strict_types=1);
require_once __DIR__ . '/conta.php';

class ContaPJ extends Conta {
    private string $razaoSocial;
    private string $cnpj;

    // Não obrigatório
    private ?string $nomeFantasia;

    public function __construct
    (
        string $razaoSocial,
        string $cnpj,
        ?string $nomeFantasia,
        string $telefone
    )
    {
        parent::__construct($telefone);
        $this->razaoSocial = $razaoSocial;
        $this->cnpj = $cnpj;
        $this->nomeFantasia = $nomeFantasia;
    }

    
}
