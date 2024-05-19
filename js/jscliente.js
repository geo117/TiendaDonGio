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