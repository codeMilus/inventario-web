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

    $sql = "DELETE FROM productos WHERE codigo = ?";
    $query = $pdo->prepare($sql);
    $query->execute(array($codigo));
    echo "<script>alert('¡Producto eliminado exitosamente!')</script>";

    header("Refresh:0 , url =  productos.php");

} else {

    require_once './Database/Database.php';

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $rut = $_POST['rut'];
    $telefono = $_POST['telefono'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];

    
    $sql = "DELETE FROM usuarios WHERE usuario = ?";
    $query = $pdo->prepare($sql);
    $query->execute(array($usuario));
    echo "<script>alert('Usuario eliminado exitosamente!')</script>";
    header("Refresh:0 , url =  usuarios.php");

}

?>