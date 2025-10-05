<?php

declare(strict_types=1);

Class Conta {
    
    private $conexao;

    public function __construct
    (

    )
    {
        try {

            $this->conexao = new PDO("mysql:host=localhost;dbname=banco", "root", "");

        } catch(Exception $e) {
            
            echo $e->getMessage();
            die();
        }
        
    }

    // Métodos
    public function contas() {

        $sql = 'SELECT * FROM produtos';

        foreach ($this->conexao->query($sql) as $key => $value) {
            
            echo 'Id: ' . $value['id'] . '<br> Descrição: ' . $value['descricao'] . '<br> Valor: ' . $value['valor']. '<hr>';
        }

    }




}


?>