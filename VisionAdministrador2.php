<?php
    include("conexion.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="VADMIN5.css">

    <?php
//funcion que te permite eliminar desde administrados los datos de la bd
?>
    <script type="text/javascript">
        function ConfirmDelete(e) {
            
            if (confirm("Deseas elimiar?")){
                return true;
            }
            else{
                return false;
            }
        }
    </script>

</head>
<body>
    <div class="contenedor">
        
        <div class="header">
            <div class="headerVision">
            <h1>Tienda</h1>
			<div class="botonesAdminAñadir">
                <a href="añadirP.php" class="btnbtnAñadir"><button class="btnbtnAñadir2">Añadir</button></a>
            </div>
            </div>
        </div>

        <div class="contenido">
            <div class="container-items">
                <?php
                //muestra todo de la bd 
                    $query1="SELECT * FROM productos";
                    $result1=mysqli_query($conexion,$query1);
                    while($row=mysqli_fetch_assoc($result1)){
                        $codigo=$row['IDproductos'];
                        $nombre=$row['Nombre'];
                        $stock=$row['Stock'];
                        $precio=$row['PrecioUnitario'];
                        $categoria=$row['Categoria'];  
                        
                        ?>
    
<?php
//el formato de la imagen desde un div 
?>
                        <div class="item">
                            <figure>
                                <img
                                src="data:image/jpg;base64,<?php echo base64_encode($row['Imagen']) ?>"
                                    alt="producto"
                                />
                            </figure>
                            <div class="info-product">
                                
                                <h2><?php echo($row['Nombre']) ?></h2>
                                <p class="price">$<?php echo($row['PrecioUnitario']) ?></p>
                                <div class="botonesAdmin">

                                
<?php
//boton que te permite eliminar el producto guardando variables dependiendo del row 
?>
                                <a href="borrar.php?IDproductos=<?php echo $row["IDproductos"]?>" onclick='return ConfirmDelete()' class="btnbtn"><button class="btnbtn">Eliminar</button></a>
                                <a href="editar.php?
                                Codigo=<?php  $row['IDproductos']?> &
                                Nombre=<?php  $row['Nombre']?> &
                                Stock=<?php  $row['Stock']?> &
                                Precio=<?php  $row['PrecioUnitario']?> &
                                Categoria=<?php  $row['Categoria']?>" class="btnbtn"><button class="btnbtn">Editar</button></a>
                                </div>
                            </div>
                        </div>

                        <?php

                    }
                ?>
        </div>
        </div>

        <div class="sidebar">
            <h1>pedidos</h1> <br>
            <?php
            //selecciona los pedidos agrupando los nombres por medio de nombre y fecha.
            $queryP = "SELECT * FROM pruebapedido GROUP BY NombreUSER, fecha ORDER BY estado ASC,fecha ASC;";
                    $resultP=mysqli_query($conexion,$queryP);
                    while($row=mysqli_fetch_assoc($resultP)){
                        ?>
                        <div class="fontpedidos">
                            <table>
                                <?php
                                $ID=$row['ID'];
                                $nombre=$row['NombreUSER'];
                                $f=$row['fecha'];
                                ?>
                                <tr>


                                    <?php
                                    if($row['estado']==1){
                                        ?>
                                            <td style="background-color: rgba(255, 0, 0, 0.6);">
                                                <?php echo "PEDIDO DE: $nombre"?>
                                            </td> 
                                            <td style="background-color: rgba(255, 0, 0, 0.6);">
                                                
                                                    <?php
                                                    //boton que permite ver detalles del pedido para el admin tomando los valores de la consulta
                                                    ?>
                                                <a  href="verPedido.php?
                                                ID=<?php echo $row['ID']?>&fecha=<?php echo $row['fecha']?>"><button style="background-color: rgba(255, 85, 85, 0.8);">ATENDER</button></a>
                                            </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if($row['estado']==2){
                                        ?>
                                            <td style="background-color: rgba(230, 238, 70, 0.8);">
                                                <?php echo "PEDIDO DE: $nombre"?>
                                            </td> 
                                            <td style="background-color: rgba(230, 238, 70, 0.8);">
                                                
                                                    <?php
                                                    //boton que permite ver detalles del pedido para el admin tomando los valores de la consulta
                                                    ?>
                                                <a  href="verPedido.php?
                                                ID=<?php echo $row['ID']?>&fecha=<?php echo $row['fecha']?>"><button style="background-color: rgba(230, 238, 70, 0.8);">ATENDER</button></a>
                                            </td>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if($row['estado']==3){
                                        ?>
                                            <td style="background-color: rgba(0, 128, 0, 0.5);">
                                                <?php echo "PEDIDO DE: $nombre"?>
                                            </td> 
                                            <td style="background-color: rgba(0, 128, 0, 0.5);">
                                                
                                                    <?php
                                                    //boton que permite ver detalles del pedido para el admin tomando los valores de la consulta
                                                    ?>
                                                <a style="background-color: rgba(0, 128, 0, 0.5);" href="verPedido.php?
                                                ID=<?php echo $row['ID']?>&fecha=<?php echo $row['fecha']?>"><button style="background-color: rgba(0, 128, 0, 0.5);">ATENDER</button></a>
                                            </td>
                                        <?php
                                    }
                                    ?>

                                    



                                </tr>
                            </table>
                        </div>
                         <?php
                    }
            ?>

        </div>

    </div>

</body>
</html>