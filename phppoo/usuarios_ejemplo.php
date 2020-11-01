<?php
/** EJEMPLO DE COMO USAR LA CLASE ABSTRACTA CON EL USUARIO_MODEL
 */
require_once('usuarios_model.php');
    # Traer los datos de un usuario
    $usuario1 = new Usuario();
    $usuario1->get('user@email.com');
    print $usuario1->nombre . ' ' . $usuario1->apellido . ' existe<br>';
    # Crear un nuevo usuario
    $new_user_data = array(
    'nombre'=>'Tito',
    'apellido'=>'Cotza',
    'email'=>'tito@mail.com',
    'clave'=>'Cotza'
    );
    $usuario2 = new Usuario();
    $usuario2->set($new_user_data);
    $usuario2->get($new_user_data['email']);
    print $usuario2->nombre . ' ' . $usuario2->apellido . ' ha sido creado<br>';
    # Editar los datos de un usuario existente
    $edit_user_data = array(
        'nombre'=>'Diego',
        'apellido'=>'Markiewicz',
        'email'=>'dieghard@gmail.com',
        'clave'=>'qwerty'
    );
    $usuario3 = new Usuario();
    $usuario3->edit($edit_user_data);
    $usuario3->get($edit_user_data['email']);
    print $usuario3->nombre . ' ' . $usuario3->apellido . ' ha sido editado<br>';
# Eliminar un usuario
$usuario4 = new Usuario();
$usuario4->get('lei@mail.com');
$usuario4->delete('lei@mail.com');
print $usuario4->nombre . ' ' . $usuario4->apellido . ' ha sido eliminado';
