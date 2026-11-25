El método exec() es un método de las expresiones regulares (RegExp) en JavaScript que sirve para buscar coincidencias de un patrón dentro de una cadena de texto.

Cuando lo ejecutas, hace dos cosas principales:

Busca la primera coincidencia del patrón en el texto.

Si la encuentra, devuelve un array especial con información detallada. Si no encuentra nada, devuelve null.

¿Qué contiene exactamente el array que devuelve?
Cuando exec() encuentra una coincidencia, el array devuelto incluye:

En la posición [0]: El texto exacto que hizo coincidencia.

Propiedad index: La posición numérica exacta (el índice del carácter) donde empieza esa coincidencia en el texto.

Propiedad input: El texto completo original que se analizó.

(Opcional) Los grupos de captura si tu expresión regular tiene paréntesis ().

Su característica más especial: la memoria (lastIndex)
Si a tu expresión regular le pones la bandera global (g), exec() recuerda en qué posición exacta terminó de buscar (guardándolo en una propiedad llamada lastIndex).

Si lo vuelves a llamar con el mismo texto, no vuelve a empezar desde el principio, sino que continúa buscando desde donde se quedó la última vez. Por eso se suele usar dentro de un bucle while para extraer todas las apariciones una tras otra hasta que devuelve null.

Aquí tienes un ejemplo completo que muestra exactamente qué devuelve cada uno de estos puntos cuando se ejecuta exec().

Código de ejemplo base
const texto = "Tengo 3 gatos en casa.";
const patron = /(\d+)\s(gatos)/; // Tiene dos paréntesis (dos grupos de captura)

const resultado = patron.exec(texto);
console.log(resultado);
Si ejecutas esto, el array que devuelve resultado contiene lo siguiente:

1. [0] (El texto exacto que hizo coincidencia)
Qué es: Es la primera posición del array (resultado[0]), que contiene la cadena exacta de texto que encajó por completo con la expresión regular.

Ejemplo en el código:

console.log(resultado[0]); // Muestra: "3 gatos"
2. Propiedad index (La posición numérica exacta donde empieza)
Qué es: Es una propiedad numérica del array (resultado.index) que indica el número de carácter donde comienza la coincidencia dentro del texto original (empezando a contar desde el 0).

Ejemplo en el código:

console.log(resultado.index); // Muestra: 6 
// (porque la '3' de "3 gatos" está en el índice 6 de la cadena "Tengo 3 gatos en casa.")
3. Propiedad input (El texto completo original)
Qué es: Es una propiedad del array (resultado.input) que devuelve exactamente el string completo sobre el cual se hizo la búsqueda.

Ejemplo en el código:

console.log(resultado.input); // Muestra: "Tengo 3 gatos en casa."
4. Grupos de captura (Paréntesis ())
Qué es: Si la expresión regular incluye paréntesis, cada par de paréntesis crea un "grupo de captura". Estos se guardan en las posiciones siguientes del array (resultado[1], resultado[2], etc.), extrayendo solo la parte del texto que coincide con lo que está dentro de cada paréntesis.

Ejemplo en el código:

El primer paréntesis (\d+) capturó los dígitos:

console.log(resultado[1]); // Muestra: "3"
El segundo paréntesis (gatos) capturó la palabra:

console.log(resultado[2]); // Muestra: "gatos"