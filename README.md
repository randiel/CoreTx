Site navigator
==============

Descripcion    : Permite crear un mapa del web site y navegar a traves de �l segun el par (evento, nodo) registrado en el mapa.
=======
Esta clase pretende navegar por un conjunto de archivos tipo plnatilla HTML
usando un mapa guardado en un array PHP



Site navigator
==============

Descripción    : Permite crear un mapa del web site y navegar a traves de él segun el par (evento, nodo) registrado en el mapa.

Casos de uso:
1: Crear un mapa del web site a traves de pares (evento, nodo)
2: Recibir el evento del usuario sobre el site (click, enter, etc)
3: Ejecutar la logica del nodo actual
4: Decidir el nodo siguiente en base a los resultados del paso 3.
5: Renderear la pantalla del nodo actual.
6: Regresar al paso 2.

siteConfig : parametros globales del site.
arbolServicio : Mapa del sitio, registra el evento del 
visitante y asigna el nodo siguiente de la navegacion. eventListener : Ejecuta la rutina mysql y 
renderea el siguiente nodo del site. navigatorWeb : Permite dirigir la navegacion del visitante segun 
el mapa arbolServicio. screenEngine : Renderea plantillas HTML con variables internas bajo la notacion 
<<variable>>. templateLoader : Carga el archivo HTML que corresponde al nodo actual. eventListener : 
Ejecuta la rutina mysql y renderea el siguiente nodo del site. navigatorWeb : Permite dirigir la 
navegacion del visitante segun el mapa arbolServicio.

screenEngine   : Renderea plantillas HTML con variables internas bajo la notacion <<variable>>.
templateLoader : Carga el archivo HTML que corresponde al nodo actual.

dbConector     : Permite conectarse y consumir rutinas mysql.
