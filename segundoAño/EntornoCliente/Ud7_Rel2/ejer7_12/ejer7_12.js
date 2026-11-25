class Cliente {
    constructor(nombre, saldo) {
        this.nombre = nombre;
        this.saldo = saldo;
    }

    depositar(cantidad) {
        if (cantidad > 0) {
            this.saldo += cantidad;
        }
    }

    extraer(cantidad) {
        if (cantidad > 0 && this.saldo >= cantidad) {
            this.saldo -= cantidad;
            return true;
        } else {
            return false;
        }
    }
}