<?php
    include "../db/conexion.php";
    session_start();

    $op =  $_GET['op'];

    if($op == "iniciarsesion"){
        $usuario =  $_POST['usuario'];
        $pass = $_POST['contrasena'];
        
        $userquery = "SELECT * FROM usuarios WHERE correo = '$usuario'";
        $result = $conn->query($userquery);
        $row = $result->fetch_assoc();
        //echo json_encode($row);

        if($result->num_rows > 0){
            if ($usuario == $row['correo'] && $pass == $row['password']) {
                // Iniciar sesión del usuario
                $_SESSION['usuario'] = [
                    'nombre' => $row['nombre'],
                    'correo' => $row['correo'],
                    'rol' => $row['rol']
                ];
                echo json_encode(["msj1" => "exito"]);
            } else {
                echo json_encode(["msj2" => "error"]);
            };
        }else{
            echo json_encode(["msj3" => "error sql"]);
        }
    }

    if($op == "registrosesion"){
        date_default_timezone_set('America/Bogota');
        $usuario = $_POST['usuario'];
        $correo = $_POST['correo'];
        $pass = $_POST['pass'];
        $rol = $_POST['rol'];
        $telefono = $_POST['telefono'];
        $fechaCreacion = date('YYYY-mm-dd');

        $userquery = "INSERT INTO usuarios(nombre, correo, password, rol, telefono, createdAt) 
        VALUES ('$usuario','$correo','$pass','$rol','$telefono', '$fechaCreacion')";
        $result = $conn->query($userquery);
        $row = $result->fetch_assoc();

        if($result->num_rows > 0){
            echo json_encode(["msj1" => "exito"]);
        }else{
            echo json_encode(["msj2" => "error sql"]);
        }
    }
?>