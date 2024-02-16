<?php

include("conexion.php");

$id = $_POST['code'];
$Nombre = $_POST['nombre'];
$Stock = $_POST['stock'];
$Precio = $_POST['precio'];
$Categoria = $_POST['cat'];

$sql = "UPDATE productos SET Nombre='$Nombre', Stock='$Stock', PrecioUnitario='$Precio', Categoria='$Categoria' WHERE IDproductos='$id'";
$rta = mysqli_query($conexion, $sql);

if ($rta) {
    ?>
    <script>
        alert("Se modificaron correctamente");
    </script>
    <?php
    header("Location: VisionAdministrador2.php");
} else {
    echo "Error: " . mysqli_error($conexion);
}

?>
