<?php
//este include toma la conexion de la bd
include("conexion.php");
$codigo=$_POST['code'];
//variables que se toman de parte visual 
$nombre=$_POST['nombre'];
$stock=$_POST['stock'];
$precio=$_POST['precio'];
$categoria=$_POST['cat'];
$img=addslashes(file_get_contents($_FILES['imagenBD']['tmp_name']));


    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
//se hace una consulta que tenga el mismo id 
        $sql0="SELECT * FROM productos where IDproductos='$codigo'";
        $r2=mysqli_query($conexion,$sql0);
        $filas=mysqli_num_rows($r2);

        // if que manda mensaje en caso de que el codigo este en uso
        if($filas){
            
            ?>
            <center>
            <style>
                p{
                  color:red;
                  font-size: 30px;
                }
            </style>
            <p>Codigo de producto en uso</p>
            </center>
            <?php
            include("añadir.php");
        }else{
            if($conexion){
        //se inserta el producto y los datos recibidos en la bd
                $sql="INSERT INTO productos(IDproductos,Nombre,Imagen,Stock,PrecioUnitario,Categoria) values ('$codigo','$nombre','$img','$stock','$precio','$categoria')";
            
                $exito=mysqli_query($conexion,$sql);
            // mensaje de confirmacion o error sobre la consulta
                if($exito){
                    ?>
                      <script>  
                    alert("registrado con exito");
                    </script>
                    <?php
                     
                   include("VisionAdministrador2.php");
                }else{
                    ?>
                    <script>
                        
                    alert("Error en la insercion");
                    </script>
                    <?php
                    include("VisionAdministrador2.php"); 
                }
            }else{
                echo"Algo salio mal en la conexion ";   
            }
        ?>
        <br>
        
        <?php
    }
    ?>
        
</body>
</html>



