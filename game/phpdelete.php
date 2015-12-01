<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageGame($bd);
$code = Request::get("Code");
$f = Request::get("f");
if($f===null){
    $r = $gestor->delete($code); 
}else{
    $r = $gestor->forzarDelete($code);
}
$bd->close();
echo $r;
var_dump($bd->getError());
//header("Location:index.php?op=delete&r=$r");