# Réplica de prototipo con Pug — PixelForge Studio

## Parte 1: Modo de solo ejecución (visualización)
1. Descomprime el archivo `.zip` manteniendo intacta toda la estructura de carpetas.
2. Asegúrate de que el archivo `index.html` permanezca en la carpeta raíz junto a las carpetas `css/` y `assets/` (`assets/img/` y `assets/video/`).
3. Haz doble clic sobre `index.html` (o ábrelo con Google Chrome, Edge o Firefox) para visualizar la web completa con sus estilos, imágenes y vídeo.

## Parte 2: Modo de edición y compilación (modificación del código)
1. Abre la carpeta del proyecto en **Visual Studio Code**.
2. Instala la extensión **Live Pug Compiler** desde el panel de Extensiones (`Ctrl + Shift + X`).
3. Edita los archivos necesarios:
   - `index.pug`: variables globales (nombre de empresa, descripción, año, listas) y estructura principal.
   - `includes/_cabecera.pug`, `includes/_barra-lateral.pug`, `includes/_pie.pug` y `includes/_mixins.pug`: bloques parciales y mixins reutilizables.
   - `css/estilos.css`: estilos visuales y maquetación.
4. Guarda los archivos editados y/o compilados, además de `index.pug` con `Ctrl + S` para que la extensión compile automáticamente y regenere `index.html` en la raíz.