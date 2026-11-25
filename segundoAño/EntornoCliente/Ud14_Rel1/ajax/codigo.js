const enlaces = document.querySelectorAll(".enlace-tutorial");

enlaces.forEach(enlace => {
    enlace.addEventListener("click", (event) => {
        event.preventDefault();

        let paginaDestino = enlace.getAttribute("data-pagina");

        if(window.XMLHttpRequest){
            let xmlhttp = new XMLHttpRequest();

            xmlhttp.open("GET", paginaDestino, true);

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                    // Metemos el contenido del tutorial que corresponda
                    document.getElementById("contenido").innerHTML = xmlhttp.responseText;
                }
            };

            xmlhttp.send();
        }
    });
});