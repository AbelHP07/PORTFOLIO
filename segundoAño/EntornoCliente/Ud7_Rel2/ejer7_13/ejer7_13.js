class numeroquiniela {
    constructor(nombre) {
        this.nombre = nombre;
        this.numero = 0;
    }

    cargarNumero() {
        this.numero = parseInt(prompt(this.nombre + ", introduce tu número de quiniela (0 a 9):"));
    }
}

class bolillero {
    constructor() {
        this.valorSorteado = 0;
    }

    sortear() {
        this.valorSorteado = Math.floor(Math.random() * 10);
    }
}