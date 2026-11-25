## 26/10/2026

- `filter_var()`

Tenemos dos opciones:

- Filtros (booleano)

- - FILTER_VALIDATE_EMAIL → valida que sea un email
- - FILTER_VALIDATE_URL → valida que sea una URL
- - FILTER_VALIDATE_INT → valida que sea un entero
- - FILTER_VALIDATE_IP → valida que sea una IP

- Sanitizadores (eliminan caracteres que no pertenezcan al dato introducido)

- - FILTER_VALIDATE_EMAIL → elimina caracteres impropios de un email
- - FILTER_VALIDATE_URL → elimina caracteres impropios de una URL
- - FILTER_VALIDATE_NUMBER_INT → elimina caracteres impropios de un entero

