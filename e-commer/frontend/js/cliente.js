// Ruta de la API que devuelve el catálogo
const URL_PRODUCTOS = '../../backend/api/productos.php';
const CLAVE_CARRITO = 'carritoCompra';

const catalogoDiv = document.getElementById('catalogo');
const cantidadCarritoSpan = document.getElementById('cantidadCarrito');
const btnVerResumen = document.getElementById('btnVerResumen');

// --- Manejo del carrito en localStorage ---

function obtenerCarrito() {
    const datos = localStorage.getItem(CLAVE_CARRITO);
    return datos ? JSON.parse(datos) : [];
}

function guardarCarrito(carrito) {
    localStorage.setItem(CLAVE_CARRITO, JSON.stringify(carrito));
}

function agregarAlCarrito(id, cantidad) {
    const carrito = obtenerCarrito();
    const existente = carrito.find(item => item.id === id);

    if (existente) {
        existente.cantidad += cantidad;
    } else {
        carrito.push({ id: id, cantidad: cantidad });
    }

    guardarCarrito(carrito);
    actualizarBarraCarrito();
}

function actualizarBarraCarrito() {
    const carrito = obtenerCarrito();
    const totalProductos = carrito.reduce((suma, item) => suma + item.cantidad, 0);

    cantidadCarritoSpan.textContent = totalProductos;
    btnVerResumen.disabled = totalProductos === 0;
}

// --- Carga del catálogo ---

async function cargarCatalogo() {
    try {
        const respuesta = await fetch(URL_PRODUCTOS);
        const datos = await respuesta.json();

        if (!datos.exito) {
            catalogoDiv.innerHTML = '<p class="mensaje-vacio">No se pudo cargar el catálogo.</p>';
            return;
        }

        renderizarProductos(datos.productos);
    } catch (error) {
        catalogoDiv.innerHTML = '<p class="mensaje-vacio">Error al conectar con el servidor.</p>';
        console.error(error);
    }
}

function renderizarProductos(productos) {
    if (productos.length === 0) {
        catalogoDiv.innerHTML = '<p class="mensaje-vacio">No hay productos disponibles.</p>';
        return;
    }

    catalogoDiv.innerHTML = '';

    productos.forEach(producto => {
        const agotado = producto.existencias <= 0;

        const tarjeta = document.createElement('div');
        tarjeta.className = 'tarjeta-producto';

        tarjeta.innerHTML = `
            <img src="${producto.imagen}" alt="${producto.nombre}"
                 onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22220%22 height=%22160%22><rect width=%22220%22 height=%22160%22 fill=%22%23e0e0e0%22/><text x=%2250%25%22 y=%2250%25%22 font-size=%2214%22 fill=%22%23888%22 text-anchor=%22middle%22 dy=%22.3em%22>Sin imagen</text></svg>'">
            <div class="info">
                <h3>${producto.nombre}</h3>
                <div class="precio">$${producto.precio.toFixed(2)}</div>
                <div class="existencias ${agotado ? 'agotado' : ''}">
                    ${agotado ? 'Agotado' : 'Existencias: ' + producto.existencias}
                </div>
                <div class="controles">
                    <input type="number" min="1" max="${producto.existencias}" value="1"
                           id="cantidad-${producto.id}" ${agotado ? 'disabled' : ''}>
                    <button data-id="${producto.id}" ${agotado ? 'disabled' : ''}>
                        Agregar
                    </button>
                </div>
            </div>
        `;

        const boton = tarjeta.querySelector('button');
        boton.addEventListener('click', () => {
            const id = parseInt(boton.dataset.id, 10);
            const inputCantidad = document.getElementById(`cantidad-${id}`);
            let cantidad = parseInt(inputCantidad.value, 10);

            if (isNaN(cantidad) || cantidad < 1) {
                cantidad = 1;
            }
            if (cantidad > producto.existencias) {
                cantidad = producto.existencias;
            }

            agregarAlCarrito(id, cantidad);
            boton.textContent = 'Agregado ✓';
            setTimeout(() => { boton.textContent = 'Agregar'; }, 900);
        });

        catalogoDiv.appendChild(tarjeta);
    });
}

// --- Eventos ---

btnVerResumen.addEventListener('click', () => {
    window.location.href = 'resumen.html';
});

// --- Inicio ---
cargarCatalogo();
actualizarBarraCarrito();