<?php
  session_start();

$conex= mysqli_connect("localhost","root","","canchas");

  if (isset($_SESSION['user_id'])) {
    $records = $conex->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bienvenido</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body background="images\demo\backgrounds\11.jpeg">
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Welcome. <?= $user['email']; ?>
      <br>You are Successfully Logged In
      <a href="logout.php">
        Logout
      </a>
    <?php else: ?>
      <h1>Por favor seleccione una de las opciones:</h1>
    <br>
        <a> acceder para ingresar a su cuenta</a>
    <br>
    <a>Inscribirse para registrar su cuenta</a>
    <br>
      <a href="login.php">Acceder  </a> or
      <a href="signup.php">  Inscribirse</a>
    <?php endif; ?>

  </body>
</html>
