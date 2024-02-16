<?php
// conexion a la bd e inicio de un session 
require("conexion.php");
session_start();

//variables que se toman de la parte visual
$usuario = $_POST['user'];
$clave = $_POST['pass'];

//condicion donde compara las variables con palabras especificas para entrar como administrador 
if ($usuario == 'admin' && $clave == 'yeyita') {
    header("location:VisionAdministrador2.php");
} else {
    //consulta donde cuentas si existen coincidencias en la bd con las variables ingresadas
    $q = "SELECT COUNT(*) as contar, ID FROM usuarios WHERE Nombre = '$usuario' AND Contraseña = '$clave'";
    $consulta = mysqli_query($conexion, $q);
    $array = mysqli_fetch_array($consulta);
    //se guarda el id, el nombre en variables session para ser usadas despues en otras pantallas 
    if ($array['contar'] > 0) {
        $_SESSION['id'] = $array['ID'];
        $_SESSION['username'] = $usuario;
        header("location:VisionUsuario.php");
    } else {
        echo "DATOS INCORRECTOS";
    }
}
?>
