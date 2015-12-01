<?php
require 'clases/AutoCarga.php';
$sesion = new Session();
$user = $sesion->get("user");
$id = $sesion->get("id");
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
            <link href="css/estilos.css" rel="stylesheet">
    </head>
    <body>
        <header class="contenedorCabecera">
        <div class="cabecera">
           <h1>Architecube</h1>
            <nav class="navIndex">
                <ul class="ulIndex">
                    <li><a class="actual">Home</a></li>
                    <li><a href="game/index.php">Juegos</a></li>
                    <li><a href="user/index.php">Usuarios</a></li>
                    <li><a href="factura/index.php">Facturas</a></li>
                    <li><a href="detalle/index.php">Detalles</a></li>
                    <li><a href="login/phplogout.php">Logout</a></li>
                </ul>
            </nav>
            <div class="separador"></div>
        </div>
    </header>
      
        <div class="contenedor">
            <h1>Bienvenido al panel de gestión <?php echo $user. $id ; ?></h1>
        </div>
    </body>
</html>
