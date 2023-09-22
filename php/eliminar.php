<?php
function exportProductosToJson($db){
  $stmt = $db->query('SELECT * FROM productos');
  $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Convertir los datos a formato JSON con la opción JSON_PRETTY_PRINT
  $json = json_encode($productos, JSON_PRETTY_PRINT);

  // Guardar los datos en un archivo JSON
  file_put_contents('../json/productos.json', $json);
}

$db = new PDO("mysql:host=localhost;dbname=materiaprima", "admin", "admin");

if(isset($_GET['id'])) {
  $id = $_GET['id'];

  //Consulta para eliminar el producto de la base de datos
  $query = "DELETE FROM productos WHERE id='$id'";
  $db->exec($query);
  exportProductosToJson($db);

  //Redirigir al usuario a la página principal
  header("Location: ../php/obtenerTabla.php");
}
?>
