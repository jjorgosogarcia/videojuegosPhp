<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageGame($bd);
$id = Request::get("ID");
$juegos = $gestor->get($id);
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
                    <li><a class="actual">Juegos</a></li>
                    <li><a href="../user/index.php">Usuarios</a></li>
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
        <form action="phpedit.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_juego" value="<?php echo $juegos->getId_juego()?>" /><br />
            <span class="labels">Caratula </span><input type="file" name="caratula" value="<?php echo $juegos->getCaratula();?>" /><br />
            <span class="labels">Nombre<sup>*</sup> </span><input required  type="text" name="nombre" value="<?php echo $juegos->getNombre();?>" /><br />
            <span class="labels">Genero<sup>*</sup></span><input required  list="generos" name="genero" value="<?php echo $juegos->getGenero();?>" /><br />
            <datalist id="generos">
                <option value="Aventuras" />
                <option value="Plataformas" />
                <option value="Accion" />
                <option value="Shooter" />
                <option value="Rpg" />
                <option value="Terror" />
                <option value="Aventura gráfica" />
                <option value="Plataformas" />
            </datalist>
            <span class="labels">Descripcion<sup>*</sup></span><textarea required name="descripcion"><?php echo $juegos->getDescripcion();?> </textarea><br />
            <span class="labels">Plataforma<sup>*</sup></span> <input required  list="plataforma" name="plataforma" value="<?php echo $juegos->getPlataforma();?>" /><br />
            <datalist id="plataforma">
                <option value="Ps4" />
                <option value="Xbox One" />
                <option value="Pc" />
                <option value="Wii U" />
                <option value="Ps3" />
                <option value="Xbox 360" />
                <option value="Nintendo 3ds" />
                <option value="PsVita" />
            </datalist>
            <span class="labels">Precio<sup>*</sup> </span><input required  type="text" name="precio" value="<?php echo $juegos->getPrecio();?>" /><br />
            <span class="labels">Stock<sup>*</sup> </span><input required  type="text" name="stock" value="<?php echo $juegos->getStock();?>" /><br />
            <input type="hidden" name="pkID" value="<?php echo $juegos->getId_juego(); ?>" /><br/>
            <input class="botonEditar" type="submit" value="edicion"/>
        </div>
        </form>
    </body>
</html>
<?php
$bd->close();