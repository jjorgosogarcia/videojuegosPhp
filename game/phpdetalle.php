<?php

require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestorDetalle = new ManageDetalle($bd);
$detalles = new Detalle();
$detalles->read();


/**/
$cantidad = Request::post("cantidad");
$precio = $cantidad*$precio;

$detalles->setPrecio($precio);

$time = time();
$fecha = date("Y-m-d H:i:s", $time);;
echo $fecha;



$r = $gestorDetalle->insert($detalles);
$bd->close();

echo $r;
var_dump($bd->getError());