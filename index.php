<?php
    session_start();
    require 'db.php';
    if (isset($_SESSION[registro_id])) {
        $records= $conexion->prepare('SELECT id, email, contraseña FROM registro WHERE id = :id');
        $records->bindParam(:id, $_SESSION['registro_id']);
        $records->execute();
        $result= $records->fetch(PDO::FETCH_ASSOC);
        $usuario=null;

        if (count($result)>0){
            $usuario=$result;

        }
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>
    <header>
        <a href="/canchas">Universidad Pedagógica y Tecnológica de Colombia</a>
    </header>
    <?php  if (!empty($usuario)):   ?>
        <br>Bienvenido .<?=  $usuario['email']  ?>
        <br>Tus datos fueron cargados satisfactoriamente
        <a href="logout.php"> Cerrar sesion</a>
    
    <?php else:  ?>
        <h1>Sistema de Registro</h1>
        <form action="validar.php" method="post">
            
            <a href="login.php">Acceder a tu cuenta  </a>o tal vez desea
            <a href ="signup.php"> Registrarse</a> 
        </form>
        <?php endif; ?>
</body>
</html>