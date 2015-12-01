<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$cliente = new User();
$cliente->read();
$pkID = Request::post("pkID");
$r = $gestor->set($cliente, $pkID);

$bd->close();
echo $r;
var_dump($bd->getError());

//header("Location:index.php?op=edit&r=$r");


