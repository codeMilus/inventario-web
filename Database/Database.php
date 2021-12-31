<?php

$link = 'mysql:host=localhost;dbname=esoto';
$user = 'root';
$pass = '';

try {
    
    $pdo = new PDO($link, $user, $pass);

} catch (PDOException $e) {
    print "Error: " . $e->getMessage();
}

?>