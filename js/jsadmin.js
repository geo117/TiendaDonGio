$('#crear').click(crear);
$('.editarproducto').click(function(e){
    e.preventDefault();
    const buttonId = $(this).attr('id');
    infoeditar(buttonId);
});
$('#editar').click(editarProducto);
$('.eliminarV').click(function(e){
    const buttonId = $(this).attr('id');
    eliminarProducto(buttonId);
});

const base_url = 'http://localhost/tiendadongio/';
//$('.editarproducto').click(infoeditar);

function crear() {
    const nombre  = document.getElementById('nombre').value;
    const descripcion  = document.getElementById('descripcion').value;
    const cantidad  = document.getElementById('cantidad').value;
    const precio  = document.getElementById('precio').value;

    const dataregistro = {
        nombre: nombre,
        descripcion: descripcion,
        cantidad: cantidad,
        precio: precio
    };
    //console.log(dataregistro);
    $.ajax({
        url: base_url+"php/controlador.php?op=registrarProducto",
        type: "POST",
        dataType: "json",
        data: dataregistro,
    }).done(function(data){
        //console.log(JSON.stringify(data['msj1']));
        if(data['msj1'] == "exito"){
            document.getElementById('nombre').value = "";
            document.getElementById('descripcion').value = "";
            document.getElementById('cantidad').value = "";
            document.getElementById('precio').value = "";
            registroProducto();
        }

        if(data['msj3'] == "error sql" || data['msj2'] == "error"){
            errorProducto();
        };
    });
}
function infoeditar(id) {
    const nombre_edit = document.getElementById('nombre_edit');
    const descripcion_edit = document.getElementById('descripcion_edit');
    const cantidad_edit = document.getElementById('cantidad_edit');
    const precio_edit = document.getElementById('precio_edit');
    const idinput = document.getElementById('idproducto');

    const dataregistro = {
        id_producto: id
    };

    $.ajax({
        url: base_url+"php/controlador.php?op=infoProducto",
        type: "POST",
        dataType: "json",
        data: dataregistro
    }).done(function(data){
        //console.log(JSON.stringify(data));
        nombre_edit.value = data["nombre"];
        descripcion_edit.value = data["descripcion"];
        cantidad_edit.value = data["cantidad"];
        precio_edit.value = data["precio"];
        idinput.value = id;
    });
}

function editarProducto() {
    const nombre_edit = document.getElementById('nombre_edit').value;
    const descripcion_edit = document.getElementById('descripcion_edit').value;
    const cantidad_edit = document.getElementById('cantidad_edit').value;
    const precio_edit = document.getElementById('precio_edit').value;
    const idinput = document.getElementById('idproducto').value;

    const dataregistro = {
        nombre_edit: nombre_edit,
        descripcion_edit: descripcion_edit,
        cantidad_edit: cantidad_edit,
        precio_edit: precio_edit,
        idinput: idinput,
    };

    $.ajax({
        url: base_url+"php/controlador.php?op=editarProducto",
        type: "POST",
        dataType: "json",
        data: dataregistro
    }).done(function(data){
        console.log(JSON.stringify(data));
    });

}

function eliminarProducto(id) {
    const dataregistro = {
        id_producto: id
    };

    Swal.fire({
        title: "Esta seguro?",
        text: "Si continua, el registro sera eliminado del sistema",
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminar"
    }).then((result) => {
        if (result.isConfirmed) {
        
            $.ajax({
                url: base_url+"php/controlador.php?op=eliminarProducto",
                type: "POST",
                dataType: "json",
                data: dataregistro
            }).done(function(data){
                if(data['msj1'] === "exito"){
                    Swal.fire({
                        title: "Eliminado!",
                        text: "se ha eliminado el producto",
                        icon: "success"
                    });
                }else{
                    Swal.fire({
                        title: "!!! Error !!!",
                        text: "No se ha eliminado el producto",
                        icon: "error"
                    });
                }
            });
        }
    });
}

function registroProducto(){
    Swal.fire({
        title: "!! Exito !!",
        text: "se ha registrado el nuevo producto",
        icon: "success"
    });
};

function errorProducto(){
    Swal.fire({
        title: "!! Error !!",
        text: "Error en la creación del producto",
        icon: "error"
    });
};