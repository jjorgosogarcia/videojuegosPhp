<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageGame($bd);
$juegos = $gestor->getList();
$op = Request::get("op");
$r = Request::get("r");

$page = Request::get("page");
if($page===null || $page ===""){
    $page = 1;
}
/*Nos devuelve el numero de paginas*/
$registros = $gestor->count();
$pages = ceil($registros/  Constant::NRPP);
/**/

$order = Request::get("order");
$sort = Request::get("sort");
$orden = "$order $sort";
$trozoEnlace ="";
if(trim($orden)!=""){
    $trozoEnlace = "&order=$order&sort=$sort";
}
$juegos = $gestor->getList($page, trim($orden));

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
                    <li><a class="actual">Juegos</a></li>
                    <li><a href="../user/index.php">Usuarios</a></li>
                    <li><a href="../factura/index.php">Facturas</a></li>
                    <li><a href="../detalle/index.php">Detalles</a></li>
                    <li><a href="../facturasDetallesClientes/index.php">Todas las facturas</a></li>
                    <li><a href="../login/phplogout.php">Logout</a></li>
                </ul>
            </nav>
            <div class="separador"></div>
        </div>
    </header>
       <div class="contenedor"> 
        <h2><?php if($op!=null){
              echo "<h1>La operación $op ha dado como resultado $r</h1>";
        }?></h2>
        
        
        <h2><a href="viewInsert.php">Insertar Juego</a></h2>
        <div class="CSSTableGenerator" >
        <table border="1">
            <thead>
                <tr class="CSSTableGenerator2">
                    <th>
                        ID 
                        <a href="?order=id_juego&sort=desc">&Del;</a> 
                        <a href="?order=id_juego&sort=asc">&Delta;</a></th>
                    <th>
                        Caratula  
                        <a href="?order=caratula&sort=desc">&Del;</a> 
                        <a href="?order=caratula&sort=asc">&Delta;</a></th>
                    <th>
                        Nombre  
                        <a href="?order=nombre&sort=desc">&Del;</a> 
                        <a href="?order=nombre&sort=asc">&Delta;</a></th>
                    <th>
                        Genero 
                        <a href="?order=genero&sort=desc">&Del;</a> 
                        <a href="?order=genero&sort=asc">&Delta;</a></th>
                    <th>
                        Descripcion 
                        <a href="?order=descripcion&sort=desc">&Del;</a> 
                        <a href="?order=descripcion&sort=asc">&Delta;</a></th>
                    <th>
                        Plataforma 
                        <a href="?order=plataforma&sort=desc">&Del;</a> 
                        <a href="?order=plataforma&sort=asc">&Delta;</a></th>
                    <th>
                        Precio  
                        <a href="?order=precio&sort=desc">&Del;</a> 
                        <a href="?order=precio&sort=asc">&Delta;</a></th>
                    <th>
                        Stock 
                        <a href="?order=stock&sort=desc">&Del;</a> 
                        <a href="?order=stock&sort=asc">&Delta;</a></th>
                    <th colspan="3">Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr class="CSSTableGenerator2">
                    <td colspan="10">
                        <a href="?page=1<?php $trozoEnlace ?>">Primero</a>
                        <a href="?page=<?php echo max(1, $page-1).$trozoEnlace?>">Anterior</a>
                        <a href="?page=<?php echo min($page+1, $pages).$trozoEnlace?>">Siguiente</a>
                        <a href="?page=<?php echo $pages.$trozoEnlace ?>">Ultimo</a>
                        <form method="post" style="display: inline;" id="fselect" action=".">
                        </form>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($juegos as $indice => $juego) { ?>
                <tr>
                    <td><?= $juego->getId_juego() ?></td>
                    <td><?= $juego->getCaratula() ?></td>
                    <td><?= $juego->getNombre() ?></td>
                    <td><?= $juego->getGenero() ?></td>
                    <td><?= $juego->getDescripcion() ?></td>
                    <td><?= $juego->getPlataforma() ?></td>
                    <td><?= $juego->getPrecio() ?></td>
                    <td><?= $juego->getStock() ?></td>
                    <td>
                        <a class='borrar' href='phpdelete.php?Code=<?= $juego->getId_juego() ?>'>borrar</a> 
                        <a href='viewedit.php?ID=<?= $juego->getId_juego() ?>'>editar</a>
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
