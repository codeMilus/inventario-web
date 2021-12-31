<?php
session_start();
$sesion = $_SESSION['username'];

$variable = $_GET['var'];
$accion = $_GET['accion'];


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
    <title>Agregar</title>
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
</body>


<?php if ($accion == 'agregar'): ?>

<form action = <?php echo "agregar.php?var=$variable" ?> method="POST" class="form-agregar">
    <p class="form-agregar__title"> <?php echo 'Agregar ' . $variable ?> </p>
    
    
        <?php if ($variable == 'producto'): ?>
        <label class="form-agregar__label">Código: </label>
        <input name="codigo" type="number" class="form-agregar__field" required>
        <label class="form-agregar__label">Descripción: </label>
        <input name="descripcion" type="text" class="form-agregar__field" required>
        <label class="form-agregar__label">Marca: </label>
        <input name="marca" type="text" class="form-agregar__field" required>
        <label class="form-agregar__label">Modelo: </label>
        <input name="modelo" type="text" class="form-agregar__field" required>
        <label class="form-agregar__label">Categoría: </label>
        <input name="categoria" type="text" class="form-agregar__field" required>
        <label class="form-agregar__label">Precio: </label>
        <input name="precio" type="number" class="form-agregar__field" required>
        <?php endif ?>
        <?php if ($variable == 'usuario'): ?>
        <label class="form-agregar__label">Nombre: </label>
        <input name="nombre" type="text" class="form-agregar__field" required>
        <label class="form-agregar__label">Apellido: </label>
        <input name="apellido" type="text" class="form-agregar__field" required>
        <label class="form-agregar__label">RUT: </label>
        <input name="rut" type="text" class="form-agregar__field" required>
        <label class="form-agregar__label">Teléfono: </label>
        <input name="telefono" type="number" class="form-agregar__field" required>
        <label class="form-agregar__label">Nombre de usuario: </label>
        <input name="usuario" type="text" class="form-agregar__field" required>
        <label class="form-agregar__label">Contraseña: </label>
        <input name="pass" type="text" class="form-agregar__field" required>
        <?php endif ?>


    <input class="form-agregar__btn" type="submit" value="Agregar">
</form>

<?php endif ?>


<?php if ($accion == 'editar'): ?>

<form action = <?php echo "editar.php?var=$variable" ?> method="POST" class="form-agregar">
    <p class="form-agregar__title"> <?php echo 'Editar ' . $variable ?> </p>
    
    
        <?php if ($variable == 'producto'): ?>

        <?php 
        
        require_once './Database/Database.php';

        $codigo = $_GET['codigo'];

        $sql_rellenar = 'SELECT * FROM productos WHERE codigo = ?';
        $query_rellenar = $pdo->prepare($sql_rellenar);
        $query_rellenar->execute(array($codigo));
        $res_rellenar = $query_rellenar->fetch();
            
        ?>

        <label class="form-agregar__label">Código: </label>
        <input value = "<?php echo $res_rellenar['codigo']; ?>" name="codigo" type="number" class="form-agregar__field" readonly required>
        <label class="form-agregar__label">Descripción: </label>
        <input value = "<?php echo $res_rellenar['descripcion']; ?>" name="descripcion" type="text" class="form-agregar__field" required>
        <label class="form-agregar__label">Marca: </label>
        <input value = "<?php echo $res_rellenar['marca']; ?>" name="marca" type="text" class="form-agregar__field" required>
        <label class="form-agregar__label">Modelo: </label>
        <input value = "<?php echo $res_rellenar['modelo']; ?>" name="modelo" type="text" class="form-agregar__field" required>
        <label class="form-agregar__label">Categoría: </label>
        <input value = "<?php echo $res_rellenar['categoria']; ?>" name="categoria" type="text" class="form-agregar__field" required>
        <label class="form-agregar__label">Precio: </label>
        <input value = "<?php echo $res_rellenar['precio']; ?>" name="precio" type="number" class="form-agregar__field" required>
        <?php endif ?>
        <?php if ($variable == 'usuario'): ?>

        <?php 
        
        require_once './Database/Database.php';

        $usuario = $_GET['usuario'];

        $sql_rellenar = 'SELECT * FROM usuarios WHERE usuario = ?';
        $query_rellenar = $pdo->prepare($sql_rellenar);
        $query_rellenar->execute(array($usuario));
        $res_rellenar = $query_rellenar->fetch();
            
        ?>


        <label class="form-agregar__label">Nombre: </label>
        <input value = "<?php echo $res_rellenar['nombre']; ?>" name="nombre" type="text" class="form-agregar__field" required>
        <label class="form-agregar__label">Apellido: </label>
        <input value = "<?php echo $res_rellenar['apellido']; ?>" name="apellido" type="text" class="form-agregar__field" required>
        <label class="form-agregar__label">RUT: </label>
        <input value = "<?php echo $res_rellenar['rut']; ?>" name="rut" type="text" class="form-agregar__field" required>
        <label class="form-agregar__label">Teléfono: </label>
        <input value = "<?php echo $res_rellenar['telefono']; ?>" name="telefono" type="number" class="form-agregar__field" required>
        <label class="form-agregar__label">Nombre de usuario: </label>
        <input value = "<?php echo $res_rellenar['usuario']; ?>" name="usuario" type="text" class="form-agregar__field" readonly required>
        <label class="form-agregar__label">Contraseña: </label>
        <input value = "<?php echo $res_rellenar['pass']; ?>" name="pass" type="text" class="form-agregar__field" required>
        <?php endif ?>


    <input class="form-agregar__btn" type="submit" value="Editar">
</form>

<?php endif ?>




<?php if ($accion == 'borrar'): ?>

<form action = <?php echo "borrar.php?var=$variable" ?> method="POST" class="form-agregar">
    <p class="form-agregar__title"> <?php echo 'Eliminar ' . $variable ?> </p>
    
    
        <?php if ($variable == 'producto'): ?>

        <?php 
        
        require_once './Database/Database.php';

        $codigo = $_GET['codigo'];

        $sql_rellenar = 'SELECT * FROM productos WHERE codigo = ?';
        $query_rellenar = $pdo->prepare($sql_rellenar);
        $query_rellenar->execute(array($codigo));
        $res_rellenar = $query_rellenar->fetch();
            
        ?>

        <label class="form-agregar__label">Código: </label>
        <input value = "<?php echo $res_rellenar['codigo']; ?>" name="codigo" type="number" class="form-agregar__field" readonly required>
        <label class="form-agregar__label">Descripción: </label>
        <input value = "<?php echo $res_rellenar['descripcion']; ?>" name="descripcion" type="text" class="form-agregar__field" readonly required>
        <label class="form-agregar__label">Marca: </label>
        <input value = "<?php echo $res_rellenar['marca']; ?>" name="marca" type="text" class="form-agregar__field" readonly required>
        <label class="form-agregar__label">Modelo: </label>
        <input value = "<?php echo $res_rellenar['modelo']; ?>" name="modelo" type="text" class="form-agregar__field" readonly required>
        <label class="form-agregar__label">Categoría: </label>
        <input value = "<?php echo $res_rellenar['categoria']; ?>" name="categoria" type="text" class="form-agregar__field" readonly required>
        <label class="form-agregar__label">Precio: </label>
        <input value = "<?php echo $res_rellenar['precio']; ?>" name="precio" type="number" class="form-agregar__field" readonly required>
        <?php endif ?>
        <?php if ($variable == 'usuario'): ?>

        <?php 
        
        require_once './Database/Database.php';

        $usuario = $_GET['usuario'];

        $sql_rellenar = 'SELECT * FROM usuarios WHERE usuario = ?';
        $query_rellenar = $pdo->prepare($sql_rellenar);
        $query_rellenar->execute(array($usuario));
        $res_rellenar = $query_rellenar->fetch();
            
        ?>


        <label class="form-agregar__label">Nombre: </label>
        <input value = "<?php echo $res_rellenar['nombre']; ?>" name="nombre" type="text" class="form-agregar__field" readonly required>
        <label class="form-agregar__label">Apellido: </label>
        <input value = "<?php echo $res_rellenar['apellido']; ?>" name="apellido" type="text" class="form-agregar__field" readonly required>
        <label class="form-agregar__label">RUT: </label>
        <input value = "<?php echo $res_rellenar['rut']; ?>" name="rut" type="text" class="form-agregar__field" readonly required>
        <label class="form-agregar__label">Teléfono: </label>
        <input value = "<?php echo $res_rellenar['telefono']; ?>" name="telefono" type="number" class="form-agregar__field" readonly required>
        <label class="form-agregar__label">Nombre de usuario: </label>
        <input value = "<?php echo $res_rellenar['usuario']; ?>" name="usuario" type="text" class="form-agregar__field" readonly required>
        <label class="form-agregar__label">Contraseña: </label>
        <input value = "<?php echo $res_rellenar['pass']; ?>" name="pass" type="text" class="form-agregar__field" readonly required>
        <?php endif ?>


    <input class="form-agregar__btn" type="submit" value="Eliminar">
</form>

<?php endif ?>





<?php

if ($variable == 'producto') {
    
    echo '<a class="atras" href="productos.php">Atrás</a>';

} else {
    echo '<a class="atras" href="usuarios.php">Atrás</a>';
}

?>

<?php include_once './footer.php' ?>


</html>

<?php
} else {
    header("Location: index.html");
}
?>