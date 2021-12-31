<?php

$variable = $_GET['var'];

if ($variable == 'producto') {

    require_once './Database/Database.php';

    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];

    // Comprobar si existe un producto con el mismo código

    $sql_select = "SELECT codigo FROM productos WHERE codigo = ?";
    $query_select = $pdo->prepare($sql_select);
    $query_select->execute(array($codigo));

    $resultado_select = $query_select->fetchAll();

    if (!$resultado_select) {
        $sql = "INSERT INTO productos (codigo, descripcion, marca, modelo, categoria, precio) VALUES (?, ?, ?, ?, ?, ?)";
        $query = $pdo->prepare($sql);
        $query->execute(array($codigo, $descripcion, $marca, $modelo, $categoria, $precio));
        echo "<script>alert('¡Producto agregado exitosamente!')</script>";
    } else {
        echo "<script>alert('Ya existe un producto con este código.')</script>";
    }
    header("Refresh:0 , url =  pantallaGestion.php?accion=agregar&var=producto");

} else {

    require_once './Database/Database.php';

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $rut = $_POST['rut'];
    $telefono = $_POST['telefono'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];

    // Comprobar si ya existe el nombre de usuario

    $sql_select = "SELECT usuario FROM usuarios WHERE usuario = ?";
    $query_select = $pdo->prepare($sql_select);
    $query_select->execute(array($usuario));

    $resultado_select = $query_select->fetchAll();

    if (!$resultado_select) {
        $sql = "INSERT INTO usuarios (nombre, apellido, rut, telefono, usuario, pass) VALUES (?, ?, ?, ?, ?, ?)";
        $query = $pdo->prepare($sql);
        $query->execute(array($nombre, $apellido, $rut, $telefono, $usuario, $pass));
        echo "<script>alert('Usuario agregado exitosamente!')</script>";
    } else {
        echo "<script>alert('Este usuario ya existe.')</script>";
    }
    header("Refresh:0 , url =  pantallaGestion.php?accion=agregar&var=usuario");

}

?>