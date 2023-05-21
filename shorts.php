<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>tienda online </title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <!-- Link para los estilos de letra  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <!-- Link de el css de el proyecto -->
  <link rel="stylesheet" href="CSS/style.css" />

</head>

<body>
  <!-- seccion header comienzo -->
  <header class="header">
    <section class="flex">
      <a href="index.html" class="logo">
        <img src="logo de empresa/logo empresa 1.png" alt="logo de la empresa" /></a>
      <nav class="navbar">
        <a href="index.php">Inicio de pagina</a>
        <!-- <a href="building.html">Productos</a> -->
        <a href="building.html">Sobre nosotros</a>
        <!-- <a href="building.html">Contacto</a> -->
      </nav>
      <div class="icons">

        <a href="pago.php"><i class="fas fa-shopping-cart"></i> <span>(3)</span></a>
        <div id="user-btn" class="fas fa-user"></div>
        <div id="menu-btn" class="fas fa-bars"></div>
      </div>
      <div class="profile">
        <?php if (!empty($user)) :  ?>
          <p class="name">Bienvenido: <?= $user['nombre'] ?> con el correo: <?= $user['email'] ?></p>
          <div class="flex">
            <a href="perfil.html" class="btn">perfil</a>
            <a href="salir.php" class="delete-btn">salir</a>

          </div>
        <?php else : ?>
          <p class="name"> Inicia sesion </p>
        <?php endif; ?>
        <p class="account">
          <a href="login.php">Login</a> O
          <a href="registro.php">Registro</a>
        </p>
      </div>
    </section>
  </header>
  <!-- seccion header fin -->
  <main>
    <div class="Container">

    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <div class="col">
        <div class="card shadow-sm">
          <img src="Producto/short1.jpg" alt="">
          <div class="card-body">
            <h2 class="card-title">SHORTS 1</h2>
            <h2 class="card-text">$000</h2>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="" class="btn btn-primary">Detalles</a>
              </div>
              <a href="" class="btn btn-success">Agregar</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow-sm">
          <img src="Producto/short1.jpg" alt="">
          <div class="card-body">
            <h2 class="card-title">SHORTS 1</h2>
            <h2 class="card-text">$000</h2>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="" class="btn btn-primary">Detalles</a>
              </div>
              <a href="" class="btn btn-success">Agregar</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow-sm">
          <img src="Producto/short1.jpg" alt="">
          <div class="card-body">
            <h2 class="card-title">SHORTS 1</h2>
            <h2 class="card-text">$000</h2>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="" class="btn btn-primary">Detalles</a>
              </div>
              <a href="" class="btn btn-success">Agregar</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow-sm">
          <img src="Producto/short1.jpg" alt="">
          <div class="card-body">
            <h2 class="card-title">SHORTS 1</h2>
            <h2 class="card-text">$000</h2>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="" class="btn btn-primary">Detalles</a>
              </div>
              <a href="" class="btn btn-success">Agregar</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow-sm">
          <img src="Producto/short1.jpg" alt="">
          <div class="card-body">
            <h2 class="card-title">SHORTS 1</h2>
            <h2 class="card-text">$000</h2>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="" class="btn btn-primary">Detalles</a>
              </div>
              <a href="" class="btn btn-success">Agregar</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow-sm">
          <img src="Producto/short1.jpg" alt="">
          <div class="card-body">
            <h2 class="card-title">SHORTS 1</h2>
            <h2 class="card-text">$000</h2>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="" class="btn btn-primary">Detalles</a>
              </div>
              <a href="" class="btn btn-success">Agregar</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow-sm">
          <img src="Producto/short1.jpg" alt="">
          <div class="card-body">
            <h2 class="card-title">SHORTS 1</h2>
            <h2 class="card-text">$000</h2>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="" class="btn btn-primary">Detalles</a>
              </div>
              <a href="" class="btn btn-success">Agregar</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow-sm">
          <img src="Producto/short1.jpg" alt="">
          <div class="card-body">
            <h2 class="card-title">SHORTS 1</h2>
            <h2 class="card-text">$000</h2>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="" class="btn btn-primary">Detalles</a>
              </div>
              <a href="" class="btn btn-success">Agregar</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow-sm">
          <img src="Producto/short1.jpg" alt="">
          <div class="card-body">
            <h2 class="card-title">SHORTS 1</h2>
            <h2 class="card-text">$000</h2>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="" class="btn btn-primary">Detalles</a>
              </div>
              <a href="" class="btn btn-success">Agregar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Pie de pagina comienzo -->
  <footer class="footer">
    <section class="grid">
      <div class="box">
        <img src="Iconos/email.png" alt="" />
        <h3>Nuestro correo:</h3>
        <a href="mailto:tizonrockero@gmail.com?Subject=Interesado%20en%20los%20productos">tizonrockero@gmail.com</a>
      </div>
      <div class="box">
        <img src="Iconos/direccion.png" alt="" />
        <h3>Nuestra Ubicacion</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3747.313282008436!2d-98.36991777791123!3d20.079186840965956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d056f40e430097%3A0x5db54927b474018c!2sCalle%20Juan%20C%20Doria%20Pte%20105%2C%20Centro%201er%20Cuadro%2C%2043600%20Tulancingo%20de%20Bravo%2C%20Hgo.!5e0!3m2!1ses-419!2smx!4v1684013496725!5m2!1ses-419!2smx" width="200" height="200" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <div class="box">
        <img src="Iconos/reloj.png" alt="" />
        <h3>Horario de atencion</h3>
        <p>08:00am A 06:00pm</p>
      </div>
      <div class="box">
        <img src="Iconos/gente.png" alt="" />
        <h3>Nosotros: <a href="building.html">Mas informacion:</a></h3>
        <p>Somos una empresa de productos deportivos.</p>
      </div>
    </section>

    <ul>
      <li style="--clr: #1877f2">
        <a class="href"="#"> <i class="fa-brands fa-facebook-f"></i></a>
      </li>
      <li style="--clr: #c32aa3">
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
      </li>
      <li style="--clr: #25d366">
        <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
      </li>
    </ul>
    <div class="credit">
      Gerente gral<span> Aldahir Sarmiento Gandiaga</span> |
      tisonrockero06.000webhostapp.com | tizonroqueta@gmail.com | Av. 21 de
      Marzo 1006, Amp Vicente Guerrero, 43630 Tulancingo de Bravo Hgo |Todos
      los derechos reservados
    </div>
  </footer>
  <!-- pie de pagina final -->
  <script src="JS/script.js"></script>

</body>

</html>