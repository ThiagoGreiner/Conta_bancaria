<?php

declare(strict_types=1);
require_once __DIR__ . '/../classes/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Tratando espaços vazios
    $usuario = trim($_POST['usuario'] ?? '');
    $senha   = trim($_POST['senha'] ?? '');

    if (!$usuario || !$senha) {
        die("Usuário ou senha inválidos.");
    }

    try {
        // Conectando no BD
        $pdo = Conexao::conectar();

        // Buscar conta
        $sql = "SELECT * FROM conta WHERE documento = :documento LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':documento', $usuario, PDO::PARAM_STR);
        $stmt->execute();

        // Capturando retorno de consulta
        $conta = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$conta) {
            die("Usuário não encontrado, verifique o dado inserido ou procure sua agencia");
        }

        // Conferir senha
        if (!password_verify($senha, $conta['senha'])) {
            die("Senha incorreta.");
        }

        // Iniciando sessão
        session_start();

        // Dados da sessão
        $_SESSION['logado'] = true;
        $_SESSION['conta_id'] = (int)$conta['id'];
        $_SESSION['nome_titular'] = $conta['nome_titular'];
        $_SESSION['documento'] = $conta['documento'];
        $_SESSION['tipo'] = $conta['tipo'];
        $_SESSION['saldo'] = $conta['saldo'];
        $_SESSION['ultimo_acesso'] = time();

        // redireciona para o painel
        header('Location: ../public/painel.php');
        exit;

    } catch (PDOException $e) {
        echo "Erro no login: " . $e->getMessage();
    }
}

?>