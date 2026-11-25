const numero = prompt("Escribe un número para obtener su tabla de multiplicar");

    if(numero){
        document.write(`<div class="borde-exterior titulo">`);
        document.write(`<p class="borde-interior titulo">TABLA DE MULTIPLICAR DEL ${numero}</p>\n`);
        document.write(`</div>`);
        document.write(`<div class="contenido">`);
        //---------------------------------------------------------
        document.write(`
            <div class="borde-exterior fila">
                <p class="borde-interior">${numero} * 0</p>
                <p class="borde-interior segundo">${numero * 0}</p>
            </div>
        `);
        //---------------------------------------------------------
        document.write(`
            <div class="borde-exterior fila">
                <p class="borde-interior">${numero} * 1</p>
                <p class="borde-interior segundo">${numero * 1}</p>
            </div>
        `);
        //---------------------------------------------------------
        document.write(`
            <div class="borde-exterior fila">
                <p class="borde-interior">${numero} * 2</p>
                <p class="borde-interior segundo">${numero * 2}</p>
            </div>
        `);
        //---------------------------------------------------------
        document.write(`
            <div class="borde-exterior fila">
                <p class="borde-interior">${numero} * 3</p>
                <p class="borde-interior segundo">${numero * 3}</p>
            </div>
        `);
        //---------------------------------------------------------
        document.write(`
            <div class="borde-exterior fila">
                <p class="borde-interior">${numero} * 4</p>
                <p class="borde-interior segundo">${numero * 4}</p>
            </div>
        `);
        //---------------------------------------------------------
        document.write(`
            <div class="borde-exterior fila">
                <p class="borde-interior">${numero} * 5</p>
                <p class="borde-interior segundo">${numero * 5}</p>
            </div>
        `);
        //---------------------------------------------------------
        document.write(`
            <div class="borde-exterior fila">
                <p class="borde-interior">${numero} * 6</p>
                <p class="borde-interior segundo">${numero * 6}</p>
            </div>
        `);
        //---------------------------------------------------------
        document.write(`
            <div class="borde-exterior fila">
                <p class="borde-interior">${numero} * 7</p>
                <p class="borde-interior segundo">${numero * 7}</p>
            </div>
        `);
        //---------------------------------------------------------
        document.write(`
            <div class="borde-exterior fila">
                <p class="borde-interior">${numero} * 8</p>
                <p class="borde-interior segundo">${numero * 8}</p>
            </div>
        `);
        //---------------------------------------------------------
        document.write(`
            <div class="borde-exterior fila">
                <p class="borde-interior">${numero} * 9</p>
                <p class="borde-interior segundo">${numero * 9}</p>
            </div>
        `);
        //---------------------------------------------------------
        document.write(`
            <div class="borde-exterior fila">
                <p class="borde-interior">${numero} * 10</p>
                <p class="borde-interior segundo">${numero * 10}</p>
            </div>
        `);
        //---------------------------------------------------------
        document.write(`</div>`);
    }