<?php

declare(strict_types=1);
require_once './banco/app/classes/conexao.php';

Class Conta {
    
    // Atributo tipo PDO
    private PDO $conexao;

    public function __construct
    (
    
    )
    {
        $this->conexao = Conexao::getConexao();
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