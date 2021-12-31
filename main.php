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
    <title>Principal</title>
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

    <main class="main container">
        <a href="productos.php" class="option">
            <p class="option__title">Administrar productos</p>
            <i class="option__icon fas fa-box-open"></i>
        </a>
        <a href="usuarios.php" class="option">
            <p class="option__title">Administrar usuarios</p>
            <i class="option__icon fas fa-users-cog"></i>
        </a>
    </main>

    <?php include_once './footer.php' ?>

</body>

</html>

<?php
} else {
    header("Location: index.html");
}
?>