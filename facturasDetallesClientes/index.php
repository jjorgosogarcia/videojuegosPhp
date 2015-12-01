<?php
require '../clases/AutoCarga.php';
$sesion = new Session();
$user = $sesion->get("user");
$id = $sesion->get("id");

$bd = new DataBase();

$gestor = new ManageRelationsJ($bd);
$facturaDetallada = $gestor->getListJuegoDetalleFactura();

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
                        <li><a href="../detalle/index.php">Detalles</a></li>
                        <li><a class="actual">Todas las facturas</a></li>
                        <li><a href="../login/phplogout.php">Logout</a></li>
                </ul>
            </nav>
            <div class="separador"></div>
        </div>
    </header>
       <div class="contenedor todas">     
                <div class="CSSTableGenerator" >
        <table border="1">
            <thead>
                <tr class="CSSTableGenerator2">
                    <th>
                        Usuario
                    </th>
                    <th>
                        Juego
                    </th>
                    <th>
                        Plataforma 
                    </th>
                    <th>
                        Cantidad  
                    </th>
                    <th>
                        Precio 
                    </th>
                    <th>
                        Fecha
                    </th>
                </tr>
            </thead>
            <tfoot>
                <tr class="CSSTableGenerator2">
                    <td colspan="10">
                       
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($facturaDetallada as $indice => $fd) { ?>
                <tr>
                    <td><?= $fd["cliente"]->getEmail() ?></td>
                    <td><?= $fd["juego"]->getNombre() ?></td>
                    <td><?= $fd["juego"]->getPlataforma() ?></td>
                    <td><?= $fd["detalle"]->getCantidad() ?></td>
                    <td><?= $fd["detalle"]->getPrecio() ?></td>
                    <td><?= $fd["factura"]->getFecha() ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
       </div>
    </body>
</html>
<?php
$bd->close();

