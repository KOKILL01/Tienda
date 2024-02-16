<?php
//opcion para ver los errores que arroja el sistema en la console 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


ob_clean();
header('Content-Type: application/json');
// conexion a la bd
include("conexion.php");
//session toma la id que se guarda en una variable global 
SESSION_START();
$id = $_SESSION['id'];
//se toman los valores de la bd dependiendo el id que se ingreso en la variable global
$pedido = "SELECT Nombre, correo FROM usuarios WHERE ID = '$id'";
$p = mysqli_query($conexion, $pedido);
$usuario = mysqli_fetch_array($p);

$nombreUsuario = $usuario['Nombre'];
$correoUsuario = $usuario['correo'];

$datosJSON = file_get_contents('php://input');
$datos = json_decode($datosJSON, true);

if ($datos === null) {
    // Manejar error de JSON no válido
    echo json_encode(['success' => false, 'mensaje' => 'JSON no válido']);
    exit();
}

$nombres = $datos['nombres'];
$precios = $datos['precios'];
$cantidades = $datos['cantidades'];
$estado=1;
if (count($nombres) === count($precios) && count($nombres) === count($cantidades)) {
    $totalElementos = count($nombres);

    $conexion->begin_transaction();

    $exito = true;

    for ($i = 0; $i < $totalElementos; $i++) {
        $nombre = $conexion->real_escape_string($nombres[$i]);
        $precio = $conexion->real_escape_string($precios[$i]);
        $cantidad = $conexion->real_escape_string($cantidades[$i]);

        $query = "INSERT INTO pruebapedido (ID, nombres, precio, cantidad, NombreUSER, Correo,fecha,estado) VALUES ('$id', '$nombre', '$precio', '$cantidad', '$nombreUsuario', '$correoUsuario', NOW(),$estado)";

        if (!$conexion->query($query)) {
            $conexion->rollback();
            $exito = false;
            echo json_encode(['success' => false, 'mensaje' => 'Error en la consulta SQL', 'sql_error' => $conexion->error]);
            exit();
        }
    }

    if ($exito && $conexion->commit()) {
        echo json_encode(['success' => true, 'mensaje' => 'Datos insertados con éxito en la base de datos', 'redireccionar' => 'exito.php']);
        exit();
    } else {
        $conexion->rollback();
        echo json_encode(['success' => false, 'mensaje' => 'Error al insertar datos en la base de datos']);
        exit();
    }
    
    
    
} else {
    echo json_encode(['success' => false, 'mensaje' => 'Los arreglos no tienen la misma longitud']);
    exit();
}

?>
