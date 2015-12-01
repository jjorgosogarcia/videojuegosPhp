<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageDetalle($bd);
$detalle = new Detalle();
$detalle->read();
$pkID = Request::post("pkID");
$r = $gestor->set($detalle, $pkID);

$bd->close();
//echo $r;
//var_dump($bd->getError());
header("Location:index.php?op=edit&r=$r");

