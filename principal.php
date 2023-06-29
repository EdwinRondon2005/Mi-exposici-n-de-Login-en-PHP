<?php
    session_start();

    if(empty($_SESSION['usuario']))
    {
        header('Location: formulario.php');

        exit();
    }

    echo "Has ingresado correctamente."
?>

<p>Hello world</p>

<a href = "logout.php">Cerrar sesión</a>