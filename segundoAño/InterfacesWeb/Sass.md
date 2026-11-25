#### Variables

>$color: azul;
>
>div{
>   color: $color;
>}

Y se escribirá azul.

Si le pones `!default`, lo puedes reescribir.

En `_variables.scss`:

>$color: azul !default;

En `style.scss`:

>$color: rojo;
>
>@import 'variables';
>
>div{
>   color: $color;
>}

Y se pone rojo. En caso de no poner default se pondría azul, puesto que prioriza el archivo incluido (te puedes ahorrar el `!default` si pones el `@import` arriba, puesto que luego sobreescribirías la variable).

#### Mapas

Conjunto de clave/valor:

>$colores(
>  'fondo': azul,
>  'titulo': verde,
>  'parrafo': morado,
>  'sombra': rojo,
>)

Y se usa con `map-get(mapa, clave)`:

>body {
>  background-color: map-get($colores, 'fondo');
>  color: map-get($colores, "parrafo");
>}

#### Listas

Conjuntos de valores ordenados con posiciones numéricas:

>$tamaños: (20px, 40px, 80px);

>$tamaños: (
>  20px,
>  40px,
>  80px
>);

Y accedemos con `nth(lista, posición)`:

>p{
>  font-size: nth(tamaños, 1);
>}

>h3{
>  font-size: nth(tamaños, 2);
>}

>h1{
>  font-size: nth(tamaños, 3);
>}

#### Interpolación

Básicamete es tratar una variable como texto plano para poder concatenarse y hacer los estilos más dinámicos:

>$color: azul;

>.boton-#{$color}{
>  color: $color;
>}

Es como si trataras con `.boton-azul` y poniendo `azul` como color.

Ahí se ve que se usa azul como texto plano y azul como valor.

No es obligatorio usar "-", con `#{$color}` ya accedes al valor como texto plano.

#### Anidamiento

En CSS se usaba así:

>div{}

>div p {}

>div p span{}

Pero en Sass basta con hacer:

>div{
>  p{
>    span{
>
>    }
>  }
>}

Y se trata exactamente igual que en CSS normal, como si estuvieras poniendo: `div p span{}`.

Podemos usar `&:hover{}` dentro de cualquier etiqueta para hacer un bloque con propiedad `hover`.

Porque el `&` es como el `this` en PHP, hace siempre referencia al padre.

#### Distinciones

Si se pone: `&_warning` hace referencia al padre: `btn_warning`.

Mientras que si pones: `& _warning` hace referencia a un elemento hijo: `btn _warning{}`.

#### Mixins

