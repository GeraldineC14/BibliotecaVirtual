<?php
// Heredamos la sesion
session_start();

//La sesion contendrá datos del login en formato de arreglo
if (!isset($_SESSION['login'])) {
    // Crea un nuevo array con las variables por defecto
    $_SESSION['login'] = [
        'acceso'      => '',
        'idusers'     => '',
        'email'       => '',
        'username'    => '',
        'mensaje'     => '',
        'namess'      => '',
        'surnames'    => '',
        'accesslevel' => ''
    ];
}

require_once '../models/Usuario.php';
require_once '../tools/helpers.php';
require_once '../models/Mail.php';

    if(isset($_GET['operacion'])){

        $usuario = new Usuario();

        if($_GET['operacion'] == 'login'){
            // 0. Array que sera leido por la vista
            $resultado = [
                "acceso"      => false,
                "idusers"     => "",
                "email"       => "",
                "username"    => "",
                "mensaje"     => "",
                "namess"      => "",
                "surnames"    => "",
                "accesslevel" => ""
            ];

            // 1. Verificar si existe el usuario
            $data = $usuario->login($_GET['email']);

                if($data){
                    // 2. El usuario si existe, debemos validar la clave
                    $claveEncriptada = $data['accesskey'];

                    // 3. Comprobar la clave de entrada con la encriptada

                    if (password_verify($_GET['accesskey'], $claveEncriptada)){

                        // Enviamos toda la info del usuario
                        $resultado["acceso"] = true;
                        $resultado["mensaje"] = "Bienvenido al sistema";
                        $resultado["idusers"] = $data['idusers'];
                        $resultado["email"] = $data['email'];
                        $resultado["surnames"] = $data['surnames'];
                        $resultado["namess"] = $data['namess'];
                        $resultado["accesslevel"] = $data['accesslevel'];

                    } else {
                        // La contraseña es incorrecta
                        $resultado["mensaje"] = "La contraseña es incorrecta";
                    }
                } else {
                    // No existe el usuario
                    $resultado["mensaje"] = "El usuario no existe";
                }
                //Actualizamos la información en la variable de sesíon
                $_SESSION["login"] = $resultado;

                //Enviando información de la sesion a la vista
                echo json_encode($resultado);
        }

        if($_GET['operacion'] == 'registrarUsuario'){
            $datosSolicitados = [
                "username"     => $_GET['username'],
                "surnames"     => $_GET['surnames'],
                "namess"       => $_GET['namess'],
                "email"        => $_GET['email'],
                "accesskey"    => password_hash($_GET['accesskey'], PASSWORD_BCRYPT),
                "accesslevel"  => $_GET['accesslevel']
            ];
            $usuario->registrarUsuario($datosSolicitados);
        }

        if($_GET['operacion'] == 'cerrar-sesion'){
            session_destroy();
            session_unset();
            header("location:../index.php");
        }

        if($_GET['operacion'] == 'listarUsuarios'){
            echo json_encode($usuario->listarUsuarios());
        }

        if($_GET['operacion'] == 'eliminarUsuario'){
            $usuario->eliminarUsuario($_GET['idusers']);
        }

        if ($_GET['operacion'] == 'getUsers'){
            echo json_encode($usuario->getUsers($_GET['idusers']));   
        }

        if($_GET['operacion'] == 'actualizarUsuario'){
            $datosSolicitados = [
                "idusers"       => $_GET['idusers'],
                "namess"        => $_GET['namess'],
                "surnames"      => $_GET['surnames'],
                "username"      => $_GET['username'],
                "email"         => $_GET['email'],
                "accesslevel"   => $_GET['accesslevel'],
                "accesskey"     => password_hash($_GET['accesskey'], PASSWORD_BCRYPT)
            ];
            
            $usuario->actualizarUsuario($datosSolicitados);
        }

        if($_GET['operacion'] == 'validacionUsuario'){
            echo json_encode($usuario->validacionUsuario($_GET['username']));
        }

        if($_GET['operacion'] == 'validacionCorreo'){
            echo json_encode($usuario->validacionCorreo($_GET['email']));
        }

        if ($_GET['operacion'] == 'contadorBooks'){
            echo json_encode($usuario->contadorBooks());
        }

        if ($_GET['operacion'] == 'contadorUsers'){
            echo json_encode($usuario->contadorUsers());
        }

        if($_GET['operacion'] == 'actualizarPerfil'){
            $datosSolicitados = [
                "idusers"   => $_GET['idusers'],
                "accesskey" => password_hash($_GET['accesskey'],PASSWORD_BCRYPT)
            ];
            $usuario->actualizarPerfil($datosSolicitados);
        }

        if ($_GET['operacion'] == 'comparacionContraseña'){
            $resultado = [
                "mensaje"     => "",
                "comparacion" => false,
                "email"       => ""
            ];

            //1. Verificar si existe el usuario
            $data = $usuario->comparacionContraseña($_GET['email']);

            if($data){
                $claveEncriptada = $data['accesskey'];
            //3. Comprobar la clave de entrada con la encriptada
                if (password_verify($_GET['accesskey'], $claveEncriptada)){
                    $resultado ["mensaje"] = "Contraseña actual correcta";
                    $resultado ["email"] = $data['email'];
                    $resultado ["comparacion"] = true;
                }else{
                    $resultado ["mensaje"] = "Contraseña actual incorrecta";
                }

            }else{
                //No existe el usuario
                $resultado["mensaje"] = "El usuario no existe";
            }

            //Enviando información de la sesion a la vista
            echo json_encode($resultado);
        }

        if ($_GET['operacion'] == 'getUsersReport') {
            renderJSON($usuario->getUsersReport(
                ['iduser' => $_GET['iduser']]
            ));
        }


    }

    if (isset($_POST['operacion'])) {
        $usuario = new Usuario();

        if ($_POST['operacion'] == 'searchUser') {
            $datoObtenido = $usuario->searchUser($_POST['user']);
            if ($datoObtenido) {
                echo json_encode($datoObtenido);
            }
        }

        if($_POST['operacion'] == 'enviarCorreo'){
            //VALIDAR QUE ESTE PROCESO ¡NO! SE EJECUTE SINO HASTA DESPUÉS 15MIN
            $respuesta = $usuario->validarTiempo(["idusers" => $_POST['idusers']]);
        
            $retornoDatos = ["mensaje" => "Ya se te envió una clave, revisa tu correo"];
        
        
            if($respuesta ["status"] == "GENERAR"){
              //Crear un valor aleatorio de 4 dígitos
              $valorAleatorio = random_int(1000,9999);
        
              //Cuerpo del mensaje a enviar por EMAIL
              $mensaje = "
                <h3> App SENATI </h3>
                <strong> Recuperación de cuenta </strong>
                <hr>
                <p> Estimado usuario, para recuperación el acceso, utilice la siguiente contraseña: </p>
                <h3> {$valorAleatorio}</h3>
              ";
        
              //Arreglo con datos a guardar en la tabla de recuperación
              $data = [
                  "idusers"        => $_POST['idusers'],
                  "email"         => $_POST['email'],
                  "clavegenerada" => $valorAleatorio
        
              ];
        
              //Creando registro
              $usuario->registraRecuperacion($data);
        
              //Enviando correo
              enviarCorreo($_POST['email'],'Código de Restauración',$mensaje);
               $retornoDatos["mensaje"] = "Se ha generado y enviado la clave al email indicado";
            }
            //Enviado a la vista
            echo json_encode($retornoDatos);
            
          }
    }

    
?>