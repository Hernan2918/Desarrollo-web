<?php include("seguridad.php") ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/registro.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>


<?php
    include_once("conexion.php");
    $sal="Select * from usuarios ORDER BY nombre ASC";
    $result = $conex->prepare($sal);
    $result->execute();
    $row = $result->fetchAll();
    $tot_registros = $result->rowCount();
?>

    <div class="menu">
        <ul>
            
            <li>UES San Jose del Rincón</li>
            <input type="search" id="busqueda" name="busqueda" placeholder="¿A quien buscaremos hoy?"> 
            <p>Bienvenido <?php $user = $_SESSION["usuario"]; echo $user;?> </p>
            
            
            
        </ul>
        <div class="menu2">
        
            <ul>
                <a href="formulario.html" class="current scroll"><i class="fa fa-navicon" aria-hidden="true"></i> </a>
                <a href="formulario.html" class="current scroll"><i class="fa fa-home" aria-hidden="true"></i> </a>
                <a href="formulario.html" class=" scroll"><i class="fa fa-group" aria-hidden="true"></i></a>
                <a class="scroll"><i class="fa fa-plus" aria-hidden="true"></i></a>
                <a class="scroll" href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i></a>
            </ul>
            
            
            
        </div>
        <div class="registro">
            <h1>Consulta General de Usuarios</h1>
            <p class="Total">Total: <?php echo $tot_registros ?></p> <button><a href="formulario.html">+ Nuevo Usuario</a></button> 
            

            

            <table class="tabla">
                <thead>
                    <tr class = "cabecera">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Genero</th>
                        <th>Domicilio</th>
                        <th>Usuario</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach($row as $fila):?>
                    <tr class="texto">
                        <td><?php echo $fila['id_usuario'];?></td>
                        <td><?php echo $fila['nombre'];?></td>
                        <td><?php echo $fila['apellidos'];?></td>
                        <td><?php if ($fila['genero'] == "M"){echo ("Masculino");} else {echo ("Femenino");}?></td>
                        <td><?php echo $fila['domicilio'];?></td>
                        <td><?php echo $fila['usuario'];?></td>

                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            
            

        </div>
        
    </div>
    

    
    
</body>
</html>