<?php 

require_once __DIR__ . '/../classes/conexao.php';

// Conectando BD
$pdo = Conexao::conectar();

// Buscando contas
$sql = "SELECT * FROM conta ORDER BY id DESC";
$clientes = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
</head>
<body>
    
    <a href="../../public/formulario_cadastro_pj.html">
        <button type="button">Abrir Conta PJ</button>
    </a>

    <a href="../../public/formulario_cadastro_pf.html">
        <button type="button">Abrir Conta PF</button>
    </a>

    <hr>

    <table border="1" cellspacing="15" cellpadding="5">
        <thead>
            <tr>
                <th>Titular</th>
                <th>CPF/CNPJ</th>
                <th>Fone</th>
                <th>Tipo de Conta</th>
                <th>Status</th>
                <th>Data Abertura</th>
                <th>Data Encerramento</th>
                <th colspan="3">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $c): ?>
                <tr>
                    <td><?= $c['nome_titular'] ?></td>
                    <td><?= $c['documento'] ?></td>
                    <td><?= $c['telefone'] ?></td>
                    <td><?= $c['tipo'] ?></td>
                    <td><?= $c['status'] ?></td>
                    <td><?= $c['data_abertura'] ?></td>
                    <td><?= $c['data_encerramento'] ?></td>

                    <td><a href="alterar_senha.php?id=<?= $c['id'] ?>">Alterar Senha</a></td>
                    <td><a href="">Encerrar Conta</a></td>
                    <td><a href="">Mais Opções</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table> 

</body>
</html>