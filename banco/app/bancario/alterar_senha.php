<?php

// Captura id da conta
$idConta = isset($_GET['id']) ? $_GET['id'] : '';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Senha</title>

</head>
<body>

    <h2>Alterar Senha da Conta</h2>

    <form action="" method="POST">
    
        <!-- Envia ID para valida_alterar_senha -->
        <input type="hidden" name="id_conta" value="<?= htmlspecialchars($idConta) ?>">

        <label>Senha:</label>
        <input type="password" name="senha" required><br><br>

        <label>Confirmar Senha:</label>
        <input type="password" name="confirma_senha" required><br><br>

        <button type="submit">Confirmar</button>
    </form>

</body>
</html>