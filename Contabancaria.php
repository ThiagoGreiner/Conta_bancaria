<?php

declare (strict_types=1);
date_default_timezone_set("America/Sao_Paulo");

// Classe
class ContaBancaria {

    // Atributos
    private string $banco;
    private string $nomeTitular;
    private string $numeroAgencia;
    private string $numeroConta;
    private float $saldo;

    // Construtor
    public function __construct (
        string $banco,
        string $titular,
        string $agencia,
        string $conta,
        float $saldo
    )
    {
        $this->banco = $banco;
        $this->nomeTitular = $titular;
        $this->numeroAgencia = $agencia;
        $this->numeroConta = $conta;
        $this->saldo = $saldo;
    }

    // Get mostra saldo
    public function obterSaldo (): string {
        return "Seu saldo é: R$" . $this->saldo;
    }

    // Get depositar
    public function depositar (float $valor): string {
        $this->saldo += $valor;
        return "Deposito de R$" . $valor . " realizado";
    }

    // Ger sacando
    public function sacar (float $valor): string {
        $this->saldo -= $valor;
        return "Saque de R$" . $valor . " realizado as " . date("d/m/Y H:i:s");
    }
}

// Objetos
$conta = new ContaBancaria(
    "Banco do Brasil",
    "Thiago Greiner",
    "4826",
    "57354-10",
    400.00
);

// Visualizando saldo da conta
var_dump($conta->obterSaldo());

// Quebra de linha
echo PHP_EOL;

// Depositando
var_dump($conta->depositar(100));

// Quebra de linha
echo PHP_EOL;

// Visualizando saldo da conta
var_dump($conta->obterSaldo());

// Quebra de linha
echo PHP_EOL;

// Sacando
var_dump($conta->sacar(200));

// Quebra de linha
echo PHP_EOL;

// Visualizando saldo da conta
var_dump($conta->obterSaldo());

?>