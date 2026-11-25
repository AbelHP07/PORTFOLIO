class Persona {
    constructor(nombre, apellidos, dni) {
        this.nombre = nombre;
        this.dni = dni;
    }

    getNombre() {
        return this.nombre;
    }

    getDNI() {
        return this.dni;
    }

    setNombre(nuevoNombre) {
        this.nombre = nuevoNombre;
    }

    setDNI(nuevoDni) {
        this.dni = nuevoDni;
    }
}