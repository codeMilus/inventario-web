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
    <script src="./js/JsBarcode.all.min.js"></script>
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
        <h2>Listado de productos</h2>
        <table class="tabla-productos">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="productos">
                <?php
                    include_once './mostrarProductos.php';
                    foreach($resultado as $producto):
                ?>
                <tr>
                    <?php 

                        $codigo = $producto['codigo'];
                        $descripcion = $producto['descripcion'];
                        $marca = $producto['marca'];
                        $modelo = $producto['modelo'];
                        $categoria = $producto['categoria'];
                        $precio = $producto['precio'];
                    ?>

                    <td>
                        <svg class="barcode"
                            jsbarcode-format="auto"
                            jsbarcode-value = <?php echo $codigo ?>
                            jsbarcode-textmargin="0"
                            jsbarcode-height="50"
                            jsbarcode-displayValue="false"
                            jsbarcode-fontoptions="bold">
                        </svg>
                    </td>
                    <td><?php echo $descripcion ?></td>
                    <td><?php echo $marca ?></td>
                    <td><?php echo $modelo ?></td>
                    <td><?php echo $categoria ?></td>
                    <td><?php echo $precio ?></td>
                    <td>
                        <a href=<?php echo "pantallaGestion.php?accion=editar&var=producto&codigo=$codigo" ?> >Editar</a>
                        <a href=<?php echo "pantallaGestion.php?accion=borrar&var=producto&codigo=$codigo" ?> >Borrar</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <a class="addBtn" href="pantallaGestion.php?accion=agregar&var=producto">Agregar producto</a>

    
    <script type="text/javascript">
        JsBarcode(".barcode").init();
    </script>
    



    <a class="atras" href="main.php">Atrás</a>

    <?php include_once './footer.php' ?>

</body>

</html>

<?php
} else {
    header("Location: index.html");
}
?>