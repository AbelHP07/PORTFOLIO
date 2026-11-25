### Fecha: 23/09/2026

- `random.keys`

Se usa para coger claves random de un array, usándose así:

> array.keys($array, 3);

Cogiendo 3 valores random de $array. Ya que he puesto 3, si pongo otro número, pilla otra cantidad.

- `var_dump`

Esribe los datos de un array de una forma más específica. Mejor dicho, da más información sobre las cosas que se escriben.

- `<pre></pre>`

Si se pone un var_dump siempre es aconsejable usar un bloque pre antes y después, ya que lo vuelve más legible.

- `stripslashes()`

Quita las barras laterales propias de una URL, evitando así que nos puedan colar un link por un formulario.

- `arraysplice()`

Te divide un array en grupos de x número, dependiendo de lo que pongas en el paréntesis.

> arraysplice($a, 2);

Pilla los datos del array $a y los divide en grupos de 2.

- `float`

Viene de "floating point" o "punto flotante", ya que en el sistema anglosajón se usa un punto para los decimales en vez de una coma.

- `&$x`

Poniendo ese símbolo (**&**) delante de una variable, pilla la clave del array, y modifica sus datos:

> foreach($coches as &$x){
>   $x = "Ford";
>}

Pasando el array de tener varios coches a tener solo "Ford" en cada una de sus posiciones.

> $coches[0] = "Toyota";
> $coches[1] = "BMW";
> $coches[2] = "Ford";

-----------------------⬇️-----------------------
> $coches[0] = "Ford";
> $coches[1] = "Ford";
> $coches[2] = "Ford";

- Creación de arrays múltiples:

> array(
>   array("1","2"),
>   array("1","2","3"),
>   array("1","2","3","4")
>)

Se crea así de la forma más básica posible.

### Fecha: 01/10/2026

- `filter_var`

> $emails = [
>    "bob@example.com",
>    "test@example.local",
>    "invalidemail"
> ];

> var_dump(filter_var($emails, FILTER_VALIDATE_EMAIL, FILTER_REQUIRE_ARRAY));

Dando como resultado:

> array(3) {
>   [0]=>
>   string(15) "bob@example.com"
>   [1]=>
>   string(18) "test@example.local"
>   [2]=>
>   bool(false)
> }

---
---

### Fecha: 19/10/2026

- namespace:

Es una forma de organizar las clases, es como meterlas en carpetas. Es para cuando debes tener dos clases con el mismo nombre pero que hagan cosas distintas.

Por ejemplo:

> namespace HTML;

Y ahora todo lo que se escribe abajo forma parte de la "carpeta" HTML.