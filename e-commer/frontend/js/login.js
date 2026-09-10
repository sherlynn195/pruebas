const formulario = document.getElementById("loginForm");
const mensaje = document.getElementById("mensaje");

formulario.addEventListener("submit", async (event) => {

    event.preventDefault();

    const usuario = document.getElementById("usuario").value.trim();
    const password = document.getElementById("password").value;

    mensaje.textContent = "Verificando...";
    mensaje.className = "mensaje cargando";

    try {

        const respuesta = await fetch("../../backend/api/login.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                usuario: usuario,
                password: password
            })
        });

        const resultado = await respuesta.json();

        if (resultado.success) {

            mensaje.textContent = "Inicio de sesión correcto";
            mensaje.className = "mensaje exito";

            setTimeout(() => {

                if (resultado.rol === "administrador") {
                    window.location.href = "administrador.html";
                }

                if (resultado.rol === "cliente") {
                    window.location.href = "cliente.html";
                }

            }, 500);

        } else {

            window.location.href = "error.html";

        }

    } catch (error) {

        console.error("Error:", error);

        mensaje.textContent = "No se pudo conectar con el servidor.";
        mensaje.className = "mensaje error";

    }

});