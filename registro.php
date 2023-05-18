<?php
require 'database.php';
$message = ' ';

if (!empty($_POST['email']) && !empty($_POST['password'])) {

  $sql = "INSERT INTO usuarios (email,pass) VALUES (:email, :password)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':email', $_POST['email']);
  // $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $stmt->bindParam(':password', $_POST['password']);
  if ($stmt->execute()) {
    $message = 'Se ha creado satisfactoriamente un nuevo usuario!';
  } else {
    $message = 'disculpe ha oacurrido un error al crear su perfil';
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro de Cuenta</title>
  <link rel="stylesheet" href="CSS/loginstyle.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>


<body>


  <div class="container">
    <div class="form signup">
      <h2>Registro de cuenta</h2>
      <?php if (!empty($message)) : ?>
        <p><?= $message ?></p>
      <?php endif; ?>

      <form action="registro.php" method="post">

        <div class="inputBox">
          <input type="text" required="required" />
          <i class="fa-regular fa-user"></i>
          <span> Nombre </span>
        </div>
        <div class="inputBox">
          <input type="text" name="email" required="required" />
          <i class="fa-regular fa-envelope"></i>
          <span>Direcicon de email</span>
        </div>
        <div class="inputBox">
          <input type="password" name="password" required="required" />
          <i class="fa-solid fa-lock"></i>
          <span>Cree su constraseña</span>
        </div>
        <div class="inputBox">
          <input type="password" required="required" />
          <i class="fa-solid fa-lock"></i>
          <span> Confirme su contraseña</span>
        </div>
        <div class="inputBox">
          <input type="submit" value="Registrarte" required="Create Account" />
        </div>
      </form>
      <p>Regresa a la pagina <a href="index.php">Principal</a></p>
      <p>¿ya estas registrado? <a href="login.php">Inicia sesion</a></p>
    </div>
  </div>
</body>

</html>