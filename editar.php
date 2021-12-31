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

    $sql = "UPDATE productos SET codigo = ?, descripcion = ?, marca = ?, modelo = ?, categoria = ?, precio = ? WHERE codigo = $codigo";
    $query = $pdo->prepare($sql);
    $query->execute(array($codigo, $descripcion, $marca, $modelo, $categoria, $precio));
    echo "<script>alert('¡Producto editado exitosamente!')</script>";

    header("Refresh:0 , url =  productos.php");

} else {

    require_once './Database/Database.php';

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $rut = $_POST['rut'];
    $telefono = $_POST['telefono'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];

    
    $sql = "UPDATE usuarios SET nombre = ?, apellido = ?, rut = ?, telefono = ?, usuario = ?, pass = ? WHERE usuario = ?";
    $query = $pdo->prepare($sql);
    $query->execute(array($nombre, $apellido, $rut, $telefono, $usuario, $pass, $usuario));
    echo "<script>alert('Usuario editado exitosamente!')</script>";
    header("Refresh:0 , url =  usuarios.php");

}

?>