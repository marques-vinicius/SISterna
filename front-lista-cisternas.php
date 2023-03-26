<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Entidades e Cisternas</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
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
<table>
    <tr><th>Id</th><th>Tipo de Construção</th><th>Materiais</th><th>Localização</th><th>Entidade Mantenedora</th><th>Data da Inauguração</th></tr>

        <?php
        // Conexão com o banco de dados
        $databasePath = __DIR__ . '/banco.sqlite';
        $pdo = new PDO('sqlite:' . $databasePath);

        // Busca as entidades cadastradas no banco de dados
        $statement = $pdo->query('SELECT * FROM cisternas;');
        $listaCisternas = $statement->fetchAll(fetch_style: PDO::FETCH_ASSOC);

        // Exibe as cisternas na tabela
        foreach ($listaCisternas as $cisterna) {
            echo '<tr><td>' . $cisterna['id'] . '</td><td>' . $cisterna['tipo_construcao'] . '</td><td>' . $cisterna['materiais_construcao'] .  '</td><td>' . $cisterna['localizacao'].  '</td><td>' . $cisterna['entidade_mantenedora'].  '</td><td>' . $cisterna['data_inauguracao'].'</td></tr>';
        }
        ?>
    </table><br><br>
