<?php
require 'database.php';
require 'config.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';
if ($id == '' || $token == '') {
    echo 'Error al procesar la peticion';
} else {
    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);
    if ($token == $token_tmp) {

        $sql = $conn->prepare("SELECT count(id)  FROM  shorts WHERE id=? and activo = 1");
        $sql->execute([$id]);

        if ($sql->fetchColumn() > 0) {

            $sql = $conn->prepare("SELECT  nombre, descripcion, precio, descuento  FROM  shorts WHERE id=? and activo = 1 LIMIT 1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $precio = $row['precio'];
            $descuento = $row['descuento'];
            $precio_desc = $precio - (($precio * $descuento) / 100);
            $dir_images = 'Producto/' . $id . '/';

            $rutaImg = $dir_images . 'short.jpg';

            if (!file_exists($rutaImg)) {
                $rutaImg = 'Producto/no_image.png';
            }
            $imagenes = array();
            $dir = dir($dir_images);
            while (($archivo = $dir->read()) != false) {
                if ($archivo != 'short.jpg' && (strpos($archivo, 'jpg'))) {
                    $imagenes[] = $dir_images . $archivo;
                }
            }
            $dir->close();
        }
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo 'Error al procesar la peticion';
        exit;
    }
}



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
                <a href="shorts.php"> Regresar a los productos</a>
                <!-- <a href="building.html">Contacto</a> -->
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
    <!-- seccion header fin -->
    <main>
        <div class="Container">
            <div class="row">
                <div class="col-md-6 order-md-1">
                    <img style="padding-left: 50px;" src="<?php echo $rutaImg;  ?>" alt="" width=" 350" height="300">
                </div>
                <div class="col-md-6 order-md-2">
                    <h2 style="font-size: 50px; "><?php echo $nombre; ?></h2>
                    <?php if ($descuento > 0) { ?>
                        <h2 style="font-size: 40px; text-decoration: line-through;"><?php echo MONEDA . $precio; ?></h2>
                        <h2 style="font-size: 40px;"><?php echo MONEDA . $precio_desc; ?> <br><small class="text-success"> <?php echo $descuento; ?> % Descuento </small></h2>

                    <?php } else { ?>
                        <h2 style="font-size: 40px;"><?php echo MONEDA . $precio; ?></h2>
                    <?php } ?>
                    <p style="font-size: 30px; font-style: italic;" class="lead">
                        <?php echo $descripcion; ?>
                    </p>
                    <div class="d-grid gap-3 col-10 mx-auto"></div>

                    <button class="btn btn-outline-success" type="button" onclick="addProducto( <?php echo $id; ?>, '<?php echo $token_tmp; ?>')">Agregar al carrito</button>


                </div>

            </div>


        </div>
    </main>

    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- Pie de pagina comienzo -->
    <footer class="footer">

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
    <script src="JS/script.js"></script>
    <script>
        function addProducto(id, token) {
            let url = 'carrito.php';
            let formData = new FormData();
            formData.append('id', id);
            formData.append('token', token);

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        let elemento = document.getElementById("num_cart");
                        elemento.innerHTML = data.numero
                    }
                })


        }
    </script>

</body>

</html>