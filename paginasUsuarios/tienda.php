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
                    <li><a href="index.php" >Home</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=Ps4" >Ps4</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=Xbox One">XboxOne</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=Pc">Pc</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=Wii U" >WiiU</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=Ps3">Ps3</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=Xbox 360">Xbox360</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=Nintendo 3ds" >3ds</a></li>
                    <li><a href="tienda.php?busquedaPlataforma=PsVita">PsVita</a></li>
                </ul>
            </nav>
            <div class="separador"></div>
        </div>
    </header>
       <div class="contenedor"> 
        <h1> </h1>        
        <div class="CSSTableGenerator" >
        <table border="1">

            <tbody>
                <?php foreach ($juegos as $indice => $juego) {
                    if($juego->getPlataforma()==$busquedaPlataforma){?>
                
            <div class="juego">
                <h2><?= $juego->getNombre() ?></h2>
                <img src="../game/caratulas/<?= $juego->getCaratula() ?>.jpg"></img>
                <span class="plataforma">Plataforma: <?= $juego->getPlataforma() ?></span>
                <span class="genero">Genero: <?= $juego->getGenero() ?></span>
                <p class="descripcion">Descripcion: <?= $juego->getDescripcion() ?></p>
                <span class="precio">Precio: <?= $juego->getPrecio() ?>€</span>
                <span class="stock"><?= $juego->getStock() ?> unidades disponibles</span>
                <div class="separador"></div>
                    <form action="../game/phpcomprar.php?ID=<?= $juego->getId_juego() ?>" method="POST">
                        <input placeholder="cantidad" required class="cantidadComprar" maxlength="4" size="4" type="number" name="cantidad" value="" />
                            <input type="hidden" name="id_juego" value="<?= $juego->getId_juego() ?>" />
                            <input type="hidden" name="caratula" value="<?= $juego->getCaratula() ?>" />
                            <input type="hidden" name="nombre" value="<?= $juego->getNombre() ?>" />
                            <input type="hidden" name="genero" value="<?= $juego->getGenero() ?>" />
                            <input type="hidden" name="descripcion" value="<?= $juego->getDescripcion() ?>" />
                            <input type="hidden" name="plataforma" value="<?= $juego->getPlataforma() ?>" />
                            <input type="hidden" name="precio" value="<?= $juego->getPrecio() ?>" />  
                            <input type="hidden" name="stock" value="<?= $juego->getStock() ?>" />
                            <input type="hidden" name="pkID" value="<?=  $juego->getId_juego(); ?>" />
                            <input class="botonComprar" type="submit" value="comprar" />
                    </form>
            </div>
                    <?php } } ?>
            
            </tbody>
        </table>
        </div>
       </div>
    </body>
</html>
<?php
$bd->close();

