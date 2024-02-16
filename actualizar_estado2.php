<?php
include("conexion.php");

// Inicializa las variables iduser y fecha con valores predeterminados o nulos
$iduser = null;
$fecha = null;

// Verifica si las variables están definidas en la URL
if (isset($_GET['iduser']) && isset($_GET['fecha'])) {
    $iduser = $_GET['iduser'];
    $fecha = $_GET['fecha'];

    // Resto del código para la actualización
    $cambioa2 = "UPDATE pruebapedido SET estado = 3 WHERE ID = '$iduser' AND fecha = '$fecha'";
    $v = mysqli_query($conexion, $cambioa2);

    if ($v) {
        // La actualización se realizó con éxito
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <h1>Pedido Listo</h1>
            <a href="verPedido.php"></a>
        </body>
        </html>
        <?php
    } else {
        // Hubo un error en la actualización
        echo "Error en la actualización: " . mysqli_error($conexion);
    }

    // Cierra la conexión después de utilizarla
    mysqli_close($conexion);

    exit; // Salir después de imprimir el HTML
}
?>

<!-- Ahora las variables iduser y fecha se asignarán en el bloque PHP antes de la etiqueta script -->
<script>
    var iduser = <?php echo json_encode($iduser); ?>;
    var fecha = <?php echo json_encode($fecha); ?>;
</script>

<button class="roj" type="button" onclick="cambio2()">Preparar pedido</button> <br> <br> <br> <br>
<button class="ama" type="button" onclick="cambio3()">Pedido Listo <br> Recoger</button> <br><br><br><br>
