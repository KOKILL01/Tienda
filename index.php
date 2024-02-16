
<?php
//Este es el index principal donde se inica sesion
?>

<!DOCTYPE html>
<html lang="en">
<head>

    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqy12QvZ6jIW3" crossorigin="anonymus">
    <link rel="stylesheet" href="estiloInicioSecion2.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>inicio de sesion</title>
</head>
    <form action="loguear.php" method="POST">
        <center>
        <h1>INICIAR SESION</h1>
        </center>
        <hr>
        <?php
        if (isset($_GET['error'])) {
           ?> 
           <p>class="error"
            <?php
            echo $_GET ['error']
            //aqui se guarda en una variable de session el id para usarse en pantallas posteriores
            ?>
           </p>
           <?php
        }
        ?>
        <hr>
        <i class="fa-solid fa-user"></i>
        <label>usuario</label>
        <input type="text" name="user" placeholder="Nombre de usuario">
        
        <i class="fa-solid fa-unlock"></i>
        <label>Contraseña</label>
        <input type="password" name="pass" placeholder="Ingresar contraseña">
    <hr>
        <button type="submit"> Iniciar Sesion</button>
        <a href="CrearCuenta.php">Crear Cuenta</a>

        
<?php
//Este es formulario de php en html el cual recupera la info para mandarlo a la pagina de "loguear.php" con el metodo post.
?>
    </form>
</body>
</html>