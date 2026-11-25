const director = document.getElementById("director");
const operario = document.getElementById("operario");
const jefeDPTO = document.getElementById("jefeDPTO");
const mensajeDirector = document.getElementById("mensajeDirector");

function actualizarEstados() {
    const estado = director.checked;

    operario.disabled = estado;
    jefeDPTO.disabled = estado;

    if (estado) {
        operario.checked = false;
        jefeDPTO.checked = false;

        mensajeDirector.classList.add("mostrar");
    } else {
        mensajeDirector.classList.remove("mostrar");
    }
}

// Se ejecutar al cargar/recargar la página
actualizarEstados();

// Escucha los cambios al interactuar el usuario
director.addEventListener("change", actualizarEstados);