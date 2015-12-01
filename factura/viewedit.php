<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageFactura($bd);
$id = Request::get("ID");
$facturas = $gestor->get($id);
//var_dump($gestor->getValuesSelect());
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
        <form action="phpedit.php" method="POST">
            <input type="hidden" name="num_factura" value="<?php echo $facturas->getNum_factura();?>" /><br />
            <span class="labels">Id Cliente<sup>*</sup> </span><input required  type="text" name="id_cliente" value="<?php echo $facturas->getId_cliente();?>" /><br />
            <span class="labels">Fecha<sup>*</sup> </span><input required  type="datetime" name="fecha" value="<?php echo $facturas->getFecha();?>" /><br />
            <input type="hidden" name="pkID" value="<?php echo $facturas->getNum_factura(); ?>" /><br/>
            <input class="botonEditar" type="submit" value="edicion"/>
           </div>
        </form>
    </body>
</html>
<?php
$bd->close();