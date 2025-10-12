<?php

    class Conexao {

        public static function getConexao(): PDO {
            try {
                $dsn = "mysql:host=localhost;dbname=bank";
                $usuario = getenv('DB_USER') ?: 'root';
                $senha = getenv('DB_PASS') ?: '';

                return new PDO($dsn, $usuario, $senha);
                
            } catch (Exception $e) {
                die("Erro na conexão: " . $e->getMessage());
                
            }
        }

    }
?>
