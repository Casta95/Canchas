<?php
    session_start();
    require 'db.php';
    if (!empty($_POST['email']) && !empty($_POST['contraseña'])) {
        $records=$conexion->prepare('SELECT id, email, contraseña FROM registro WHERE email=:email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $result=$records->fetch(PDO::FETCH_ASSOC);
        $mensaje='';

        if (count($result)>0 && password_verify($_POST['contraseña'], $result['contraseña'])) {
            $_SESSION['registro_id']=$result['id'];
            header('Location:  /canchas');
        }else {
            $mensaje= 'Lo lamentamos, pero los datos no coinciden';
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceder a tu cuenta</title>
</head>
<body>
<header>
        <a href="/canchas">Universidad Pedagógica y Tecnológica de Colombia</a>
    </header>
    <h1>Accede a tu Cuenta</h1>
    <span>o tal vez <a href="signup.php"> registrarse</a></span>
    <?php  if(!empty($mensaje)) : ?>
        <p><?= $mensaje  ?></p>
    <?php  endif;  ?>

    <form action="login.php" method="post">
        <input type="text" name="email" placeholder="Ingrese su Correo">
        <input type="password" name="contraseña" placeholder="Ingrese su contraseña">
        <input type="submit" value="send">
    </form>
    
</body>
</html>