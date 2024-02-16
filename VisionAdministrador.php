<?php
    include("conexion.php")
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<title>Tienda</title>
		<link rel="stylesheet" href="EstiloAdministrador2.css" />
	</head>
	<body>
		<header>
			<h1>Tienda</h1>
			<div class="botonesAdminAñadir">
                <button href="" class="btnbtnAñadir">Añadir</button>
            </div>
			
		</header>
		<div class="container-items">
            <?php
            //consulta para seleccion de productos de la bd y mostrar los apartados
                $query1="SELECT * FROM productos";
                $result1=mysqli_query($conexion,$query1);
                while($row=mysqli_fetch_assoc($result1)){
                    $codigo=$row['IDproductos'];
                    $nombre=$row['Nombre'];
                    $stock=$row['Stock'];
                    $precio=$row['PrecioUnitario'];
                    $categoria=$row['Categoria'];  
                    
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
                            <button href="" class="btnbtn">Eliminar</button>
                            <button class="btnbtn">Editar</button>
                            </div>
                        </div>
			        </div>

                    <?php

                }
            ?>

	</body>
</html>