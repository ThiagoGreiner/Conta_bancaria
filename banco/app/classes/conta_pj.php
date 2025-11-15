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

    public function criarConta(string $senha): bool {
        try {
            // Iniciando transação BD
            $this->conexao->beginTransaction();

            // Criptografando senha
            $hashSenha = password_hash($senha, PASSWORD_DEFAULT);

            // Cria e conta base e recupera id
            $contaId = $this->criarContaBase($this->razaoSocial, $this->cnpj,'PJ', $this->telefone, $hashSenha);

            // Insere dados na pessoa_juridica
            $sqlPJ = "INSERT INTO pessoa_juridica (conta_id, razao_social, cnpj, nome_fantasia)
                      VALUES (:conta_id, :razao_social, :cnpj, :nome_fantasia)";

            $preparePJ = $this->conexao->prepare($sqlPJ);
            $preparePJ->bindParam(':conta_id', $contaId, PDO::PARAM_INT);
            $preparePJ->bindParam(':razao_social', $this->razaoSocial);
            $preparePJ->bindParam(':cnpj', $this->cnpj);
            $preparePJ->bindParam(':nome_fantasia', $this->nomeFantasia);

            // Retorna bool
            $resultado = $preparePJ->execute();

            // Finaliza transação BD
            $this->conexao->commit();

            return $resultado;

        } catch (PDOException $e) {
            // Cancela transação BD
            $this->conexao->rollBack();
            
            echo "Erro ao criar conta PJ: " . $e->getMessage();
            return false;
        }
    }
}
