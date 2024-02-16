<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet">

    <link rel="stylesheet" href="EstiloSubir.css">
    <title>Document</title>
</head>
<body>
<center>

    <div class="box">
    <br><br>
        <div class="cuadroinsert">
            <form action="insertar.php" method="POST" enctype="multipart/form-data">
                <label for="" class="Texto">Codigo:</label> <br>
                <input placeholder="codigo del producto." type="text" name="code" id="code" class="cuadro" required> <br>
               
                <label for="" class="Texto">Nombre:</label> <br>
                <input placeholder="Nombre del producto." type="text" name="nombre" id="name" class="cuadro" required> <br>
                <label for="" class="Texto">Stock:</label> <br>
                <input placeholder="Numero disponible." type="number" name="stock" id="foto" required> <br>
                <label for="" class="Texto">Precio Unitario:</label><br>
                <input placeholder="Precio por unidad. $" type="text" name="precio" id="age" class="cuadro" required> <br>

                <label for="" class="Texto">Imagen:</label><br>
                <input type="file"  name="imagenBD"><br>

                <label for="" class="Texto">Categoria:</label> <br>
                <input placeholder="Categoria." type="text" name="cat" id="age" class="cuadro" required> <br> <br>
 
                <button type="submit" name="aceptar" value="aceptar" class="borde">subir</button> <br><br>
                
                
                
            </form>
            <div>
                <a href="CatAdmin.php"><button class="borde">volver</button></a> <br><br><br>
                </div>
        </div>
        
    
    </center>
    </div>
</body>
</html> 