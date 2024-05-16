<?php
    include './db/conexion.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="icon" href="./images/Logo3.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./javascript/javascriptpagina.js"></script>
    <title>Tienda Don Gio</title>
</head>
<body>
    <header class="cabecera">
        <div class="headercontent">
            <img src="./images/Logo3.png" alt="fondo" class="img-fluid">
        </div>
    </header>
    <div class="homecss">
        <nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand btn">
                    <img src="./images/logo4.png" alt="fondo" style="width: 100%;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active btn" aria-current="page">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active btn" aria-current="page"><i class="bi bi-basket3-fill"></i></a>
                        </li>
                        <li class="nav-item dropdown">
                            <?php
                                if (isset($_SESSION['usuario'])) {
                                    $texto  = $_SESSION['usuario']['nombre'];
                                    $primer_espacio = strpos($texto, " ");
                                    $primeros_caracteres = substr($texto, 0, $primer_espacio);
                                    $textofinal = $texto == "admin" ? "admin" : $primeros_caracteres;

                                    echo "<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>";
                                    echo "Bienvenido ".$textofinal;
                                    echo "</a>";
                                    echo "<ul class='dropdown-menu dropdown-menu-lg-end'>";
                                    if($_SESSION['usuario']['rol'] == "admin"){
                                        echo "    <li><a class='dropdown-item btn'><span class='fw-bold'>su rol es ".$_SESSION['usuario']['rol']."</span></a></li>";
                                        echo "    <li><a class='dropdown-item' href='./page/adminpage.php'>Inventario Carros</a></li>";
                                        echo "    <li><a class='dropdown-item' href='./page/adminusuarios.php'>Usuarios sistema</a></li>";
                                        echo "    <li>";
                                        echo "        <hr class='dropdown-divider'>";
                                        echo "    </li>";
                                    }elseif($_SESSION['usuario']['rol'] == "vendedor"){
                                        echo "    <li><a class='dropdown-item btn'>su rol es ".$_SESSION['usuario']['rol']."</a></li>";
                                        echo "    <li><a class='dropdown-item' href='./page/usuariopage.php'>Carros usuario</a></li>";
                                        echo "    <li><a class='dropdown-item' href='./page/perfil.php'>Perfil</a></li>";
                                        echo "    <li>";
                                        echo "        <hr class='dropdown-divider'>";
                                        echo "    </li>";
                                    }else{
                                        echo "    <li><a class='dropdown-item btn'>su rol es ".$_SESSION['usuario']['rol']."</a></li>";
                                        echo "    <li>";
                                        echo "        <hr class='dropdown-divider'>";
                                        echo "    </li>";
                                    }
                                    echo "    <li>";
                                    echo "      <a class='dropdown-item' href='./vistas/logout.php' name='enviar'>Cerrar sesion</a></li>";
                                    echo "    </li>";
                                    echo "</ul>";
                                }else{
                                    //header('Location: ./page/login.php');
                                    echo "<a class='nav-link' role='button' href='./vistas/login.php'>";
                                    echo "Inciar sesion";
                                    echo "</a>";
                                }
                            ?> 
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid contenido">
            <div class="container bg-white my-3 rounded p-3">
                <div class="row">
                    <?php
                        
                        // Define the number of items per page (adjust as needed)
                        $items_per_page = 9;

                        // Get the total number of items (replace with your actual query)
                        $total_items_query = "SELECT COUNT(*) FROM productos";  // Replace with your table name
                        $result = $conn->query($total_items_query);
                        $total_items = $result->fetch_assoc()["COUNT(*)"];
                        //$total_items2 = count($total_items);

                        // Calculate the number of pages (rounded up)
                        //var_dump($total_items. "/" .$items_per_page);
                        $total_pages = ceil($total_items / $items_per_page);
                        // Get the current page number (default to 1)
                        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

                        // Limit the query based on current page and items per page
                        $offset = ($current_page - 1) * $items_per_page;
                        $limit = $items_per_page;
                        $sql = "SELECT * FROM productos LIMIT $limit OFFSET $offset";  // Replace with your actual query
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                    ?>
                        <div class="col-sm-6 col-md-3 mb-3 d-flex justify-content-center align-items-center">
                            <div class="card" style="width: 16rem;">
                                <img src="https://www.elcarrocolombiano.com/wp-content/uploads/2021/02/20210208-TOP-75-CARROS-MAS-VENDIDOS-DE-COLOMBIA-EN-ENERO-2021-01.jpg" class="card-img-top" alt="carro">
                                <div class="card-body">
                                    <h5 class="card-title text-wrap titulop"><?php echo $row["nombre"] ?></h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>

                    <?php
                        };
                    ?>
                </div>
            </div>
            <br />
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
                            <p class="text-center text-muted m-0">Desarrollo Web ACA 3</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1148.455577272361!2d-74.09513936281056!3d4.748987713505943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f845f25f3933b%3A0x628847c6079ba902!2sPlaza%20Imperial%20Centro%20Comercial!5e0!3m2!1ses-419!2sco!4v1715828823038!5m2!1ses-419!2sco" 
                            width="500" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>