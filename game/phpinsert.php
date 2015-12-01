<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageGame($bd);
$juegos = new Game();
$juegos->read();

$subir= new FileUpload("caratula");
$subir->setDestino("./caratulas/");
$subir->setTamaño(100000000);
$subir->setNombre($subir->getNombre());
$subir->setPolitica(FileUpload::RENOMBRAR);
if($subir->upload()){
    echo 'Archivo subido con éxito';
} else{
    echo 'Archivo no subido';
}

$juegos->setCaratula($subir->getNombre());

$r = $gestor->insert($juegos);
$bd->close();

//echo $r;
//var_dump($bd->getError());

header("Location:index.php?op=insert&r=$r");