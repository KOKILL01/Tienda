<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <link rel="stylesheet" href="estiloY1.css"> 
    <title>Registrarse</title>
</head>
<body>
    <div class="contenedor">
        <h1><ins>Crea tu cuenta</ins></h1>
        <br>
        <?php
        // este if detiene el funcionamiento si la cuenta ya ha sido creada y manda un mensaje
        if (isset($_GET['error'])) {
           ?> 
           <p class="error">
            <?php
            echo $_GET ['error']
            ?>
           </p>
           <?php
        }
        ?>
        

<form action="RegistrarUsuario.php" method="POST">
    
<?php
//Este es el formulario para tomar datos al momento de registrar un nuevo usuario 
?>
        <label for="">
            usuario
        </label>
    <input type="text" placeholder="ingrese usuario" required name="user"> 
    <label for="">
        nombre Completo
    </label>
    <input type="text" placeholder="Nombre" required name="nombre">

    <label for="">
        correo
    </label>
    <input type="mail" placeholder="ingresar correo" required name="correo"> 
    <label for="">
        clave
    </label>
    <input type="password" placeholder="ingrese clave" required name="pass">
    <label for="">
        repetir clave
    </label>
    <input type="password" placeholder="repita su clave" name="pass2" required>
        
<?php
//este boton tipo submit registra los datos de los campos anteriores
?>
    <input type="submit" class="button" value="registrarse">
    <a href="index.php" class="button1">
        Ingresar
    </a>
</form>

    


</body>
</html>