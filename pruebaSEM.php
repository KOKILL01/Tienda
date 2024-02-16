<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilosem.css">
</head>
<body>
<?php
//prueba que sera de utilidad para controlar el color de los semaforos 
                $pedido="SELECT estado FROM sem";
                $p=mysqli_query($conexion,$pedido);
                while($row=mysqli_fetch_assoc($p)){
                    $estado=$row['estado'];
                    echo "$estado";
                    if($estado=="0"){
                        
                        ?>
                        
                        <button class="b1">
                            subir
                        </button>
                        <?php
                    }else{
                        ?>
                        <button class="b2">
                            subir
                        </button>
                        <button>enviar correo</button>
                        <?php
                    }
                }
                ?>
    <button>

    </button>
</body>
</html>