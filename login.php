<!DOCTYPE html>
<html lang = "es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    
<?php
    //Introducimos las credenciales.
    $usuario_correcto = "Luis";
    $password_correcta = "12345";

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    //Se verifica si las credenciales introducidas coinciden con las credenciales guardadas.
    if($usuario == $usuario_correcto && $password == $password_correcta)
    {
        //Se inicia sesión.
        session_start();

        //Establecer tiempo de vida de la sesión.

        $inactividad = 10;

        if(isset($_SESSION['timeout']))
        {
            //Calcular el tiempo de vida (TTL).
            $sessionTTL = time() - $_SESSION['timeout'];
            if($sessionTTL > $inactividad)
            {
                session_destroy();
                header('Location: logout.php');
            }
        }

        $_SESSION['timeout'] = time();

        $_SESSION['usuario'] = $usuario;

        //Si las credenciales coinciden entonces se redirecciona a la página "principal".
        header('Location: principal.php');
    }
    else
    {
        //Si las credenciales no coinciden entonces se muestra un error.
        echo "Error: algunos de los datos son incorrectos o los campos están vacíos.";
    }
?>

<br><br>
<a href = "formulario.php">Volver a iniciar sesión</a>
</body>
</html>