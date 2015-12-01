<?php
require '../clases/AutoCarga.php';
$sesion = new Session();
$user = $sesion->get("user");
$id = $sesion->get("id");

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

$busquedaPlataforma = Request::get("busquedaPlataforma");

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
                    <li><a href="tienda.php?busquedaPlataforma=Ps4" >Ps4</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=Xbox One">Xbox One</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=Pc">Pc</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=Wii U" >Wii U</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=Ps3">Ps3</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=Xbox 360">Xbox 360</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=Nintendo 3ds" >3ds</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=PsVita">Ps Vita</a></li>
                    <li><a href="../login/phplogout.php">Logout</a></li>
                </ul>
            </nav>
            <div class="separador"></div>
        </div>
    </header>
       <div class="contenedor"> 
        <h1>Bienvenido <?php echo $user; ?></h1> 
        <h4 class="bienvenido">Si quiere ver sus facturas pulse en el enlace <a href="comprado.php">factura</a>
        O si desea echar un vistazo a los juegos que tenemos vaya al menu.</h4>
       </div>
    </body>
</html>
<?php
$bd->close();

