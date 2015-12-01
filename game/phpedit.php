<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageGame($bd);
$juego = new Game();
$juego->read();

$subir= new FileUpload("caratula");
$subir->setDestino("./caratulas/");
$subir->setTamaño(100000000);
$subir->setNombre($subir->getNombre());
$subir->setPolitica(FileUpload::REEMPLAZAR);

if($subir->upload()){
    echo 'Archivo subido con éxito';
} else{
    echo 'Archivo no subido';
}

$juego->setCaratula($subir->getNombre());

$pkID = Request::post("pkID");
$r = $gestor->set($juego, $pkID);

$bd->close();
//echo $r;
//var_dump($bd->getError());

header("Location:index.php?op=edit&r=$r");

