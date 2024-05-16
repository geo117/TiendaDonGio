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

?>