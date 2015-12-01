<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$clientes = new User();
$clientes->read();

$r = $gestor->insert($clientes);
$bd->close();

//echo $r;
//var_dump($bd->getError());

header("Location:index.php?op=insert&r=$r");