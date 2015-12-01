<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$clientes = $gestor->getList();
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
$clientes = $gestor->getList($page, trim($orden));
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
                        <li><a class="actual">Usuarios</a></li>
                        <li><a href="../factura/index.php" >Facturas</a></li>
                        <li><a href="../detalle/index.php" >Detalles</a></li>
                        <li><a href="../facturasDetallesClientes/index.php">Todas las facturas</a></li>
                        <li><a href="../login/phplogout.php">Logout</a></li>
                    </ul>
                </nav>
                <div class="separador"></div>
            </div>
        </header>
        <div class="contenedor"> 
            <h2><?php
            if ($op != null) {
                echo "<h1>La operación $op ha dado como resultado $r</h1>";
            }
            ?>
            </h2>
            <h2><a href="viewInsert.php">Insertar Usuario</a></h2>
            <div class="CSSTableGenerator" >
                <table border="1">
                    <thead>
                        <tr class="CSSTableGenerator2">
                            <th>
                                ID 
                                <a href="?order=id_juego&sort=desc">&Del;</a> 
                                <a href="?order=id_juego&sort=asc">&Delta;</a>
                            </th>
                            <th>
                                Usuario  
                                <a href="?order=usuario&sort=desc">&Del;</a> 
                                <a href="?order=usuario&sort=asc">&Delta;</a>
                            </th>
                            <th>
                                Password
                                <a href="?order=password&sort=desc">&Del;</a> 
                                <a href="?order=password&sort=asc">&Delta;</a>
                            </th>                         
                            <th>
                                Nombre  
                                <a href="?order=nombre&sort=desc">&Del;</a> 
                                <a href="?order=nombre&sort=asc">&Delta;</a>
                            </th>
                            <th>
                                Apellidos
                                <a href="?order=apellidos&sort=desc">&Del;</a> 
                                <a href="?order=apellidos&sort=asc">&Delta;</a>
                            </th>
                            <th>
                                Direccion
                                <a href="?order=direccion&sort=desc">&Del;</a> 
                                <a href="?order=direccion&sort=asc">&Delta;</a>
                            </th>
                            <th>
                                Fecha de nacimiento
                                <a href="?order=fechaNacimiento&sort=desc">&Del;</a> 
                                <a href="?order=fechaNacimiento&sort=asc">&Delta;</a>
                            </th>
                            <th>
                                Telefono 
                                <a href="?order=telefono&sort=desc">&Del;</a> 
                                <a href="?order=telefono&sort=asc">&Delta;</a>
                            </th>
                            <th>
                                Email 
                                <a href="?order=email&sort=desc">&Del;</a> 
                                <a href="?order=email&sort=asc">&Delta;</a>
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
                        <?php foreach ($clientes as $indice => $cliente) { ?>
                            <tr>
                                <td><?= $cliente->getId_cliente() ?></td>
                                <td><?= $cliente->getUsuario() ?></td>
                                <td><?= $cliente->getPassword() ?></td>
                                <td><?= $cliente->getNombre() ?></td>
                                <td><?= $cliente->getApellidos() ?></td>
                                <td><?= $cliente->getDireccion() ?></td>
                                <td><?= $cliente->getFechaNacimiento() ?></td>
                                <td><?= $cliente->getTelefono() ?></td>
                                <td><?= $cliente->getEmail() ?></td>
                                <td>
                                    <a class='borrar' href='phpdelete.php?Code=<?= $cliente->getId_cliente() ?>'>borrar</a> 
                                    <a href='viewedit.php?ID=<?= $cliente->getId_cliente() ?>'>editar</a>
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
