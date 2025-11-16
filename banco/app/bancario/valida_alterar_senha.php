<?php

require_once __DIR__ . '/../classes/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Armazena dados de id e senha
    $idConta = $_POST['id_conta'];
    $novaSenha = $_POST['nova_senha'];
    $confirmarSenha = $_POST['confirmar_senha'];

    if ($novaSenha !== $confirmarSenha) {
        die("As senhas não conferem.");
    }

    // Criptografando a senha
    $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

    try {
        $pdo = Conexao::conectar();
        
        $sql = "UPDATE conta SET senha = :senha WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":senha", $senhaHash);
        $stmt->bindValue(":id", $idConta);

        if ($stmt->execute()) {
            echo "Senha alterada com sucesso!";
        } else {
            echo "Erro ao atualizar senha.";
        }

    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }

}

?>