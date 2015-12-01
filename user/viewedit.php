<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$id = Request::get("ID");
$clientes = $gestor->get($id);
//var_dump($gestor->getValuesSelect());
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../css/estilos.css" rel="stylesheet">
    </head>
    <body>
     <header class="contenedorCabecera">
            <div class="cabeceraEdit">
                <nav class="navIndex">
                    <ul class="ulIndex edit">
                        <li><a href="../game/index.php" >Juegos</a></li>
                        <li><a class="actual">Usuarios</a></li>
                        <li><a href="../factura/index.php">Facturas</a></li>
                        <li><a href="../detalle/index.php">Detalles</a></li>
                        <li><a href="../facturasDetallesClientes/index.php">Todas las facturas</a></li>
                        <li><a href="../login/phplogout.php">Logout</a></li>
                    </ul>
                </nav>
                <div class="separador"></div>
            </div>
    </header>
      <div class="cajaEditar cajaAdmin">
       <form action="phpedit.php" method="POST">
           <input type="hidden" name="id_cliente" value="<?php echo $clientes->getId_cliente()?>" /><br />
            <span class="labels">Usuario<sup>*</sup></span><input type="text" name="usuario" value="<?php echo $clientes->getUsuario();?>"/><br />
            <span class="labels">Password<sup>*</sup> </span><input required  type="text" name="password" value="<?php echo $clientes->getPassword();?>" /><br />
            <span class="labels">Nombre<sup>*</sup></span><input type="text" name="nombre" value="<?php echo $clientes->getNombre();?>"/><br />
            <span class="labels">Apellidos<sup>*</sup> </span><input required  type="text" name="apellidos" value="<?php echo $clientes->getApellidos();?>" /><br />
            <span class="labels">Direccion<sup>*</sup> </span><input required  type="text" name="direccion" value="<?php echo $clientes->getDireccion();?>" /><br />
            <span class="labels">Fnacimiento<sup>*</sup></span> <input required  type="text" name="fechaNacimiento" value="<?php echo $clientes->getFechaNacimiento();?>" /><br />
            <span class="labels">Telefono<sup>*</sup></span><input required  type="text" name="telefono" value="<?php echo $clientes->getTelefono();?>" /><br />
            <span class="labels">Email<sup>*</sup> </span><input required  type="text" name="email" value="<?php echo $clientes->getEmail();?>" /><br />
            <input type="hidden" name="pkID" value="<?php echo $clientes->getId_cliente();?>" /><br/>
            <input class="botonEditar" type="submit" value="insertar"/>
        <div>
        </form>
    </body>
</html>
<?php
$bd->close();