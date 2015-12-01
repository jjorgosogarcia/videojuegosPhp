<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageFactura($bd);
$facturas = $gestor->getList();
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
$facturas = $gestor->getList($page, trim($orden));
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
                        <li><a  href="../game/index.php">Juegos</a></li>
                        <li><a href="../user/index.php">Usuarios</a></li>
                        <li><a class="actual" >Facturas</a></li>
                        <li><a href="../detalle/index.php">Detalles</a></li>
                        <li><a href="../facturasDetallesClientes/index.php">Todas las facturas</a></li>
                        <li><a href="../login/phplogout.php">Logout</a></li>
                    </ul>
                </nav>
                <div class="separador"></div>
            </div>
        </header>
        <div class="contenedor"> 
            <h2><a href="viewInsert.php">Insertar Factura</a></h2>
            <div class="CSSTableGenerator" >
                <table border="1">
                    <thead>
                        <tr class="CSSTableGenerator2">

                            <th>
                                Numero de factura
                                <a href="?order=num_factura&sort=desc">&Del;</a> 
                                <a href="?order=num_factura&sort=asc">&Delta;</a>
                            </th>
                            <th>
                                Id cliente
                                <a href="?order=id_cliente&sort=desc">&Del;</a> 
                                <a href="?order=id_cliente&sort=asc">&Delta;</a>
                            </th>
                            <th>
                                Fecha 
                                <a href="?order=fecha&sort=desc">&Del;</a> 
                                <a href="?order=fecha&sort=asc">&Delta;</a>
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
                        <?php foreach ($facturas as $indice => $factura) { ?>
                            <tr>
                                <td><?= $factura->getNum_factura() ?></td>
                                <td><?= $factura->getId_cliente() ?></td>
                                <td><?= $factura->getFecha() ?></td>
                                <td>
                                    <a class='borrar' href='phpdelete.php?Code=<?= $factura->getNum_factura() ?>'>borrar</a> 
                                    <a href='viewedit.php?ID=<?= $factura->getNum_factura() ?>'>editar</a>
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
