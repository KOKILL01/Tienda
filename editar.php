<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet">
    <title>Document</title>
</head>
<body>

    <?php
    $id=$_GET['Codigo'];
    $Nombre=$_GET['Nombre'];
    $Stock=$_GET['Stock'];
    $Precio=$_GET['Precio'];
    $Categoria=$_GET['Categoria'];
    ?>

    <div class="box">
    <center>
    <br><br>
        <div class="cuadroinsert">
            <form action="editacion.php" method="POST" enctype="multipart/form-data">
                
                <label for="" class="Texto">Nombre:</label> <br>
                <label for=""><?php echo $id; ?></label> <br>
                <input value="<?=$Nombre?>" type="text" name="nombre" id="name" class="cuadro" required> <br>
                <label for="" class="label1">Stock:</label> <br>
                <input value="<?=$Stock?>" type="text" name="stock" id="foto" required> <br>
                <label for="" class="label1">Precio Unitario:</label><br>
                <input value="<?=$Precio?>"placeholder="Precio por unidad. $" type="text" name="precio" id="age" class="cuadro" required> <br>
                <label for="" class="label1">Categoria:</label> <br>
                <input value="<?=$Categoria?>" type="text" name="cat" id="age" class="cuadro" required> <br> <br>
                <button type="submit" name="aceptar"  class="borde">actualizar</button> <br><br>
                
                
                
            </form>
            <div>
                <a href="VisionAdministrador2.php"><button class="borde">volver</button></a> <br><br><br>
                </div>
        </div>
        
    
    </center>
    </div>
</body>
</html> 