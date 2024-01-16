<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario  con HTML5 Y CSS3</title>
    <link rel="stylesheet" href="css/estilos_formulario.css">
</head>
<body>


    <?php
    $nombreErr ="";
    $apellidosErr = "";
    $domicilioErr="";
    $generoErr = "";
    $usuarioErr = "";
    $pwdErr ="";
    $checkboxErr="";



    $nombre = "";
    $apellidos = "";
    $domicilio = "";
    $genero = "";
    $usuario = "";
    $pwd ="";
    $checkbox = "";

    if($_SERVER["REQUEST_METHOD"] =="POST"){
        if(empty($_POST["nombre"])){
            $nombreErr="Nombre no Valido.";
        }else{
            $nombre = test_input($_POST["nombre"]);
            if(!preg_match("/^[A-Z][a-zA-Záéíóú]{2,}([ ]?[A-Z][a-zA-Záéíóú]{2,})?$/",$nombre)){
                $nombreErr = "Solo se aceptan letras y espacios";
            }
        }
    }


    if($_SERVER["REQUEST_METHOD"] =="POST"){
        if(empty($_POST["apellidos"])){
            $apellidosErr="Apellidos no Valido.";
        }else{
            $apellidos = test_input($_POST["apellidos"]);
            if(!preg_match("/^[A-Z][a-zA-ZáéíóúñÑ]+ [A-Z][a-zA-ZáéíóúñÑ]+$/",$apellidos)){
                $apellidosErr = "Solo se aceptan letras y espacios";
            }
        }
    }



    if($_SERVER["REQUEST_METHOD"] =="POST"){
        if(empty($_POST["genero"])){
            $generoErr="Genero no Valido.";
        }else{
            $genero = test_input($_POST["genero"]);
            if(!preg_match("/^[a-zA-Z-' ]*$/",$genero)){
                $generoErr = "Solo se aceptan letras y espacios";
            }
        }
    }

    if($_SERVER["REQUEST_METHOD"] =="POST"){
        if(empty($_POST["domicilio"])){
            $domicilioErr="Domicilio no Valido.";
        }else{
            $domicilio = test_input($_POST["domicilio"]);
            if(!preg_match("/^[\w\s#.,-]+$/u",$domicilio)){
                $domicilioErr = "Solo se aceptan letras y espacios";
            }
        }
    }

    if($_SERVER["REQUEST_METHOD"] =="POST"){
        if(empty($_POST["usuario"])){
            $usuarioErr="Usuario no Valido.";
        }else{
            $usuario = test_input($_POST["usuario"]);
            if(!preg_match("/^[a-zA-Z0-9\_\-]{4,16}$/u",$usuario)){
                $usuario = "Usuario no válido. Puede contener letras, numeros, guion y guion bajo y debe de contener un caracter mínimo de 4";
            }
        }
    }

    if($_SERVER["REQUEST_METHOD"] =="POST"){
        if(empty($_POST["pwd"])){
            $pwdErr="Password no Valido.";
        }else{
            $pwd = test_input($_POST["pwd"]);
            if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/u",$pwd)){
                $pwdErr = "Contraseña no válida. Puede contener cualquier caracter, pero debe contener una letra minúscula como mínimo, una letra mayúscula como mínimo y debe de contener como mínimo 8 caracteres.";
            }
        }
    }

    if($_SERVER["REQUEST_METHOD"] =="POST"){
        if(empty($_POST["checkbox"])){
            $checkboxErr="Terminos no Valido.";
        }else{
            $checkbox = test_input($_POST["checkbox"]);
            if(!preg_match("/^[a-zA-Z-' ]*$/",$checkbox)){
                $checkboxErr = "Solo se aceptan letras y espacios";
            }
        }
    }



    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlentities($data);
    return $data;
    }

    
    ?>

    <div class="contenedor">
        <label for="titulo" class="titulo">Registro de Usuarios</label> 
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  class="formulario" name="formulario" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $nombre;?>" class="form-control"  placeholder="Escribe tu nombre" >
            <p class="error"><?php echo $nombreErr;?> </p>
            
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" value="<?php echo $apellidos;?>" class="form-control" placeholder="Escribe tus apellidos" >
            <p class="error"><?php echo $apellidosErr;?> </p>
            
            
            <label for="genero">Seleccione su género:</label>
            <div class="radio">
                <input type="radio" name="genero" value="M"  value="<?php echo $genero;?>" id="H" >
                <label for="H" id="mas">Masculino</label>
                <input type="radio" name="genero" value="F"  id="M">
                <label for="M" id="fem">Femenino</label>
                
            </div>
            
            <p class="error"><?php echo $generoErr;?> </p>
            
            <label for="domicilio">Domicilio</label>
            <input type="text" name="domicilio" id="domicilio" value="<?php echo $domicilio;?>" class="form-control"  placeholder="Escribe el nombre de usuario" >
            <p class="error"><?php echo $domicilioErr;?> </p>

            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" value="<?php echo $usuario;?>"  placeholder="Escribe el nombre de usuario" class="form-control" >
            <p class="error"><?php echo $usuarioErr;?> </p>

            <label for="pwd">Contraseña:</label>
            <input type="password" name="pwd" id="pwd" value="<?php echo $pwd;?>" placeholder="Escribe una contraseña" class="form-control">
            <p class="error"><?php echo $pwdErr;?> </p>
            
            <div class="checkbox">
                <input type="checkbox" name="checkbox"  id="checkbox" class="form-control"  >
                <label for="checkbox">Acepto terminos y condiciones</label>
                
            </div>
            
            <div class="btn-group">
                <input type="reset" value="Cancelar" class="cancelar">
        
                <input type="submit" value="Registrar" class="guardar"> 
                
            </div>
        </form>
    </div>
    