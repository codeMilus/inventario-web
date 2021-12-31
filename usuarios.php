<?php
session_start();
$sesion = $_SESSION['username'];

if (isset($_SESSION['username'])) {

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/107ea67525.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Productos</title>
</head>

<body>
    <header class="header">
        <div class="header__content container">
            <a href="./main.php" class="header__logo">InvWeb</a>
            <div class="header-profile">
                <p class="header-profile__text"><?php echo "Has ingresado como <span> $sesion </span>" ?></p>
                <a href="logout.php" class="header-profile__logout">Cerrar Sesión</a>
            </div>
        </div>
    </header>

    <div class="contenedor-tabla">
        <h2>Usuarios registrados</h2>
        <table class="tabla-productos">
            <thead>
                <tr>
                    <th>RUT</th>
                    <th>Nombre completo</th>
                    <th>Teléfono</th>
                    <th>Nombre de usuario</th>
                    <th>Contraseña</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="usuarios">
                <?php
                    include_once './mostrarUsuarios.php';
                    foreach($resultado as $usuario):
                ?>
                <tr>
                    <td><?php echo $usuario['rut'] ?></td>
                    <td><?php echo $usuario['nombre'].' '.$usuario['apellido'] ?></td>
                    <td><?php echo $usuario['telefono'] ?></td>
                    <td><?php echo $usuario['usuario'] ?></td>
                    <td><?php echo $usuario['pass'] ?></td>
                    <td>
                        <a href=<?php echo "pantallaGestion.php?accion=editar&var=usuario&usuario=" . $usuario['usuario'] ?> >Editar</a>
                        <a href=<?php echo "pantallaGestion.php?accion=borrar&var=usuario&usuario=" . $usuario['usuario'] ?> >Eliminar</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <a class="addBtn" href="pantallaGestion.php?accion=agregar&var=usuario">Agregar usuario</a>

    <a class="atras" href="main.php">Atrás</a>

    <?php include_once './footer.php' ?>

</body>

</html>

<?php
} else {
    header("Location: index.html");
}
?>