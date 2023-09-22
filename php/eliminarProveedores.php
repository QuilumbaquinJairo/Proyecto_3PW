<?php
function exportProveedoresToJson($db){
  $stmt = $db->query('SELECT * FROM proveedores');
  $proveedores = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $json = json_encode($proveedores, JSON_PRETTY_PRINT);

  file_put_contents('../json/proveedores.json', $json);

}


$db = new PDO("mysql:host=localhost;dbname=materiaprima", "admin", "admin");

if(isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = "DELETE FROM proveedores WHERE id='$id'";
  $db->exec($query);

  exportProveedoresToJson($db);
  header("Location: ../php/modificar_p.php");
}
?>
