Crea la variable "a", guarda en ella lo que el usuario escriba mediante un "prompt".

Abre un bloque "try-catch".

Filtra la variable "a" para que no sea ni "undefinied" (esté vacío) ni un dato distinto de un número (en caso de no ser cumplir con alguna, te lanza una excepción de tipo "Error" que se recoge con catch).

Inicializa la variable "resultado", a la que le asigna el resultado de la operación "5/a".

Lanza una alerta con el resultado de la operación con mensaje amigable.

En caso de recoger un error con "catch" mediante el "throw" que contiene el "Error" anterior, detiene la ejecución del código, deshace ya que la estaba, impidiendo su visualización por pantalla y lanza un error.

Finalmente, nunca mejor dicho, se ejecuta el bloque "finally" pase lo que pase, mostrando el mensaje "Se ejecuta".