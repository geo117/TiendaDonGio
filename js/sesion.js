$('#enviar').click(enviar);

function enviar() {
    const usuario = document.getElementById('usuario').value;
    const pass = document.getElementById('contrasena').value;
    const respuesta = document.getElementById('respuesta').value;
    const base_url = 'http://localhost/tiendadongio/';

    const dataregistro = {
        usuario: usuario,
        contrasena: pass
    };

    if(usuario == "" || pass == ""){
        camposVacios();
    }else{
        $.ajax({
            url: base_url+"php/controlador.php?op=iniciarsesion",
            type: "POST",
            dataType: "json",
            data: dataregistro,
        }).done(function(data){
            //console.log(JSON.stringify(data['msj1']));
            if(data['msj1'] == "exito"){
                //exitoSesion();
                window.location.href = "../index.php";
            }

            if(data['msj3'] == "error sql" || data['msj2'] == "error"){
                errorSesion();
            }
            
    
        });
    }

}

function camposVacios(){
    Swal.fire({
        title: "!! Error !!",
        text: "Los campos estan vacios, porfavor digite un usuario y contraseña",
        icon: "error"
    });
}
function errorSesion(){
    Swal.fire({
        title: "!! Error !!",
        text: "usuario y contraseña incorrectos",
        icon: "error"
    });
}
function exitoSesion(){
    Swal.fire({
        title: "!! Exito !!",
        text: "a ingresado al sistema",
        icon: "success"
    });
}