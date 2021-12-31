<?php

require_once "./Database/Database.php";

$query = $pdo->prepare('SELECT * FROM productos');
$query->execute();

$resultado = $query->fetchAll();