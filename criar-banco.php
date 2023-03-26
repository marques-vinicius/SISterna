<?php

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

echo 'Banco criado';

$pdo->exec('CREATE TABLE IF NOT EXISTS entidades (id INTEGER PRIMARY KEY, nome_fantasia TEXT, cnpj TEXT, endereco TEXT, telefone INTEGER);');

$pdo->exec('CREATE TABLE IF NOT EXISTS cisternas (id INTEGER PRIMARY KEY, data_inauguracao TEXT, tipo_construcao TEXT, materiais_construcao TEXT, localizacao TEXT, entidade_mantenedora INTEGER, FOREIGN KEY (entidade_mantenedora) REFERENCES entidades(id) ON UPDATE RESTRICT ON DELETE RESTRICT);');