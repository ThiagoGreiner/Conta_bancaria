<?php

declare(strict_types=1);
require_once __DIR__ . '/../classes/conta_pf.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Tratando espaços vazios
    $nome = trim($_POST['nome']);
    $cpf = trim($_POST['cpf']);
    $dataNascimento = $_POST['data_nascimento'];
    $telefone = trim($_POST['telefone']);
    $telefone = trim($_POST['senha']);

    // Verificando se todos campos foram preenchidos
    if (!$nome || !$cpf || !$dataNascimento || !$telefone || !$senha) {
        die("Preencha todos os campos.");
    }

    $pf = new ContaPF($nome, $cpf, $dataNascimento, $telefone);

    $criandoConta = $pf->criarConta($senha);

    // Verificando se conta foi criado com sucesso
    if ($criandoConta) {
        echo "Conta criada com sucesso!";
    } else {
        echo "Erro ao criar conta.";
    }
}

?>