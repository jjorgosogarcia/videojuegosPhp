<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestorCountry = new ManageGame($bd);
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
        <div id="cajaInsertar" class="cajaAdmin">
        <form action="phpinsert.php" method="POST" enctype="multipart/form-data">
            <span class="labels">Caratula</span><input type="file" name="caratula" value="" /><br />
            <span class="labels">Nombre<sup>*</sup></span><input required  type="text" name="nombre" value="" /><br />
            <span class="labels">Genero<sup>*</sup></span> <input required  list="generos" name="genero" value="" /><br />
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
            <span class="labels">Descripcion<sup>*</sup></span> <textarea required name="descripcion"></textarea><br />
            <span class="labels">Plataforma<sup>*</sup></span> <input required  list="plataforma" name="plataforma" value="" /><br />
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
            <span class="labels">Precio<sup>*</sup></span> <input required  type="text" name="precio" value="" /><br />
            <span class="labels">Stock<sup>*</sup></span> <input required  type="text" name="stock" value="" /><br />
            <input class="botonEditar" type="submit" value="insertar"/>
        </form>
        </div>
    </body>
</html>
<?php
$bd->close();