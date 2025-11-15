<?php

// Verificando se sessão já esta ativa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

//  Verificando se esta logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: ../public/login.html'); // ajuste o caminho
    exit;
}

// Periodo de inatividade
$tempoMaximo = 120;

if (isset($_SESSION['ultimo_acesso'])) {
    $inatividade = time() - $_SESSION['ultimo_acesso'];
    
    if ($inatividade > $tempoMaximo) {
        // logout
        session_unset();
        session_destroy();

        header('Location: ../public/login.html?timeout=1');
        exit;
    }
}

// Atualiza último acesso
$_SESSION['ultimo_acesso'] = time();

?>