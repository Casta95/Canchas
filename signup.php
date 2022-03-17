<?php
    require 'db.php';
    $mensaje='';
    if (!empty($_POST['email']) && !empty($_POST['contraseña']) && !empty($_POST['conf_contraseña'])) {
        if ($_POST['contraseña']==$_POST['conf_contraseña']) {
            $sql = "INSERT INTO registro (email, contraseña) VALUES (:email, :contraseña)";
            $stmt=$conexion->prepare($sql);
            $stmt->bindParam(':email',$_POST['email']);
            $pass= password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
            $stmt->bindParam(':contraseña', $pass);
            if ($stmt->execute()) {
                $mensaje='Usuario creado exitosamente';
            }else {
                $mensaje='Lo lamentamos, pero ha ocurrido un error';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>
<body>
    <header>
        <a href="/canchas">Universidad Pedagógica y Tecnológica de Colombia</a>
    </header>

    <?php if(!empty($mensaje)):  ?>
    <p><?= $mensaje ?></p>
    <?php endif; ?>

    <H1>Registrarse</H1>
    <span>o tal vez <a href="login.php"> acceder a cuenta</a></span>
    <form action="signup.php" method="post">
        <input type="text" name="email" placeholder="Ingrese su Correo">
        <input type="password" name="contraseña" placeholder="Ingrese su contraseña">
        <input type="password" name="conf_contraseña" placeholder="Confirmar su contraseña">
        <input type="submit" value="send">
    </form>
</body>
</html>