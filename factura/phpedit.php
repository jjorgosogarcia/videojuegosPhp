<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageFactura($bd);
$factura = new Factura();
$factura->read();
$pkID = Request::post("pkID");
$r = $gestor->set($factura, $pkID);

$bd->close();
//echo $r;
//var_dump($bd->getError());
header("Location:index.php?op=edit&r=$r");

