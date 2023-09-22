<?php

function exportProductosToJson($db){

  $stmt = $db->query('SELECT * FROM ficha');
  $ficha = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Convertir los datos a formato JSON con la opción JSON_PRETTY_PRINT
  $json = json_encode($ficha, JSON_PRETTY_PRINT);

  // Guardar los datos en un archivo JSON
  file_put_contents('../json/ficha.json', $json);
  header('Location: ../html/ficha.html');
}

try {

  $db = new PDO("mysql:host=localhost;dbname=materiaprima", "admin", "admin");
  $nombre = $_POST['nombre'];
  $cantidad= $_POST['cantidad'];
  $tipo = $_POST['tipo'];
  $fechain = $_POST['fechain'];

  $stmt = $db->prepare("SELECT COUNT(nombre) as count FROM ficha WHERE nombre = :nombre");
  $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
  $stmt->execute();

  $row = $stmt->fetch();

  if ($row['count'] == 0) {
    // Insertar el dato ya que no existe
    $stmt = $db->prepare("INSERT INTO ficha (nombre, cantidad, tipo,fechain) VALUES (:nombre, :cantidad, :tipo,:fechain)");

    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
    $stmt->bindParam(':fechain', $fechain, PDO::PARAM_STR);
    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
 

    $stmt->execute();

  } else {
    // Enviar una alerta ya que el dato ya existe
    echo "<script>alert('El producto ya existe en la base de datos!');</script>";
  }


  exportProductosToJson($db);
  $db = null;

  // Redireccionar al usuario a una página de éxito
  header('Location: ../html/ficha.html');
} catch (PDOException $e) {
  // Mostrar un mensaje de error si hay un problema con la conexión a la base de datos
  echo "<script>alert('Error al conectar a la base de datos') </script>" ;
}


?>
