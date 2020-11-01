<?php
class resolucionAmbito{
    static $tipoSangre='positivo';

     static function  MetodoEstatico(){
        return '</br>Welcome to the jungle';
    }
}

echo 'Tipo  de sangre: '. resolucionAmbito::$tipoSangre;
echo resolucionAmbito::MetodoEstatico();