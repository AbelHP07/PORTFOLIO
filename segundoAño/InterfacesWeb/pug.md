#### Variables

>-var variable;

Y se usa:

>p= variable;

Para que se genere:

><'p>valor_variable<'/p>

En caso de ponerle un espacio:

>p = variable;

Se pone literalmente:

><'p>= variable<'/p>

También se puede poner:

>p #{variable}

#### Arrays

Se pueden poner de la misma manera que las variables:

>-var array = ["titulo1", "titulo2", "titulo3"]

Y para usarlo:

>h2 #{array[0]}

O:

>h2= array[0]

También es posible poner:

>h2= array[0][1]

Y pillaríamos la segunda letra de la primera palabra.

#### Bucles

>-var menus = ["Inicio", "Contacta", "Quiénes somos", "Dónde estamos"]

>ul
>   each item in menu
>       li=item

Y se escribe esto:

><'ul>
>   <'li>Inicio<'/li>
>   <'li>Contacta<'/li>
>   <'li>Quiénes somos<'/li>
>   <'li>Dónde estamos<'/li>
><'/ul>

Siendo item donde guardamos cada valor del array.

#### Condicionales

>-var conectado = true;

>if conectado
>   p Bienvenido de nuevo
>else
>   p Inicia sesión

#### Mixins

Son trozos de código reutilizables. Para ello, se usa:

>mixin tarjeta(titulo, descripcion)
>
>.card
>   h2= titulo
>   p= descripción

Y para llamarlo:

>+tarjeta("Título", "Esta es la descripción de la tarjeta")

Y puedo usarlo cuantas veces quiera.

También se pueden hacer estáticos:

>mixin tarjeta
>
>.card
>   h2= "Título"
>   p= "Esta es la descripción de la tarjeta"

Y al usarlo tendrán todos los mixins el mismo título y descripción.

>+tarjeta