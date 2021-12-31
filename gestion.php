<?php

$variable = $_GET['var'];
$accion = $_GET['accion'];

if ($accion == 'agregar') {
    include_once "./agregar.php?var=$variable";
}



?>