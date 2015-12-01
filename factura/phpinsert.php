<?php
require '../clases/AutoCarga.php';
$sesion = new Session();
$id = $sesion->get("id");

$bd = new DataBase();
$gestor = new ManageFactura($bd);
$facturas = new Factura();
$facturas->read();

$facturas->setId_cliente($id);

$r = $gestor->insert($facturas);
$bd->close();

//echo $r;
//var_dump($bd->getError());
header("Location:index.php?op=insert&r=$r");