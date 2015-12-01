

<?php
require '../clases/AutoCarga.php';
$sesion = new Session();
$user = $sesion->get("user");
$id = $sesion->get("id");

$bd = new DataBase();

$gestor = new ManageRelationsJ($bd);
$facturaDetallada = $gestor->getListJuegoDetalleFactura("cl.id_cliente =" .$id);


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
                    <li><a href="index.php" >Home</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=Ps4" >Ps4</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=Xbox One">Xbox One</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=Pc">Pc</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=Wii U" >Wii U</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=Ps3">Ps3</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=Xbox 360">Xbox 360</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=Nintendo 3ds" >3ds</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=PsVita">Ps Vita</a></li>
                </ul>
            </nav>
            <div class="separador"></div>
        </div>
    </header>
       <div class="contenedor"> 
        <h1>Listado de compras de  <?php echo $user; ?></h1> 
        
                <div class="CSSTableGenerator" >
        <table border="1">
            <thead>
                <tr class="CSSTableGenerator2">
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

