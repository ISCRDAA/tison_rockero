<?php
session_start();
require 'database.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $records = $conn->prepare('SELECT id, email, pass FROM usuarios WHERE email=:email');
  $records->bindParam(':email', $_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if (count($results) > 0  &&  ($_POST['password'] == $results['pass'])) {
    $_SESSION['user_id'] = $results['id'];
    header('Location: index.php');
  } else {
    $message = 'Su constraseña no coincide';
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>inico de sesion</title>
  <link rel="stylesheet" href="/CSS/loginstyle.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
  <div class="container">
    <div class="form signup">
      <div class="form signin">
        <h2>Inicio de sesion</h2>
        <?php if (!empty($message)) : ?>
          <p><?= $message ?></p>
        <?php endif; ?>
        <form action="login.php
          " method="post">
          <div class="inputBox">
            <input type="text" name="email" required="required" />
            <i class="fa-regular fa-user"></i>
            <span> Tu Email</span>
          </div>
          <div class="inputBox">
            <input type="password" name="password" required="required" />
            <i class="fa-solid fa-lock"></i>
            <span> Ingrese su contraseña</span>
          </div>
          <div class="inputBox">
            <input type="submit" value="Ingresar" required="login" />
          </div>
        </form>
        <p>Regresa a la pagina <a href="index.php">Principal</a></p>
        <p>¿No tienes cuenta ? <a href="registro.php">Registrate</a></p>
      </div>
    </div>
  </div>
</body>

</html>