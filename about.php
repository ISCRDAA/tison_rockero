<?php
require 'config.php';
require 'database.php';
if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT id,nombre, email, pass FROM usuarios WHERE id =:id');
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
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>about us</title>

  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

  <!-- custom css file link  -->
  <link rel="stylesheet" href="CSS/style.css" />
</head>

<body>
  <header class="header">
    <section class="flex">
      <a href="index.html" class="logo">
        <img src="logo de empresa/logo empresa 1.png" alt="logo de la empresa" /></a>
      <nav class="navbar">
        <a href="index.php">Inicio de pagina</a>
      </nav>

      <div class="icons">

        <a href="pago.php"><i class="fas fa-shopping-cart"></i> <span id="num_cart"><?php echo $num_cart; ?></span></a>
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

  <section class="about">
    <div class="row">
      <div class="image">
        <img src="Iconos/gente.png" alt="" width="100%" height="100%" />
      </div>

      <div class="content" style=" flex:1 1 40rem;
   text-align: center;">
        <h3 style="  font-size: 3rem;
   text-transform: capitalize;
   color:var(--black);">¿Quienes somos ?</h3>
        <p style="padding:1rem 0;
   line-height: 2;
   font-size: 2.5rem;
   color:var(--light-color);">
          Objetivo de mi empresa:
          ofrecer una experiencia de compra en línea conveniente y satisfactoria para los clientes que buscan ropa deportiva de alta calidad y estilo.
          <br>
          <br>

          Misión de mi empresa:
          Ofrecer productos deportivos de alta calidad para ayudar a los clientes a alcanzar sus metas de fitness y deporte.
          <br>
          <br>

          Visión de mi empresa:
          Ser una marca líder en el mercado de ropa deportiva, reconocida por ofrecer productos de alta calidad y diseño innovador.
          <br>
          <br>

          ¿Que somos como empresa ?
          Bienvenidos a nuestra tienda en línea, especializada en la venta de ropa deportiva y artículos deportivos. Aquí encontrarás todo lo que necesitas para practicar tus deportes favoritos, ya sea en el gimnasio, en la pista, en el campo o en la montaña. En nuestra tienda, nos esforzamos por ofrecer productos de alta calidad a precios competitivos.
        </p>
      </div>
    </div>
  </section>

  <section class="steps">
    <h1 class="title">Nuestros socios:</h1>

    <div class="box-container" style="display: grid;
   grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
   gap:1.5rem;
   align-items: flex-start;">
      <div class="box" style="text-align: center;
   padding:2rem;
   border:var(--border);
">
        <iframe width="300" height="315" src="https://www.youtube.com/embed/_2zoIHTWd00" title="YouTube video player" frameborder="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <h3 style=" font-size: 2rem;
   color:var(--black);
   margin:1rem 0;
   text-transform: capitalize;">Empresa asociada:</h3>
        <p style=" font-size: 1.6rem;
   color:var(--light-color);
   line-height: 2;
">
          Nike, Inc.​ (del griego: Νίκη, Niké, victoria;​ NYSE: NKE) es una empresa multinacional estadounidense dedicada al diseño, desarrollo, fabricación y comercialización de equipamiento deportivo: balones, calzado, ropa, equipo, accesorios y otros artículos deportivos.
        </p>
      </div>

      <div class="box" style="text-align: center;
   padding:2rem;
   border:var(--border);
">
        <iframe width="300" height="315" src="https://www.youtube.com/embed/Bv-3Wx2UdbI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <h3 style=" font-size: 2rem;
   color:var(--black);
   margin:1rem 0;
   text-transform: capitalize;">Empresa asociada</h3>
        <p style=" font-size: 1.6rem;
   color:var(--light-color);
   line-height: 2;
">
          Adidas es una multinacional alemana que diseña y fabrica calzado deportivo, ropa y accesorios. La compañía tiene su sede en Herzogenaurach, Baviera, Alemania. Es una marca registrada por el Grupo Adidas, el cual también posee a la marca de ropa deportiva Reebok.
        </p>
      </div>

      <div class="box" style="text-align: center;
   padding:2rem;
   border:var(--border);
">
        <iframe width="300" height="315" src="https://www.youtube.com/embed/Q-f2T21zeTE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <h3 style=" font-size: 2rem;
   color:var(--black);
   margin:1rem 0;
   text-transform: capitalize;">Articulos de gimnasio variados</h3>
        <p style=" font-size: 1.6rem;
   color:var(--light-color);
   line-height: 2;
">
          Un gimnasio (conocido asimismo con el anglicismo gym) es un lugar que permite practicar deportes o hacer ejercicio en un recinto cerrado con varias máquinas y artículos deportivos a disposición de quienes lo visiten y puedan mejorar su salud y enfocarse en su fisico
        </p>
      </div>
    </div>
  </section>


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

    </section>

    <ul>
      <li style="--clr: #1877f2">
        <a href="https://www.facebook.com/profile.php?id=100092618961568"> <i class="fa-brands fa-facebook-f"></i></a>
      </li>
      <li style="--clr: #c32aa3">
        <a href="https://instagram.com/el_tizon_roqueta?igshid=NTc4MTIwNjQ2YQ=="><i class="fa-brands fa-instagram"></i></a>
      </li>
      <li style="--clr: #25d366">
        <a href="https://api.whatsapp.com/send?phone=527751396916"><i class="fa-brands fa-whatsapp"></i></a>
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




  <scrip src="js/script.js">
    </script>


</body>

</html>