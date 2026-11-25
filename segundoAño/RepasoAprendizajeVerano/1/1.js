//Método con POST

const formularioEliminar = document.querySelector('#eliminar');
const body = document.body;

const p = document.createElement("p");
p.classList.add("texto");

formularioEliminar.addEventListener("submit", (event) => {
    if(!confirm("¿Estás seguro?")){
        event.preventDefault();

        return;
    }/*else{
        event.preventDefault();

        const id = formularioEliminar.eliminar_numero.value;

        p.textContent = `Este es el número borrado: ${id}`;

        body.append(p);
    }
        
    Esto no funcionaría sin el preventDefault, ya que se refresca la página y no se muestra el contenido dinámico creado por JavaScript*/
});

//Método con GET

const botones = document.querySelectorAll(".eliminar");

botones.forEach(boton => {
    boton.addEventListener("click", event => {
        const id = event.target.dataset.id;

        if(confirm("¿Estás seguro?")){
            window.location.href = window.location.pathname + `?eliminar_numero=${id}`
        }
    });
});