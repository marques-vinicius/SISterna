<?php
use SISterna\Pdo\Domain\Model\Cisterna;
require_once 'vendor/autoload.php';
// Abre conexão com o BD usando PDO
$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

// Verifica se o form foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os valores do form
    $tipoConstrucao = $_POST['tipoConstrucao'] ?? null;
    $materiaisConstrucao = $_POST['materiaisConstrucao'] ?? null;
    $localizacao = $_POST['localizacao'] ?? null;
    $entidadeMantenedora = $_POST['entidadeMantenedora'] ?? null;
    $dataInauguracao = $_POST['dataInauguracao'] ?? null;

    $cisterna = new Cisterna(null, $tipoConstrucao, $materiaisConstrucao, $localizacao, $entidadeMantenedora, new \DateTimeImmutable($dataInauguracao));
    $sqlInsert = "INSERT INTO cisternas (tipo_construcao, materiais_construcao, localizacao, entidade_mantenedora, data_inauguracao) VALUES ('{$cisterna->tipoConstrucao()}', '{$cisterna->materiaisConstrucao()}', '{$cisterna->localizacao()}', '{$cisterna->entidadeMantenedora()}', '{$cisterna->dataInauguracao()->format('Y-m-d')}');";

    // Insere os valores no BD
    if ($tipoConstrucao && $materiaisConstrucao && $localizacao && $entidadeMantenedora && $dataInauguracao) {
        $stmt = $pdo->exec($sqlInsert);

        echo 'Cisterna cadastrada.';
    } else {
        echo 'Todos os campos são obrigatórios.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Cisternas</title>
</head>
<body>
<h1>Cadastro de Cisternas e Entidades</h1>
<ul>
    <li><a href="front-lista-cisternas.php">Listar Cisternas</a></li>
    <li><a href="front-lista-entidades.php">Listar Entidades</a></li>
    <li><a href="front-inserir-cisterna.php">Cadastrar Cisternas</a></li>
    <li><a href="front-inserir-entidade.php">Cadastrar Entidades</a></li>
</ul>

<h2>Cadastrar Cisterna</h2>

<form method="POST">
    <label for="tipoConstrucao">Tipo de Construção:</label>
    <select name="tipoConstrucao" required>
        <option value="Alvenaria">Alvenaria</option>
        <option value="Fibra">Fibra</option>
        <option value="Pré-fabricada">Pré-fabricada</option>
    </select><br><br>
    <label for="materiaisConstrucao">Materiais:</label>
    <input type="text" name="materiaisConstrucao" required><br><br>
    <label for="localizacao">Localização:</label>
    <input type="text" name="localizacao" required><br><br>
    <label for="entidadeMantenedora">Entidade Mantenedora:</label>
    <select name="entidadeMantenedora" required>
        <?php
        // Busca as entidades cadastradas no BD
        $statement = $pdo->query('SELECT * FROM entidades;');
        $listaEntidades = $statement->fetchAll(fetch_style: PDO::FETCH_ASSOC);

        // Exibe as entidades no select
        foreach ($listaEntidades as $entidade) {
            echo '<option value="' . $entidade['id'] . '">' . $entidade['nome_fantasia'] . ' - CNPJ: ' . $entidade['cnpj'] .  '</option>';
        }
        ?>
    </select><br><br>
    <label for="dataInauguracao">Data de inauguração:</label>
    <input type="text" name="dataInauguracao" required><br><br>
    <button type="submit">Enviar</button>
</form>
</body>
</html>
