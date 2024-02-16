<?php
// se declaran variables correspondientes a la bd
$server="localhost";
$user="id21607937_jorge";
$pass="ProyAWOS_2";
$db="id21607937_pawos";
//aqui se conectan tomando las variables anteriores 
$conexion=new mysqli($server,$user,$pass,$db);
//aqui se genera un if que detecte si existe una falla en la bd
if($conexion->connect_errno){
    die("conexion fallida " . $conexion->connect_errno);
}

?>