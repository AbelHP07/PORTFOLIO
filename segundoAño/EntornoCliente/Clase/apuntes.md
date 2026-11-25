- Watch (expresiones supervisadas)

Sirven para ver el tipo de dato de una variable en un momento específico (dependo de un punto de interrupción).

- isNaN

Is not a number, verifica y devuelve un booleano con verdadero o falso dependiendo de si es  no un número.

- typeof

Devuelve el tipo de valor de una variable.

- variableNumerica.toString()

Vuelve una variable a texto.

- parseInt / parseFloat

Vuelve una variable a entero o a float (decimal).

- Relacion 4

>txt=f.lista.options[f.lista.selectedIndex].text;
>f.favorito.value=txt;

---
---

## 02/10/2026

- Declarar arrays

> var array = new Array (númeroElementos);

> var array = [];

Cualquiera de las 2 son válidos.

- `array.at`

Me permite obtener un elemento en una posición específica (empieza desde el 1).

> array.at(-1);

Empezando desde el final en caso de ser negativo.

- Psobilidad de los array:

// mezcla de valores
> let arr = [ 'Apple', { name: 'John' }, true, function() { alert('hello'); } ];

// obtener el objeto del índice 1 y mostrar su nombre
> alert( arr[1].name ); // John

// obtener la función del índice 3 y ejecutarla
> arr[3](); // hello

- Métodos arrays:

1. `push()`

2. `concat()`

3. `join()`

4. `reverse()`

5. `unshift()`

6. `shift()`

7. `pop()`

8. `slice()`

9. `sort()`

10. `splice()`

---
---

## 22/10/2026

- `find()`

> find(dondeBuscar, booleano, booleano);

El primero booleano es para que no tenga en cuenta las mayúsculas y minúsculas.

El segundo booleano es para que empiece a buscar desde el principio (del derecho).

- Objeto tipo `Date`

Mirar librerías para las fechas, puesto que nos permiten trabajar con fechas de otras zonas horarias.

---
---

## 27/10/2026

- `^` y `$`

Indica principio y fin, no más carácteres en un patrón.