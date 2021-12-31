<?php

require_once "./Database/Database.php";

$query = $pdo->prepare('SELECT * FROM usuarios');
$query->execute();

$resultado = $query->fetchAll();