<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestorUsuario = new ManageUser($bd);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../css/estilos.css" rel="stylesheet">
    </head>
    <body>
             <header class="contenedorCabecera">
            <div class="cabeceraEdit">
                <nav class="navIndex">
                    <ul class="ulIndex edit">
                        <li><a href="../game/index.php" >Juegos</a></li>
                        <li><a class="actual">Usuarios</a></li>
                        <li><a href="../factura/index.php">Facturas</a></li>
                        <li><a href="../detalle/index.php">Detalles</a></li>
                        <li><a href="../facturasDetallesClientes/index.php">Todas las facturas</a></li>
                        <li><a href="../login/phplogout.php">Logout</a></li>
                    </ul>
                </nav>
                <div class="separador"></div>
            </div>
    </header>
      <div class="cajaEditar cajaAdmin">
        
        <form action="phpinsert.php" method="POST">
            <span class="labels">Usuario<sup>*</sup></span><input required  type="text" name="usuario" value="" /><br />
            <span class="labels">Password<sup>*</sup></span><input required  type="text" name="password" value="" /><br />
            <span class="labels">Nombre<sup>*</sup></span><input type="text" name="nombre" value="" /><br />
            <span class="labels">Apellidos<sup>*</sup></span><input required  type="text" name="apellidos" value="" /><br />
            <span class="labels">Direccion<sup>*</sup></span><input required  type="text" name="direccion" value="" /><br />
            <span class="labels">Fnacimiento<sup>*</sup></span><input required  type="text" name="fechaNacimiento" value="" /><br />
            <span class="labels">Telefono<sup>*</sup></span><input required  type="text" name="telefono" value="" /><br />
            <span class="labels">Email<sup>*</sup></span><input required  type="text" name="email" value="" /><br />
            <input class="botonEditar" type="submit" value="insertar"/>
        </form>
      <div>
    </body>
</html>
<?php
$bd->close();