<?php
function exportProductosToJson($db){
    $stmt = $db->query('SELECT * FROM productos');
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Convertir los datos a formato JSON con la opción JSON_PRETTY_PRINT
    $json = json_encode($productos, JSON_PRETTY_PRINT);

    // Guardar los datos en un archivo JSON
    file_put_contents('../json/productos.json', $json);
}

function productosRepetidos($db,$buscar){
    $stmt = $db->prepare("SELECT COUNT(nombre) as count FROM productos WHERE nombre = :buscar");
    $stmt->bindParam(':buscar', $buscar, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch();

    if ($row['count']==0){
        return false;
    }else{
        return true;
    }
}

//Conexión a la base de datos
$db = new PDO("mysql:host=localhost;dbname=materiaprima", "admin", "admin");
$idIni = $_GET['id'];
$query = "select * from productos where id='$idIni'";
$consulta=$db->query($query);
$datosIni=$consulta->fetch(PDO::FETCH_ASSOC);

$productoIni=$datosIni['nombre'];


if(isset($_POST['submit'])) {
  //Obtener los datos del formulario
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $cantidad = $_POST['cantidad'];
  $descripcion = $_POST['descripcion'];
  $fabricante = $_POST['fabricante'];
  $fecha_elaboracion = $_POST['fecha_elaboracion'];

  if ($productoIni==$nombre){
      $query = "UPDATE productos SET cantidad='$cantidad', proveedor='$fabricante', fecha_elaboracion='$fecha_elaboracion' WHERE id='$id'";
      $db->exec($query);
  }else{
      if (!(productosRepetidos($db,$nombre))){
          $query = "UPDATE productos SET nombre='$nombre', cantidad='$cantidad', proveedor='$fabricante', fecha_elaboracion='$fecha_elaboracion' WHERE id='$id'";
          $db->exec($query);
      }
  }
  //Actualizar los datos en la base de datos

  exportProductosToJson($db);
  //Redirigir al usuario a la página principal
  header("Location: ../php/obtenerTabla.php");
}

if(isset($_GET['id'])) {
  $id = $_GET['id'];

  //Consulta para obtener el producto a editar
  $query = "SELECT * FROM productos WHERE id='$id'";
  $result = $db->query($query);
  $row = $result->fetch(PDO::FETCH_ASSOC);

}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Editar producto</title>
    <link rel="stylesheet" href="../css/estilo1.css">
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Editar producto</h2>
    <form method="POST">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <label>Nombre:</label>
      <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>"><br>
      <label>Cantidad:</label>
      <input type="number" name="cantidad" value="<?php echo $row['cantidad']; ?>"><br>

        <div class="row">
            <div class="col-md-4">
                <label for="direccion">Fabricante</label>
                <select name="fabricante" id="fabricante">
                    <option value=""><?php echo $row['empresa']; ?></option>
                </select>
            </div>
        </div>
      <label>Fecha de elaboracion:</label>
      <input type="date" name="fecha_elaboracion" value="<?php echo $row['fecha_elaboracion']; ?>"><br>
      <input type="submit" name="submit" value="Guardar cambios">
    </form>
  </body>
  <script src="../js/utils.js"></script>
</html>
