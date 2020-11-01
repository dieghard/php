# php
scripts y data para php
conexion Abstracta y utlizacion
patron MVC
Las practicas fueron sacadas del libro "POO y MVC en PHP – Eugenia Bahit"
#Respuestas a Preguntas Frecuentes sobre el código
#1. Respuestas a preguntas frecuentes de la clase coenxionAbstracta 
#1.1 ¿Por qué la clase está definida como abstracta?
Una base de datos, puede tener varios métodos, como insertar datos, editar datos,eliminar datos o simplemente consultar datos. El algoritmo de cada uno de esos métodos no puede definirse con exactitud ¿por qué? Porque cada dato que se inserte, modificque, elimine o consulte, variará en infinidad de aspectos: desde los tipos de datos hasta las tablas y los campos a los que se deba acceder, etc. Basados en el principio de modularidad de la POO, es necesario tener en cuenta, que HOY, necesito un ABM de usuarios, pero mañana,
este requisito puede ampliarse y, debo dejar  todo preparado para que el sistema pueda ser escalable y modular (otros módulos pueden ser requeridos en el futuro).
Si solo contemplara los métodos de inserción, edición, consulta y eliminación de usuarios en esta clase, estaría cometiendo dos errores imperdonable:
#1. No estaría respetando el principio de modularidad de la POO
#2. Los métodos mencionados ¿no son a caso métodos de un nuevo objeto llamado Usuario? Por otro lado, por cuestiones de seguridad, se hacía necesario no permitir instanciar esta
clase desde ningún lugar de la aplicación y controlar con mucha precaución, el acceso a sus métodos y propiedades, ya que una base de datos, es el "alma" de toda aplicación.
#1.2 ¿Para qué declarar propiedades estáticas? 
En principio, tanto el host como el usuario y contraseña de la base de datos, en esta aplicación, son únicos. No varían. De allí, que como característica se les asignó ser
estáticos, a fin de, por cuestiones de seguridad, no puedan ser modificados dinámicamente (tengamos en cuenta que una clase abstracta debe ser heredada sí o sí para ser utilizada). 
#1.3 ¿Por qué  propiedades estáticas y no constantes de clase?
Porque a las constantes, aunque lógicamente guardan en sí mismas la condición de "estáticas" en el sentido de que "no pueden ser modificadas", pueden ser accedidas desde cualquier clase que herede de la clase que las declare. Pues entonces, la pregunta es ¿Para qué querría una clase "hija" conocer el host, usuario y contraseña de una base de datos? Es una  cuestión nétamente de seguridad, ya que a una constante no se la puede definir como privada y si se la quiere ocultar a las clases "hijas", no quedará otra alternativa que declararlas como propiedades estáticas.
#1.4 ¿Por qué propiedades estáticas y a la vez privadas? (ver respuestas anteriores)
# 1.5 ¿Con qué sentido declarar las propiedades como protegidas ?
Es simple. Algunos módulos pueden necesitar utilizar una base de datos diferente. Todos los módulos, necesitarán queries personalizados para sus consultas. Y lógicamente, todos
necesitarán acceder y conocer los resultados de los datos arrojados por una consulta. Es decir, que tanto la propiedad db_name como query y rows, deben tener permisos para ser
leídas y modificadas, pero ¡Ojo! Solo por las clases hijas de conexionAbstracta ¿Qué sentidotendría permitir a un programador acceder a estas propiedades si puede ser la clase hija, quien las controle? 
# 1.6 ¿Por qué los métodos open y close_connection son privados?
Pues porque la clase es la única con permiso para abrir y cerrar conexiones a la base de datos. Es una cuestión de control y seguridad.
Si necesitas insertar datos, consultarlos o hacer con ellos otras actividades, tienes métodos protegidos pero no privados, que te permiten hacerlo.
#1.7 ¿Por qué los métodos de consulta y ejecución son protegidos y no públicos?
Consultar una base de datos, modificar o eliminar sus datos, así como insertar nuevos, no puede ser una tarea que se deje librada al azar y al libre acceso de cualquiera. Es
necesario "proteger" los datos a fin de  resguardar su integridad y, la forma de hacerlo, es "proteger" los métodos que se encuentran al servicio de dichos datos. 
#1.8 ¿Por qué hay métodos declarados
como abstractos y además protegidos? Esta pregunta, en gran parte, la responde la respuesta de la pregunta 1.1. El hecho de que se definan como abstractos, es porque
necesariamente DEBEN ser métodos comunes a toda clase que los hereden. Pero solo la clase hija, podrá definirlos (re-definirlos técnicamente hablando) ya que tal cual se
explicó en la pregunta 1.1., solo ellas conocen  los requerimientos específicos. Se declaran además como protegidos, por una cuestión de seguridad ("por las dudas" para 
que solo puedan ser vistos por clases heredadas). Esto, da lugar a las clases hijas, a que modifiquen su visibilidad de acuerdo al criterio de cada una de ellas. 
#2. Respuestas a preguntas sobre la clase Usuario
#2.1 ¿Por qué la clase Usuario es una extensión de conexionAbstracta?
La clase usuarios TIENE necesariamente que heredar de conexionAbstracta ya que DEBE utilizar sus métodos (propios y definidos para acceder a la base de datos) y redefinir
obligadamente aquellos declarados como abstractos, a fin de continuar un modelo de administración de los ABM (altas, bajas y modificaciones).
#2.2 ¿Con qué fin nombre, apellido e email son propiedades públicas mientras que clave es privada y id, protegida? 
Pensemos esto como en la vida real: tu nombre, apellido e e-mail, puede ser necesario para cientos de "trámites" y acciones de tu vida diaria y no andas por la
vida negándolos a todo quien te los pida. Podríamos decir, que no tiene nada de malo que facilites públicamente estos datos, a quien decidas. 
Ahora bien ¿le das tu contraseña a cualquiera? Si lo haces, deja de hacerlo. La contraseña es un dato que debe ser privado. Nadie puede tener acceso a él. Es una
cuestión de seguirdad. El número de ID, sería como tu número de documento o pasaporte. Es un dato que debes mantener protegido pero que en algunos casos, te será requerido y necesitarás darlo obligadamente. Por ejemplo, no podrías negarte a mostrar tu pasaporte en migraciones. Sin embargo, DEBES negarte a decirle el PIN de tu tarjeta de crédito a
cualquier persona.
#2.3 ¿Por qué se utiliza el método __construct() para modificar el nombrede la base de datos? ¿Por qué no seencarga la clase madre de modificar ese valor?
El nombre de la base de datos, es algo que variará de acuerdo al módulo que lo esté trabajando. Seguramente, de existir en el futuro una clase llamada Producto, ésta,
sobreescribirá el valor de db_name. Modificarlo automáticamente utilizando un cosntructor, nos asegura instanciar el objeto con un valor de propiedad adecuado.
#2.4 ¿Por qué se utiliza require_once y no include_once?
La diferencia entre include y require es que require, si no puede incluir el archivo al que se está importando, frena la ejecución del script, siendo que include, solo arroja un error, pero continúa la ejecución. Al tratarse de una  clase que "requiere" sí o sí, de su clase madre, no tendría sentido permitir que se continúe ejecutando, si no ha podido cargarse el archivo.
#3. Respuestas a preguntas sobre el archivo de instancias
#3.1 ¿Por qué el archivo tiene cuatro instancias al mismo objeto?
Es necesario hacer notar que si bien los objetos comparten propiedades y métodos en común, no todos son idénticos. Es decir, todos los seres humanos tenemos ciertas
características en común y realizamos acciones similares. Pero cada uno de nosotros, tiene una única identidad. Por eso, no puede decirse que se instancia cuadro veces el
mismo objeto, porque en realidad, son cuatro objetos diferentes donde cada uno de ellos, tiene una identidad propia.

