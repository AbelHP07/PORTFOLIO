const camposObligatorios = document.querySelectorAll('[required]');

camposObligatorios.forEach(campo => {

    campo.addEventListener("invalid", () => {
        campo.setCustomValidity("No se puede dejar el campo vacío ni con menos de 3 caracteres");
    });

    campo.addEventListener("input", () => {
        campo.setCustomValidity("");
    });

});


const categoria = document.getElementById("cat");

if (categoria) {

    categoria.addEventListener("change", () => {
        categoria.blur();
    });

}

const formEliminar = document.querySelectorAll('.formEliminar');

if(formEliminar){
    formEliminar.forEach(form => {
        form.addEventListener('submit', (event) => {
            const eliminar = confirm("¿Seguro que quieres eliminar al empleado?");

            if(!eliminar){
                event.preventDefault();
            }
        });
    });
}