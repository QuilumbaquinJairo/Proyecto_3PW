<?php
function exportProveedoresToJson($db){
    $stmt = $db->query('SELECT * FROM proveedores');
    $proveedores = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($proveedores, JSON_PRETTY_PRINT);

    file_put_contents('../json/proveedores.json', $json);
}
function repetidos($db,$buscar){
    $stmt = $db->prepare("SELECT COUNT(empresa) as count FROM proveedores WHERE empresa = :buscar");
    $stmt->bindParam(':buscar', $buscar, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch();

    if ($row['count']==0){
        return false;
    }else{
        return true;
    }
}

try {

  $db = new PDO("mysql:host=localhost;dbname=materiaprima", "admin", "admin");
  $empresa=$_POST['empresa'];

  if (!(repetidos($db,$empresa))) {

    $stmt = $db->prepare('INSERT INTO proveedores (empresa, nombre, direccion, telefono, correo, ruc) VALUES (:empresa, :nombre, :direccion, :telefono, :correo, :ruc)');

      $stmt->bindParam(':empresa', $_POST['empresa']);
      $stmt->bindParam(':nombre', $_POST['nombre']);
      $stmt->bindParam(':direccion', $_POST['direccion']);
      $stmt->bindParam(':telefono', $_POST['telefono']);
      $stmt->bindParam(':correo', $_POST['correo']);
      $stmt->bindParam(':ruc', $_POST['ruc']);

      $stmt->execute();
      exportProveedoresToJson($db);
  }

  $db = null;
  header('Location: ../html/verproveedores.html');

} catch (PDOException $e) {

  echo "Error al conectar a la base de datos: " . $e->getMessage();
}

?>
