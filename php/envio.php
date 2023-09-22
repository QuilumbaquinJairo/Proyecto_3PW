<?php
function exportProductosToJson($db){
  $stmt = $db->query('SELECT * FROM productos');
  $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Convertir los datos a formato JSON con la opción JSON_PRETTY_PRINT
  $json = json_encode($productos, JSON_PRETTY_PRINT);

  // Guardar los datos en un archivo JSON
  file_put_contents('../json/productos.json', $json);
  header('Location: ../html/productos.html');
}

try {
  // Conexión a la base de datos utilizando PDO
  $db = new PDO("mysql:host=localhost;dbname=materiaprima", "admin", "admin");
  // Asumiendo que estás recibiendo los datos a través de un formulario POST
  $nombre = $_POST['nombre'];
  $cantidad = $_POST['cantidad'];
  $descripcion = $_POST['descripcion'];
  $fabricante = $_POST['fabricante'];
  $fecha_elaboracion = $_POST['fecha_elaboracion'];
  $unidad = $_POST['unidades'];

  $stmt = $db->prepare("SELECT COUNT(nombre) as count FROM productos WHERE nombre = :nombre");
  $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
  $stmt->execute();

  $row = $stmt->fetch();

  if ($row['count'] == 0) {
    // Insertar el dato ya que no existe
    $stmt = $db->prepare("INSERT INTO productos (nombre, cantidad, descripcion, proveedor, fecha_elaboracion, unidad) VALUES (:nombre, :cantidad, :descripcion, :fabricante, :fecha_elaboracion, :unidad)");

    // Vinculando parámetros
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
    $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    $stmt->bindParam(':fabricante', $fabricante, PDO::PARAM_STR);
    $stmt->bindParam(':fecha_elaboracion', $fecha_elaboracion, PDO::PARAM_STR);
    $stmt->bindParam(':unidad', $unidad, PDO::PARAM_STR);

    $stmt->execute();

  }


  exportProductosToJson($db);
  $db = null;

  // Redireccionar al usuario a una página de éxito
  header('Location: ../html/mPrima.html');
} catch (PDOException $e) {
  // Mostrar un mensaje de error si hay un problema con la conexión a la base de datos
  echo "<script>alert('Error al conectar a la base de datos') </script>" ;
}


?>
