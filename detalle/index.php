<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageDetalle($bd);
$detalles = $gestor->getList();
$op = Request::get("op");
$r = Request::get("r");

$page = Request::get("page");
if ($page === null || $page === "") {
    $page = 1;
}
/* Nos devuelve el numero de paginas */
$registros = $gestor->count();
$pages = ceil($registros / Constant::NRPP);
/**/

$order = Request::get("order");
$sort = Request::get("sort");
$orden = "$order $sort";
$trozoEnlace = "";
if (trim($orden) != "") {
    $trozoEnlace = "&order=$order&sort=$sort";
}
$detalles = $gestor->getList($page, trim($orden));
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
            <div class="cabecera">
                <nav class="navIndex">
                    <ul class="ulIndex">
                        <li><a href="../game/index.php">Juegos</a></li>
                        <li><a href="../user/index.php">Usuarios</a></li>
                        <li><a href="../factura/index.php" >Facturas</a></li>
                        <li><a class="actual">Detalles</a></li>
                        <li><a href="../facturasDetallesClientes/index.php">Todas las facturas</a></li>
                        <li><a href="../login/phplogout.php">Logout</a></li>
                    </ul>
                </nav>
                <div class="separador"></div>
            </div>
        </header>
        <div class="contenedor"> 
        <h2><a href="viewInsert.php">Insertar Detalle</a></h2>
                    <div class="CSSTableGenerator" >
                <table border="1">
                    <thead>
                        <tr class="CSSTableGenerator2">

                            <th>
                                Numero detalle
                                <a href="?order=num_detalle&sort=desc">&Del;</a> 
                                <a href="?order=num_detalle&sort=asc">&Delta;</a>
                            </th>
                            <th>
                                Id factura
                                <a href="?order=num_factura&sort=desc">&Del;</a> 
                                <a href="?order=num_factura&sort=asc">&Delta;</a>
                            </th>
                            <th>
                                Id juego
                                <a href="?order=id_juego&sort=desc">&Del;</a> 
                                <a href="?order=id_juego&sort=asc">&Delta;</a>
                            </th>
                                                        <th>
                                Cantidad
                                <a href="?order=cantidad&sort=desc">&Del;</a> 
                                <a href="?order=cantidad&sort=asc">&Delta;</a>
                            </th>
                            <th>
                                Precio 
                                <a href="?order=precio&sort=desc">&Del;</a> 
                                <a href="?order=precio&sort=asc">&Delta;</a>
                            </th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="CSSTableGenerator2">
                            <td colspan="11">
                                <a href="?page=1<?php $trozoEnlace ?>">Primero</a>
                                <a href="?page=<?php echo max(1, $page - 1) . $trozoEnlace ?>">Anterior</a>
                                <a href="?page=<?php echo min($page + 1, $pages) . $trozoEnlace ?>">Siguiente</a>
                                <a href="?page=<?php echo $pages . $trozoEnlace ?>">Ultimo</a>
                                <form method="post" style="display: inline;" id="fselect" action=".">

                                </form>
                            </td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($detalles as $indice => $detalle) { ?>
                            <tr>
                                <td><?= $detalle->getNum_detalle() ?></td>
                                <td><?= $detalle->getNum_factura() ?></td>
                                <td><?= $detalle->getId_juego() ?></td>
                                <td><?= $detalle->getCantidad() ?></td>
                                <td><?= $detalle->getPrecio() ?></td>
                                <td>
                                    <a class='borrar' href='phpdelete.php?Code=<?= $detalle->getNum_detalle() ?>'>borrar</a> 
                                    <a href='viewedit.php?ID=<?= $detalle->getNum_detalle() ?>'>editar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script src="../js/scripts.js"></script>
    </body>
</html>
<?php
$bd->close();
