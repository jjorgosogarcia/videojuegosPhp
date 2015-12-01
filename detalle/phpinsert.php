<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageDetalle($bd);
$detalles = new Detalle();
$detalles->read();

$r = $gestor->insert($detalles);
$bd->close();

//echo $r;
//var_dump($bd->getError());
header("Location:index.php?op=insert&r=$r");