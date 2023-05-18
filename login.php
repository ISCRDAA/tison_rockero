<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>inico de sesion</title>
  <link rel="stylesheet" href="CSS/loginstyle.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
  <div class="container">
    <div class="form signup">
      <div class="form signin">
        <h2>Inicio de sesion</h2>
        <form action="login.php
          " method="post">
          <div class="inputBox">
            <input type="text" required="required" />
            <i class="fa-regular fa-user"></i>
            <span> Tu Email</span>
          </div>
          <div class="inputBox">
            <input type="password" required="required" />
            <i class="fa-solid fa-lock"></i>
            <span> Ingrese su contraseña</span>
          </div>
          <div class="inputBox">
            <input type="submit" value="Ingresar" required="login" />
          </div>
        </form>
        <p>¿No tienes cuenta ? <a href="registro.php">Registrate</a></p>
      </div>
    </div>
  </div>
</body>

</html>