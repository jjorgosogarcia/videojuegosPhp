<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestorDetalle = new ManageDetalle($bd);
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
                        <li><a href="../user/index.php">Usuarios</a></li>
                        <li><a href="../factura/index.php">Facturas</a></li>
                        <li><a class="actual">Detalles</a></li>
                        <li><a href="../facturasDetallesClientes/index.php">Todas las facturas</a></li>
                        <li><a href="../login/phplogout.php">Logout</a></li>
                    </ul>
                </nav>
                <div class="separador"></div>
            </div>
    </header>
    <div class="cajaEditar cajaAdmin">
        <form action="phpinsert.php" method="POST">
            <span class="labels">Num Factura<sup>*</sup> </span><input required  type="text" name="num_factura" value="" /><br />
            <span class="labels">Id Juego<sup>*</sup> </span><input required  type="text" name="id_juego" value="" /><br />
            <span class="labels">Cantidad<sup>*</sup> </span><input required  type="text" name="cantidad" value="" /><br />
            <span class="labels">Precio<sup>*</sup> </span><input required  type="text" name="precio" value="" /><br />
            <input class="botonEditar" type="submit" value="insertar"/>
        </form>
    </div>
    </body>
</html>
<?php
$bd->close();