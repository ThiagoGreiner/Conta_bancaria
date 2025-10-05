<?php

declare(strict_types=1);

Class Produto {
    
    private $conexao;

    public function __construct
    (

    )
    {
        $this->conexao = new PDO('"mysql:host=localhost;dbname=banco", "root", "senha"');
    }

    public function listar() {
        
    }




}


?>