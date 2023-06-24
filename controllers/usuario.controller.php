<?php
// Heredamos la sesion
session_start();

//La sesion contendrá datos del login en formato de arreglo
$_SESSION['login'] = [];

require_once '../models/Usuario.php';

    if(isset($_GET['operacion'])){

        $usuario = new Usuario();    

        if($_GET['operacion'] == 'login'){
            // 0. Array que sera leido por la vista
            $resultado = [
                "acceso"      => false,
                "idusers"    => "",
                "mensaje"     => "",
                "surnames"    => "",
                "namess"      => "",
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
                        $resultado["surnames"] = $data['surnames'];
                        $resultado["namess"] = $data['namess'];
                        $resultado["accesslevel"] = $data['accesslevel'];
    
                    } else {
                        // La contraseña es incorrecta
                        $resultado["acceso"] = false;
                        $resultado["mensaje"] = "La contraseña es incorrecta";
                    }
                } else {
                    // No existe el usuario
                    $resultado["acceso"] = false;
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
                "email"         => $_GET['email'],
                "accesslevel"   => $_GET['accesslevel'],
                "accesskey"     => password_hash($_GET['accesskey'], PASSWORD_BCRYPT)
            ];
            
            $usuario->actualizarUsuario($datosSolicitados);
        }

        if($_GET['operacion'] == 'validacionUsuario'){
            echo json_encode($usuario->validacionUsuario($_GET['email']));
        }
    }

    if (isset($_POST['operacion'])) {
        $usuario = new Usuario();
    
        if ($_POST['operacion'] == 'login') {
            $datoObtenido = $usuario->login($_POST['usuario']);
            $resultado = [
                "status"        => false,
                "apellidos"     => "",
                "nombres"       => "",
                "nivelacceso"   => "",
                "mensaje"       => ""
            ];
    
            if ($datoObtenido) {
                $claveEncriptada = $datoObtenido['claveacceso'];
                if (password_verify($_POST['claveIngresada'], $claveEncriptada)) {
                    $resultado["status"] = true;
                    $resultado["apellidos"] = $datoObtenido["apellidos"];
                    $resultado["nombres"] = $datoObtenido["nombres"];
                    $resultado["nivelacceso"] = $datoObtenido["nivelacceso"];
                } else {
                    $resultado["mensaje"] = "Contraseña incorrecta";
                }
            } else {
                $resultado["mensaje"] = "No se encuentra el usuario";
            }
    
            $_SESSION["login"] = $resultado;
            echo json_encode($resultado);
        }
    
        if ($_POST['operacion'] == 'searchUser') {
            $datoObtenido = $usuario->searchUser($_POST['user']);
            if ($datoObtenido) {
                echo json_encode($datoObtenido);
            }
        }
    
        if ($_POST['operacion'] == 'enviarCorreo') {
            $respuesta = $usuario->validarTiempo(["idusuario" => $_POST['idusuario']]);
    
            $retornoDatos = ["mensaje" => "Ya se te envió una clave, revisa tu correo"];
    
            if ($respuesta["status"] == "GENERAR") {
                $valorAleatorio = random_int(1000, 9999);
    
                $mensaje = "
                    <h3> App SENATI </h3>
                    <strong> Recuperación de cuenta </strong>
                    <hr>
                    <p> Estimado usuario, para recuperar el acceso, utilice la siguiente contraseña: </p>
                    <h3> {$valorAleatorio}</h3>
                ";
    
                $data = [
                    "idusuario"     => $_POST['idusuario'],
                    "email"         => $_POST['email'],
                    "clavegenerada" => $valorAleatorio
                ];
    
                $usuario->registraRecuperacion($data);
    
                enviarCorreo($_POST['email'], 'Código de Restauración', $mensaje);
                $retornoDatos["mensaje"] = "Se ha generado y enviado la clave al email indicado";
            }
    
            echo json_encode($retornoDatos);
        }
    
        if ($_POST['operacion'] == 'validarClave') {
            $datos = [
                "idusuario"     => $_POST['idusuario'],
                "clavegenerada" => $_POST['clavegenerada']
            ];
            $resultado = $usuario->validarClave($datos);
            echo json_encode($resultado);
        }
    
        if ($_POST['operacion'] == 'actualizarClave') {
            $claveEncriptada = password_hash($_POST['claveacceso'], PASSWORD_BCRYPT);
            $idusuario = $_POST['idusuario'];
            $datos = [
                "idusuario"   => $idusuario,
                "claveacceso" => $claveEncriptada
            ];
            echo json_encode($usuario->actualizarClave($datos));
        }
    }

?>