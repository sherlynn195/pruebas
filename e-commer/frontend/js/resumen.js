const URL_RESUMEN = '../../backend/api/resumen.php';
const CLAVE_CARRITO = 'carritoCompra';

const contenidoResumen = document.getElementById('contenidoResumen');
const totalFinalDiv = document.getElementById('totalFinal');
const btnConfirmar = document.getElementById('btnConfirmar');

function obtenerCarrito() {
    const datos = localStorage.getItem(CLAVE_CARRITO);
    return datos ? JSON.parse(datos) : [];
}

async function cargarResumen() {
    const carrito = obtenerCarrito();

    if (carrito.length === 0) {
        contenidoResumen.innerHTML = '<p class="mensaje-vacio">No has seleccionado productos todavía.</p>';
        btnConfirmar.disabled = true;
        return;
    }

    try {
        const respuesta = await fetch(URL_RESUMEN, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ items: carrito })
        });

        const datos = await respuesta.json();

        if (!datos.exito || datos.detalle.length === 0) {
            contenidoResumen.innerHTML = '<p class="mensaje-vacio">No se pudo calcular el resumen.</p>';
            btnConfirmar.disabled = true;
            return;
        }

        renderizarResumen(datos.detalle, datos.total);
    } catch (error) {
        contenidoResumen.innerHTML = '<p class="mensaje-vacio">Error al conectar con el servidor.</p>';
        console.error(error);
    }
}

let totalActual = 0;

function renderizarResumen(detalle, total) {
    totalActual = total;
    let filas = '';

    detalle.forEach(item => {
        filas += `
            <tr>
                <td>${item.nombre}</td>
                <td>$${item.precio.toFixed(2)}</td>
                <td>${item.cantidad}</td>
                <td>$${item.subtotal.toFixed(2)}</td>
            </tr>
        `;
    });

    contenidoResumen.innerHTML = `
        <table class="tabla-resumen">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio unitario</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                ${filas}
            </tbody>
        </table>
    `;

    totalFinalDiv.textContent = `Total a pagar: $${total.toFixed(2)}`;
    
}

const modalOverlay = document.getElementById('modalOverlay');
const modalTotal = document.getElementById('modalTotal');
const btnCerrarModal = document.getElementById('btnCerrarModal');

btnConfirmar.addEventListener('click', () => {
    modalTotal.textContent = `Total pagado: $${totalActual.toFixed(2)}`;
    modalOverlay.classList.add('visible');
    localStorage.removeItem(CLAVE_CARRITO);
});

btnCerrarModal.addEventListener('click', () => {
    window.location.href = 'cliente.html';
});

cargarResumen();