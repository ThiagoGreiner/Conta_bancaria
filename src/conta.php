<?php

declare(strict_types=1);

Class Conta {
    
    private $conexao;

    public function __construct
    (

    )
    {
        // Criando coxeção com BD
        try {

            $this->conexao = new PDO("mysql:host=localhost;dbname=banco", "root", "");

        } catch(Exception $e) {
            
            echo $e->getMessage();
            die();
        }
        
    }

    // Métodos
    public function contas() {

        $sql = 'SELECT * FROM conta';

        foreach ($this->conexao->query($sql) as $key => $value) {
            
            echo 'Id: ' . $value['id'] . '<br> Titular: ' . $value['nome_titular'] . '<br> Tipo: ' . $value['tipo'] . '<br> Saldo: ' . $value['saldo'] . '<br> Status: ' . $value['status'] . '<br> Data de Abertura: ' . $value['data_abertura'] . '<br> Data de Encerramento: ' . $value['data_encerramento'] . '<br> Telefone: ' . $value['telefone'] . '<hr>';
        }

    }




}


?>