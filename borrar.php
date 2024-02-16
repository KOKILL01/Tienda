<?php
//el include toma la pagina de conexion donde se accede a la bd y se toma el id del boton de la pagina de admin
include ("conexion.php");
$id=$_GET['IDproductos'];

//consulta para eliminar de la bd 
$sql="DELETE FROM productos where IDproductos='".$id."'";
$resultado=mysqli_query($conexion,$sql);
//mensaje para redireccion dependiendo si la consulta fue correctamente realizada 
if ($resultado){
    echo "<script languaje='JavaScript'>
    alert ('Los datos se eliminaron correctamente')
    location.assign('VisionAdministrador2.php');
    </script>";

}else{
    echo "<script languaje='JavaScript'>
    alert ('Error al eliminar los datos')
    location.assign('VisionAdministrador2.php');
    </script>";
}


?>