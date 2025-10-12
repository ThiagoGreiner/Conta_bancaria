<?php

declare(strict_types=1);
require_once './banco/app/classes/conexao.php';

Class Conta {
    
    // Atributo tipo PDO
    protected PDO $conexao;
    protected string $telefone;

    public function __construct
    (
        string $telefone
    )
    {
        $this->conexao = Conexao::getConexao();
        $this->telefone = $telefone;
    }

    // Métodos
    public function listarContas(): void {

        $sql = 'SELECT * FROM conta';

        foreach ($this->conexao->query($sql) as $key => $value) {
            
            echo 'Id: ' . $value['id'] . '<br> Titular: ' . $value['nome_titular'] . '<br> Tipo: ' . $value['tipo'] . '<br> Saldo: ' . $value['saldo'] . '<br> Status: ' . $value['status'] . '<br> Data de Abertura: ' . $value['data_abertura'] . '<br> Data de Encerramento: ' . $value['data_encerramento'] . '<br> Telefone: ' . $value['telefone'] . '<hr>';
        }

    }
}


?>