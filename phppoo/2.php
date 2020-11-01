<?php
/*
Ejercicio Nº1: Sobre la programación orientada a objetos
1.1) ¿Qué es la Programación Orientada a Objetos?
a) Un patrón de diseño de software
b) Un paradigma de programación
c) La única forma en la que se puede programar en PHP
d) Ninguna de las anteriores
1.2) ¿Cuál de las siguientes opciones, responde mejor a los
elementos que forman parte de la POO?
a) Clases, objetos, métodos, atributos y propiedades
b) Atributos, eventos y funciones
c) Métodos, inmutabilidad, abstracción, funciones y prototipos
e) Variables, constantes y funciones
1.3) ¿Cuál de las siguientes afirmaciones es FALSA con respecto a
las características de la POO?
a) La abstracción y el polimorfismo son característica esenciales de la
programación orientada a objetos
b) Encapsulamiento es sinónimo de aislamiento
c) En la POO, la modularidad, es la característica que permite dividir
una aplicación, en partes más pequeñas, con independencia unas de las
otras*/

/*2.1) Dado el siguiente código:*/

final class ItemProducto {
 #...
}
class Producto extends ItemProducto {
 #...
}


/*
¿Qué crees que fallaría al intentar ejecutarlo?
a) ItemProducto fallará ya que está heredando de otra clase
b) No fallaría nada
c) Producto no puede heredar de ItemProducto ya que esta clase ha
sido declarada como clase final
*/
//RESPUESTA:C