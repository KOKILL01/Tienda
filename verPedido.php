<?php
include("conexion.php");
// arriba conexion
    $iduser=$_GET['ID'];
    $fecha=$_GET['fecha'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="VPedido.css">

</head>
<body onload="cambio()">
    <div class="header">
        <center>
        <h1>PEDIDO RECIBIDO</h1>
        </center>
    </div>
    <div class="grid-container">
        <center class="info">
            <h1>El usuario ah ordenado:</h1>
            <?php

        // se selecciona de la bd los nombres de los clientes agrupandolos con nombre y fecha 
                $pedido="SELECT * FROM pruebapedido where ID='$iduser' and fecha='$fecha'";
                $p=mysqli_query($conexion,$pedido);
                while($row=mysqli_fetch_assoc($p)){
                    $user=$row['ID'];
                    $producto=$row['nombres'];
                    $precio=$row['precio'];
                    $cantidad=$row['cantidad']
                    ?>
                        <label for=""><?php echo $cantidad; ?></label> 
                        <label for=""><?php echo $producto; ?></label> 
                        <label for=""><?php echo $precio; ?></label> <br>
                        
                    <?php
                }
// esta consulta toma los datos que le usuario selecciono desde el catalogo para generar una suma y mostrar cantidades y productos para gestion del pedido
                $tot = "SELECT SUM(cantidad*precio) AS Total FROM pruebapedido WHERE ID='$iduser' and fecha='$fecha'";
                $pt = mysqli_query($conexion, $tot);
                $row2 = mysqli_fetch_array($pt);

                if ($row2['Total'] !== null) {
                    $totalSum = $row2['Total'];
                    echo "<h3>Con un total de: $totalSum</h3>";
                } else {
                    echo "<h3>No hay resultados o el total es nulo.</h3>";
                }
            ?>
        </center>

        <div class="cmaforo">
                <div class="mover">
                    <center>
                    <div class="semaforo">
                        <span class="luces-circuloR"></span>
                        <span class="luces-circuloA"></span>
                        <span class="luces-circuloV"></span> 

                    </div>
                    </center>
                </div>

                <div class="botons">
                    <center>
                        <br><br>
                        <!-- Aquí se imprimen los valores de iduser y fecha que obtuviste previamente en PHP -->
                    <script>
                        var iduser = <?php echo json_encode($iduser); ?>;
                        var fecha = <?php echo json_encode($fecha); ?>;
                    </script>


                    <button class="roj" style type="submit" onclick="cambio2()">Preparar pedido</button> <br> <br> <br> <br>
                    <button class="ama" type="submit" onclick="cambio3()">Pedido Listo <br> Recoger</button> <br><br><br><br>

                    <?php
                        $sqlC="SELECT correo from usuarios where ID='$iduser'";
                        $resp=mysqli_query($conexion,$sqlC);
                        $row = mysqli_fetch_assoc($resp);

                        // Obtener el valor del correo electrónico
                        $correo_destino = $row['correo'];

                    ?>
                    <style>
                        .hidden-input {
                            display: none;
                        }
                    </style>
                    <form action="https://formsubmit.co/<?php echo $correo_destino; ?> " method="POST">
                        <input type="hidden" name="_subject" value="Pedido Listo" class="hidden-input">
                        <input type="hidden" name="_template" value="table" class="hidden-input">
                        <input type="hidden" name="_replyto" value="jorgealbertocarranzavillanueva@gmail.com" class="hidden-input">

                        <input type="text" name="name" value="envio" readonly class="hidden-input">
                        <input type="email" name="email" value="TuPedido@gmail.com" readonly class="hidden-input">
                        
                        <!-- Agregar campos adicionales según sea necesario -->
                        
                        <!-- Campos para el contenido del correo -->
                        <input type="hidden" name="contenido" value="El pedido a sido completado, pase por el.">
                    
                        <!-- Botón de envío -->
                        <button type="submit">Enviar</button>
                    </form>

                    </center>

                </div>
            



        
            <?php
                    $number="SELECT estado FROM pruebapedido WHERE ID='$iduser' and fecha='$fecha'";
                    $po=mysqli_query($conexion,$number);
                    while($row3=mysqli_fetch_assoc($po)){
                        $estate=$row3['estado'];
                        if($estate==1){
                            $cambio="UPDATE"
                            ?>
                            <script>
                                window.onload = function() {
                                    cambio();
                                }
                            </script>

                            

                            <?php
                        }else{
                        if($estate==2){
                            ?>
                            <script>
                                window.onload = function() {
                                    cambio2();
                                }
                            </script>
                            <?php
                        }else{
                        if($estate==3){
                            ?>
                            <script>
                                window.onload = function() {
                                    cambio3();
                                }
                            </script>
                            <?php
                        }
                    }
                }
                    }
                    ?>
        </div>
    </div>
    
</body>
</html>











<script>

function cambio() {
    let fondos = document.getElementsByClassName('cmaforo');
    for (let i = 0; i < fondos.length; i++) {
        fondos[i].style.backgroundColor = '#F0370F';
    }
}


function cambio2() {
    let fondos = document.getElementsByClassName('cmaforo');
    for (let i = 0; i < fondos.length; i++) {
        fondos[i].style.backgroundColor = '#F9F50F';
    }

    // Utiliza los valores de iduser y fecha previamente obtenidos
    let xhr = new XMLHttpRequest();
    xhr.open('GET', `actualizar_estado.php?iduser=${iduser}&fecha=${fecha}`, true);
    xhr.send();
}




function cambio3() {
    let fondos = document.getElementsByClassName('cmaforo');
    for (let i = 0; i < fondos.length; i++) {
        fondos[i].style.backgroundColor = '#36F90F';
    }
    let xhr = new XMLHttpRequest();
    xhr.open('GET', `actualizar_estado2.php?iduser=${iduser}&fecha=${fecha}`, true);
    xhr.send();
}


</script>


