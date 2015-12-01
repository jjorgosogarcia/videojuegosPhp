<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestorFactura = new ManageFactura($bd);
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
                        <li><a class="actual">Juegos</a></li>
                        <li><a href="../user/index.php">Usuarios</a></li>
                        <li><a class="actual">Facturas</a></li>
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
            <span class="labels">Id Cliente<sup>*</sup> </span><input required  type="text" name="id_cliente" value="" /><br />
            <span class="labels">Fecha<sup>*</sup> </span><input required  type="text" name="fecha" value="" /><br />
            <input class="botonEditar" type="submit" value="insertar"/>
        </form>
        </div>
    </body>
</html>
<?php
$bd->close();