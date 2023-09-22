<?php
try {

  $db = new PDO("mysql:host=localhost;dbname=materiaprima", "admin", "admin");
  $stmt = $db->prepare('INSERT INTO ordenes (producto, cantidad) VALUES (:producto, :cantidad)');

  $stmt->bindParam(':producto', $_POST['producto']);
  $stmt->bindParam(':cantidad', $_POST['cantidad']);

  $stmt->execute();
  $db = null;
  header('Location: ../html/recetas.html');

} catch (PDOException $e) {
  // Mostrar un mensaje de error si hay un problema con la conexión a la base de datos
  echo "Error al conectar a la base de datos: " . $e->getMessage();
}
?>
