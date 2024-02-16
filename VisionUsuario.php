<?php
    include("conexion.php");
	SESSION_START();
	$id=$_SESSION['id'];
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
		<link rel="stylesheet" href="EstiloV1.css" />
	</head>
	<body>
		<header>
			<h1>Tienda</h1>

			<div class="container-icon">
				<div class="container-cart-icon">
					
<?php
//icono de imagen que se tomo online
?>
					<svg
						xmlns="http://www.w3.org/2000/svg"
						fill="none"
						viewBox="0 0 24 24"
						stroke-width="1.5"
						stroke="currentColor"
						class="icon-cart"
					>
						<path
							stroke-linecap="round"
							stroke-linejoin="round"
							d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"
						/>
					</svg>
					<div class="count-products">
						<span id="contador-productos">0</span>
					</div>
				</div>

				<?php
// los div de cada componente del carrito de compras donde se almacenaran los productos
?>
				<div class="container-cart-products hidden-cart">
					<div class="row-product hidden">
						<div class="cart-product">
							<div class="info-cart-product">
								<span class="cantidad-producto-carrito">1</span>
								<p class="titulo-producto-carrito">Zapatos Nike</p>
								<span class="precio-producto-carrito">$80</span>
							</div>
							<svg
								xmlns="http://www.w3.org/2000/svg"
								fill="none"
								viewBox="0 0 24 24"
								stroke-width="1.5"
								stroke="currentColor"
								class="icon-close"
							>
								<path
									stroke-linecap="round"
									stroke-linejoin="round"
									d="M6 18L18 6M6 6l12 12"
								/>
							</svg>
						</div>
					</div>

					<div class="cart-total hidden">
						<h3>Total:</h3>
						<span class="total-pagar">$</span>
					</div>
					<p class="cart-empty">El carrito está vacío</p> <br>
					<center>
					<button id="miBoton" class="btn-envio">Enviar pedido</button>
					</center>
				</div>
			</div>
		</header>
		
		<div class="container-items">
            <?php
			//toma todos los valores de la bd
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
							
<?php
//boton que hace la funcion para añadir cosas a la seccion de pedidos de cada usuario 
?>
                            <button class="btn-add-cart">Añadir al carrito</button>
                        </div>
			        </div>

                    <?php

                }
            ?>



<?php
//conexion con el script para la funcionalidad del carrito  de compras
?>
		<script src="Funciones.js"></script>
	</body>
</html>