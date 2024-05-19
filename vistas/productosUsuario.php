<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="icon" href="../images/Logo3.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Tienda Don Gio</title>
</head>

<body>
    <header class="cabecera">
        <div class="headercontent">
            <img src="../images/Logo3.png" alt="fondo" class="img-fluid">
        </div>
    </header>
    <div class="homecss">
        <nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand btn">
                    <img src="../images/logo4.png" alt="fondo" style="width: 100%;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active btn" aria-current="page" href='../index.php'>Inicio</a>
                        </li>
                        <?php
                            include '../db/conexion.php';
                            session_start();
                            if (isset($_SESSION['usuario'])) {
                                echo "<li class='nav-item'>";
                                echo "   <a class='nav-link active btn' aria-current='page'><i class='bi bi-basket3-fill'></i></a>";
                                echo "</li>";
                            } else {
                                echo "<li class='nav-item'>";
                                echo "   <a class='nav-link active btn' disabled aria-current='page'><i class='bi bi-basket3-fill'></i></a>";
                                echo "</li>";
                            }
                        ?>
                        <li class="nav-item dropdown">
                            <?php
                            if (isset($_SESSION['usuario'])) {
                                $texto  = $_SESSION['usuario']['nombre'];
                                $primer_espacio = strpos($texto, " ");
                                $primeros_caracteres = substr($texto, 0, $primer_espacio);
                                $textofinal = $primeros_caracteres == "" ? $texto : $primeros_caracteres;

                                echo "<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>";
                                echo "Bienvenido " . $textofinal;
                                echo "</a>";
                                echo "<ul class='dropdown-menu dropdown-menu-lg-end'>";
                                if ($_SESSION['usuario']['rol'] == "admin") {
                                    echo "    <li><a class='dropdown-item btn'><span class='fw-bold'>su rol es " . $_SESSION['usuario']['rol'] . "</span></a></li>";
                                    echo "    <hr class='m-0 p-0'/>";
                                    echo "    <li><a class='dropdown-item btn'><span class='fw-bold text-primary active'>Inventario Productos</span></a></li>";
                                    echo "    <li><a class='dropdown-item' href='./adminusuarios.php'>Usuarios sistema</a></li>";
                                    echo "    <li>";
                                    echo "        <hr class='dropdown-divider'>";
                                    echo "    </li>";
                                } else {
                                    echo "    <li><a class='dropdown-item btn'><span class='fw-bold'>su rol es " . $_SESSION['usuario']['rol'] . "</span></a></li>";
                                    echo "    <li>";
                                    echo "        <hr class='dropdown-divider'>";
                                    echo "    </li>";
                                }
                                echo "    <li>";
                                echo "      <a class='dropdown-item' href='./logout.php' name='enviar'>Cerrar sesion</a></li>";
                                echo "    </li>";
                                echo "</ul>";
                            } else {
                                //header('Location: ./page/login.php');
                                echo "<a class='nav-link' role='button' href='./login.php'>";
                                echo "Inciar sesion";
                                echo "</a>";
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="contenido">
            <br />
            <div class="container-fluid-sm px-2">
                <div class="container-md py-2 mb-2 text-center bg-white rounded">
                    <h3>Compras agregadas al carrito</h3>
                </div>
                <div class="container-md p-3 bg-white rounded table-responsive mb-3 tablaproductos">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <div style="max-height: 40rem; overflow-y: auto;">
                                    <?php
                                        $sql = "SELECT v.id,u.nombre,p.nombre as producto,v.estado_compra,v.cantidad,v.total,v.createdAt,p.imagen,p.descripcion,p.precio,v.id_cliente
                                        FROM ventas as v
                                        INNER JOIN usuarios as u ON v.id_cliente = u.id
                                        INNER JOIN productos as p ON v.id_producto = p.id";
                                        $result = $conn->query($sql);
                                        $contador = 0;
                                        function valorFromat($price)
                                        {
                                            setlocale(LC_MONETARY, 'es_CO.utf8');
                                            $formattedPrice = number_format($price, 0, '.', ',');
                                            $formattedPrice = str_replace('.00', '', $formattedPrice);
                                            return $formattedPrice;
                                        };

                                        while ($row = $result->fetch_assoc()) {
                                            if($row["estado_compra"] == "pendiente" && $_SESSION['usuario']['id'] == $row["id_cliente"]){
                                                $contador++;
                                    ?>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-4 rounded border border-success d-flex justify-content-center align-items-center">
                                                    <img src="<?php echo $row["imagen"] ?>" class="img-fluid" alt="deporte" width="150" height="150" />
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="px-3">
                                                        <h4 class="text-center border-bottom py-2"><?php echo $row["producto"] ?></h4>
                                                        <p><?php echo $row["descripcion"] ?></p>
                                                        <p class="m-0 p-0">
                                                            <b class="fs-5">Cantidad en stock:</b><span class="mx-2"><?php echo $row["cantidad"] ?></span> <br />
                                                        </p>
                                                        <p class="m-0 p-0">
                                                            <b class="fs-5">Precio:</b><span class="mx-2 preciocarrito">$<?php echo valorFromat($row["precio"]) ?></span>
                                                        </p>
                                                        <div class="m-0 p-0">
                                                            <div class="fw-bold" style="width: 252px; font-size: 18px;">Catidad a comprar:</div>
                                                            <input type="text" class="form-control cantidad" placeholder="Cantidad" style="width: 255px;">
                                                        </div>
                                                        <div class="border-top my-2 py-2">
                                                            <b class="fw-bold">Valor compra:</b><span class="mx-2">$5252</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                    <?php
                                            }   
                                        };
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div>
                                    <div class="mb-3">
                                        <b class="fw-bold" style="font-size: 20px;">Total compra:</b><span class="mx-2">$25.0000</span>
                                    </div>
                                    </div>
                                        <button class="btn btn-success w-100">Confirmar compra</button>
                                    <div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="footercontent">
            <div class="container py-3">
                <div class="row">
                    <div class="col-md-6">
                        <div class="bg-white rounded texto align-text-bottom">
                            <div class="container text-center py-4 redessociales">
                                <a class="btn ronunded"><i class="bi instagram icono bi-instagram"></i></a>
                                <a class="btn ronunded"><i class="bi text-primary icono bi-facebook"></i></a>
                                <a class="btn ronunded"><i class="bi text-success icono bi-whatsapp"></i></a>
                                <a class="btn ronunded"><i class="bi text-danger icono bi-youtube"></i></a>
                            </div>
                            <p class="text-center text-muted m-0">Copyright &copy; 2024</p>
                            <p class="text-center text-muted m-0">Todos los derechos reservados</p>
                            <p class="text-center text-muted m-0">Desarrollado por Andres Geovanny Rojas Pedraza</p>
                            <p class="text-center text-muted m-0">Ingeniería de Software 1 ACA 3</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1148.455577272361!2d-74.09513936281056!3d4.748987713505943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f845f25f3933b%3A0x628847c6079ba902!2sPlaza%20Imperial%20Centro%20Comercial!5e0!3m2!1ses-419!2sco!4v1715828823038!5m2!1ses-419!2sco" width="500" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/jscliente.js"></script>
</body>

</html>