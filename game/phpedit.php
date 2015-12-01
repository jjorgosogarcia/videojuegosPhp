<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageGame($bd);
$juego = new Game();
$juego->read();
$pkID = Request::post("pkID");
$r = $gestor->set($juego, $pkID);

$bd->close();
echo $r;
var_dump($bd->getError());


//header("Location:index.php?op=edit&r=$r");

