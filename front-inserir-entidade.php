<?php
use SISterna\Pdo\Domain\Model\Entidade;
require_once 'vendor/autoload.php';
// Abre conexão com o BD usando PDO
$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

// Verifica se o form foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os valores do form
    $nomeFantasia = $_POST['nomeFantasia'] ?? null;
    $cnpj = $_POST['cnpj'] ?? null;
    $endereco = $_POST['endereco'] ?? null;
    $telefone = $_POST['telefone'] ?? null;

    $entidade = new Entidade(null, $nomeFantasia, $cnpj, $endereco, $telefone);
    $sqlInsert = "INSERT INTO entidades (nome_fantasia, cnpj, endereco, telefone) VALUES ('{$entidade->nomeFantasia()}', '{$entidade->cnpj()}', '{$entidade->endereco()}', '{$entidade->telefone()}');";

    // Insere os valores no BD
    if ($nomeFantasia && $cnpj && $endereco && $telefone) {
        $stmt = $pdo->exec($sqlInsert);

        echo 'Entidade cadastrada.';
    } else {
        echo 'Todos os campos são obrigatórios.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Entidades</title>
</head>
<body>
<h1>Cadastro de Cisternas e Entidades</h1>
<ul>
    <li><a href="front-lista-cisternas.php">Listar Cisternas</a></li>
    <li><a href="front-lista-entidades.php">Listar Entidades</a></li>
    <li><a href="front-inserir-cisterna.php">Cadastrar Cisternas</a></li>
    <li><a href="front-inserir-entidade.php">Cadastrar Entidades</a></li>
</ul>

<h2>Consultar Cisternas</h2>

<form method="POST">
    <label for="nomeFantasia">Nome Fantasia:</label>
    <input type="text" name="nomeFantasia" required><br><br>
    <label for="cnpj">CNPJ:</label>
    <input type="text" name="cnpj" required><br><br>
    <label for="endereco">Endereço:</label>
    <input type="text" name="endereco" required><br><br>
    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" required><br><br>
    <button type="submit">Enviar</button>
</form>
</body>
</html>
