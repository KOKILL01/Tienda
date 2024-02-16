<?php
//se incluye la conexion
include("conexion.php");
// se toman variables de la parte visual 
$nombre=$_POST['user'];
$contra2=$_POST['pass2'];
$correo=$_POST['correo'];
$contra=$_POST['pass'];
$Ncompleto=$_POST['nombre'];
//se comparan dos variables, uso de la comparacion de contraseñas 
if($contra2==$contra){
    //se ingresan los datos recibidos por el usario 
    $sql10="INSERT INTO usuarios(ID,Nombre,Contraseña,correo) values('','$nombre','$contra','$correo')";
    $ingreso=mysqli_query($conexion,$sql10);

    //redireccion si ingresa correctamente con base a la consulta
    if($ingreso){
        header("Location: index.php");

    }else{
        
        header("Location: CrearCuenta.php")
        ?>
        <center>
        <p>Datos invalidos</p>
        </center>
        <?php
    }
    
    
    
    
}else{
    header("Location: CrearCuenta.php?error=Las contraseñas no coinciden");
    exit(); 
}



?>