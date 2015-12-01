<?php

require '../clases/AutoCarga.php';
$bd = new DataBase();

$gestorJuego = new ManageGame($bd);
$juego = new Game();
$juego->read();
$pkID = Request::post("pkID");
$stock = Request::post("stock");
$cantidad = Request::post("cantidad");
$stockDisponible = $juego->getStock()-$cantidad;

if($cantidad > $stock){
    echo $cantidad."  ". $stock;
    echo "No hay suficientes unidades";
}else{

/*GENERAMOS LA FACTURA*/
$gestorFactura = new ManageFactura($bd);
$facturas = new Factura();
$facturas->read();

$sesion = new Session();
$id = $sesion->get("id");
$time = time();
$fecha = date("Y-m-d H:i:s", $time);;
echo $fecha;

$facturas->setId_cliente($id);
$facturas->setFecha($fecha);

$r = $gestorFactura->insert($facturas);

echo "El id de la factura es ".$r;

/*GENERAMOS EL DETALLE*/
$id_juego = Request::post("id_juego");
$precio = Request::post("precio");


$gestorDetalle = new ManageDetalle($bd);
$detalles = new Detalle();
$detalles->read();

//$detalles->setNum_factura("27");
$detalles->setNum_factura($r);

echo "el numero de la factura es " .$facturas->getNum_factura();

$detalles->setId_juego($id_juego);
$detalles->setCantidad($cantidad);

echo "<br/> la cantidad es ".$cantidad;
echo $precioTotal = $cantidad*$precio;

$detalles->setPrecio($precioTotal);

$r = $gestorDetalle->insert($detalles);

/**/

/*MODIFICAMOS EL STOCK DEL JUEGO*/
echo "<br><br>";

echo "<br><br>Stock Disponible ".$stockDisponible."<br><br>";
$juego->setStock($stockDisponible);
$r = $gestorJuego->set($juego, $pkID);

$bd->close();

//echo $r;
//var_dump($bd->getError());
header("Location:../paginasUsuarios/comprado.php");
}
