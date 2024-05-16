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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../javascript/javascriptpagina.js"></script>
    <title>Tienda Don Gio</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../images/Logo4.png" alt="fondo" style="width: 100%;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Inicio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="homecss">
        <div class="d-flex justify-content-center align-items-center p-3 logincontent">
            <div class="bg-white rounded p-3 content" style="width: 30%;">
                <div class="text-center">
                    <img src="../images/Logo3.png" alt="imagen" class="img-fluid">
                </div>
                <form action="../archivosphp/registroUser.php" method="post">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                        <input type="text" class="form-control" name="usuario" placeholder="usuario" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-at-fill"></i></span>
                        <input type="text" class="form-control" name="correo" placeholder="Correo" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-fill"></i></span>
                        <input type="text" class="form-control" name="telefono" placeholder="Telefono" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill"></i></span>
                        <input type="text" class="form-control" name="contrasena" placeholder="contraseña" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                </form>
                <div class="my-2 text-center">
                    <span class="mx-1">Si ya tienes cuenta</span>
                    <a href="./login.php" class="text-decoration-none">Inicia sesion</a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>