<?php

declare(strict_types=1);
require_once __DIR__ . '/../classes/conta_pj.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Tratando espaços vazios
    $razaoSocial = trim($_POST['razao_social']);
    $cnpj = trim($_POST['cnpj']);
    $nomeFantasia = trim($_POST['nome_fantasia'] ?? '');
    $telefone = trim($_POST['telefone']);

    // Verificando se todos campos foram preenchidos
    if (!$razaoSocial || !$cnpj || !$telefone) {
        die("Preencha todos os campos obrigatórios.");
    }

    $pj = new ContaPJ($razaoSocial, $cnpj, $nomeFantasia ?: null, $telefone);
    
    $criandoConta = $pj->criarConta();

    // Verificando se conta foi criado com sucesso
    echo $criandoConta ? "Conta PJ criada com sucesso!" : "Erro ao criar conta PJ.";
}
