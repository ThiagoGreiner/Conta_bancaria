<?php

declare(strict_types=1);
require_once './banco/app/classes/Conta.php';

class ContaPF extends Conta {
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

    // Criar conta PF
    public function criarConta(): bool {
        try {
            // Iniciando transação BD
            $this->conexao->beginTransaction();

            // Recuperando id gerado na conta
            $contaId = $this->criarContaBase($this->nomeCompleto, 'PF', $this->telefone);
            
            // Inseri dados na pessoa fisica
            $sqlPF = "INSERT INTO pessoa_fisica (conta_id, nome_completo, cpf, data_nascimento) VALUES (:conta_id, :nome, :cpf, :data_nascimento)";
            
            $preparePF = $this->conexao->prepare($sqlPF);
            
            $preparePF->bindParam(':conta_id', $contaId, PDO::PARAM_INT);
            $preparePF->bindParam(':nome', $this->nomeCompleto);
            $preparePF->bindParam(':cpf', $this->cpf);
            $preparePF->bindParam(':data_nascimento', $this->dataNascimento);

            // Retorna bool
            $resultado = $preparePF->execute();

            // Finaliza transação BD
            $this->conexao->commit();

            return $resultado;

        } catch (PDOException $e) {
            // Cancela transação BD
            $this->conexao->rollBack();

            echo "Erro ao criar conta PF: " . $e->getMessage();
            return false;
        }
    }

}

?>