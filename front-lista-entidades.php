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

<h2>Consultar Entidades</h2>
<table>
    <tr><th>Id</th><th>Nome Fantasia</th><th>CNPJ</th><th>Endereço</th><th>Telefone</th></tr>

        <?php
        // Conexão com o banco de dados
        $databasePath = __DIR__ . '/banco.sqlite';
        $pdo = new PDO('sqlite:' . $databasePath);

        // Busca as entidades cadastradas no banco de dados
        $statement = $pdo->query('SELECT * FROM entidades;');
        $listaEntidades = $statement->fetchAll(fetch_style: PDO::FETCH_ASSOC);

        // Exibe as entidades na tabela
        foreach ($listaEntidades as $entidade) {
            echo '<tr><td>' . $entidade['id'] . '</td><td>' . $entidade['nome_fantasia'] . '</td><td>' . $entidade['cnpj'] . '</td><td>' . $entidade['endereco'] . '</td><td>' . $entidade['telefone'] .  '</td></tr>';
        }
        ?>
    </table><br><br>
