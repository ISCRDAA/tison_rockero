<?php
require 'database.php';
require 'config.php';

$productos = isset($_SESSION['carrito']['productos']) ?  $_SESSION['carrito']['productos'] : null;


$lista_carrito = array();

if ($productos != null) {
    foreach ($productos as $clave => $cantidad) {
        $sql = $conn->prepare("SELECT id, nombre, descripcion, precio, descuento, $cantidad AS cantidad  FROM  productos WHERE id=? AND activo = 1");
        $sql->execute([$clave]);
        $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
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
    <script src="https://www.paypal.com/sdk/js?client-id=AfUZ2Fnb-y_YXq7eaNYfBSjRyc-K424nIh7MBPwrLzkwlicRtrj_AnmOjKdpKG_-EiK372QUZzc8OOTX&locale=en_MX&currency=MXN"></script>

</head>

<body>
    <!-- seccion header comienzo -->
    <header class="header">
        <section class="flex">
            <a href="index.php" class="logo">
                <img src="logo de empresa/logo empresa 1.png" alt="logo de la empresa" /></a>
            <nav class="navbar">
                <a href="index.php">Inicio de pagina</a>
                <!-- <a href="building.html">Productos</a> -->
                <a href="about.php">Sobre nosotros</a>

                <!-- <a href="building.html">Contacto</a> -->
            </nav>
            <div class="icons">

                <a href="carrito.php"><i class="fas fa-shopping-cart"></i> <span id="num_cart"><?php echo $num_cart; ?></span></a>
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
            <div class="table-responsive">
                <table style="font-size: 2rem;" class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($lista_carrito == null) {
                            echo '<tr><td colspan="5" class="text-center"><b>Lista vacia</b></td></tr>';
                        } else {
                            $total = 0;
                            foreach ($lista_carrito as $producto) {
                                $_id = $producto['id'];
                                $nombre = $producto['nombre'];
                                $precio = $producto['precio'];
                                $cantidad = $producto['cantidad'];
                                $descuento = $producto['descuento'];
                                $precio_desc = $precio - (($precio * $descuento) / 100);
                                $subtotal = $cantidad * $precio_desc;
                                $total += $subtotal;


                        ?>

                                <tr>
                                    <td> <?php echo $nombre ?></td>
                                    <td> <?php echo MONEDA . $precio_desc ?></td>
                                    <td> <?php echo $cantidad ?></td>
                                    <td>
                                        <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"> <?php echo MONEDA . $subtotal  ?></div>
                                    </td>
                                    <td>
                                        <a href="#" id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo $_id; ?>" data-bs-toogle="modal" data-bs-target="eliminaModal">Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3"></td>
                                <td colspan="2">
                                    <p colspan="h3" id="total">
                                        <?php echo  MONEDA . $total ?> </p>
                                </td>

                            </tr>
                    </tbody>
                <?php } ?>
                </table>
            </div>

        </div>
    </main>
    <div id="paypal-button-container"></div>

    <script>
        paypal.Buttons({
            style: {

                color: 'black',
                shape: 'pill',
                label: 'buynow',
                layout: 'vertical',
                height: 30,
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: <?php echo $total ?>
                        }
                    }]
                });
            },

            onApprove: function(data, actions) {
                actions.order.capture().the(function(detalles) {
                    window.location.herf = "completado.html"
                });
            },

            onCancel: function(data) {
                alert("pago cancelado");
                console.log(data);
            }
        }).render('#paypal-button-container');
    </script>

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