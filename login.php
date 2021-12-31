<?php

if(trim($_POST['username'])== null|| trim($_POST['password']) == null) {

    header("Refresh:0 , url =  index.html");
    exit();

} else {

    require_once "./Database/Database.php";

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM usuarios WHERE usuario = ? AND pass = ?";
        
        $query = $pdo->prepare($sql);
        $query->execute(array($username, $password));

        $resultado = $query->fetch();

        if (!$resultado) {
            echo "<script>alert('Datos incorrectos')</script>";
            header("Refresh:0 , url = logout.php");
            exit();
        } else {
            session_start();
            $_SESSION['username'] = $resultado["usuario"];
            var_dump($_SESSION['username']);
            header("Location: main.php");
        }   
    } 

}

?>