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

    if($op == "registrarProducto"){
        date_default_timezone_set('America/Bogota');
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $fechaCreacion = date('Y-m-d');
        //print_r($_POST);

        $user  = $_SESSION['usuario']['correo'];
        $userquery = "SELECT * FROM usuarios WHERE correo = '$user'";
        $resultuser = $conn->query($userquery);
        $rowuser = $resultuser->fetch_assoc();
        $iduser = $rowuser['id'];

        $userquery = "INSERT INTO productos(id_cliente, nombre, descripcion, cantidad, precio, created_at) VALUES ('$iduser','$nombre','$descripcion','$cantidad','$precio', '$fechaCreacion')";
        $result = $conn->query($userquery);
        //echo json_encode($userquery);

        if($result == true){
            echo json_encode(["msj1" => "exito"]);
        }else{
            echo json_encode(["msj2" => "error sql"]);
        };
    }

    if($op == "infoProducto"){
        $id =  $_POST['id_producto'];

        $userquery = "SELECT * FROM productos WHERE id = $id";
        $result = $conn->query($userquery);
        $row = $result->fetch_assoc();
        echo json_encode($row);
    }

    if($op == "editarProducto"){
        $nombre_edit =  $_POST['nombre_edit'];
        $descripcion_edit = $_POST['descripcion_edit'];
        $cantidad_edit = $_POST['cantidad_edit'];
        $precio_edit = $_POST['precio_edit'];
        $idinput = $_POST['idinput'];
        $fechaEdicion = date('Y-m-d');

        $userquery = "UPDATE productos SET nombre='$nombre_edit',descripcion='$descripcion_edit',cantidad='$cantidad_edit',precio='$precio_edit',updated_at='$fechaEdicion' WHERE id = $idinput";
        $result = $conn->query($userquery);

        if($result == true){
            echo json_encode(["msj1" => "exito"]);
        }else{
            echo json_encode(["msj2" => "error sql"]);
        };
    }

    if($op == "eliminarProducto"){
        $id =  $_POST['id_producto'];
        $userquery = "DELETE FROM productos WHERE id = $id";
        $result = $conn->query($userquery);

        if($result == true){
            echo json_encode(["msj1" => "exito"]);
        }else{
            echo json_encode(["msj2" => "error sql"]);
        };
    }

    if($op == "comprarProducto"){
        
    }
?>