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

    public function listar() {
        return "Listando";
    }




}


?>