$('.editarproducto').click(function(e){
    e.preventDefault();
    //const buttonId = $(this).attr('id');
    //infoeditar(buttonId);
});

$('.carrito').click(function(e){
    const buttonId = $(this).attr('id');
    agregarCarrito(buttonId);
});
const base_url = 'http://localhost/tiendadongio/';

function calcularTotal() {
    const precioSpan = document.querySelector('#precio');
    const cantidadInput = document.querySelector('#cantidad');

    if (!precioSpan || !cantidadInput) {
        console.error('Elements with IDs "precio" or "cantidad" not found.');
        return;
    }

    const precio = parseFloat(precioSpan.textContent || precioSpan.innerText) || 0;

    cantidadInput.addEventListener('input', function (event) {
        const cantidad = parseFloat(event.target.value) || 0;
        const total = precio * cantidad;

        const totalCompraSpan = document.getElementById('totalcompra');
        if (cantidad == 0) {
            totalCompraSpan.textContent = `$ 0`;
        } else {
            totalCompraSpan.textContent = `$ ${total.toFixed(0)}`;
        }
    });
}

function agregarCarrito(id){

    const dataregistro = {
        id_producto: id
    };

    $.ajax({
        url: base_url+"php/controlador.php?op=comprarProducto",
        type: "POST",
        dataType: "json",
        data: dataregistro,
    }).done(function(data){
        if(data == true){
            Swal.fire({
                title: "!! Atencion !!",
                text: "Se a agregado el producto al carrito",
                icon: "success"
            });
        }else{
            Swal.fire({
                title: "!! Error!!",
                text: "No se a agregado el producto al carrito",
                icon: "error"
            });
        }
    });
}

function noSesion(){
    Swal.fire({
        title: "!! Atencion !!",
        text: "Solo para usuarios registrados, profavor inicie sesion o registrese a nuestra tienda.",
        icon: "info"
    });
}