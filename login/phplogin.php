<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$clientes = $gestor->getList();


$user = Request::post("user");
$password = Request::post("password");
$sesion = new Session();
 
foreach ($clientes as $indice => $cliente) { 
   if($user == $cliente->getUsuario() && $password == $cliente->getPassword()){
       echo "LOGINNN";
       if($cliente->getUsuario()=="admin" && $cliente->getPassword()=="admin"){
            header("Location:../index.php");
       }else{
            $sesion->set("user", $user);
            $sesion->set("id", $cliente->getId_cliente());
            header("Location:../paginasUsuarios/index.php");
       }
   }else{
       echo "NO LOGINN";
   }
}

 
/*if($clientes->getUsuario() && $clientes->getPassword()){
     $sesion->set("user", $user);
     header("Location:index.php");
}*/