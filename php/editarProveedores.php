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

$db = new PDO("mysql:host=localhost;dbname=materiaprima", "admin", "admin");
$idIni = $_GET['id'];
$query = "select * from proveedores where id='$idIni'";
$consulta=$db->query($query);
$datosIni=$consulta->fetch(PDO::FETCH_ASSOC);

$empresaIni=$datosIni['empresa'];

if(isset($_POST['submit'])) {
      $id = $_POST['id'];
      $empresa = $_POST['empresa'];
      $nombre = $_POST['nombre'];
      $direccion = $_POST['direccion'];
      $telefono = $_POST['telefono'];
      $correo = $_POST['correo'];
      $ruc = $_POST['ruc'];

      if ($empresaIni==$empresa){
          $query = "UPDATE proveedores SET nombre='$nombre', direccion='$direccion', telefono='$telefono', correo='$correo', ruc='$ruc' WHERE id='$id'";
          $db->exec($query);
      }else{
          if (!(repetidos($db,$empresa))){
              $query = "UPDATE proveedores SET empresa='$empresa', nombre='$nombre', direccion='$direccion', telefono='$telefono', correo='$correo', ruc='$ruc' WHERE id='$id'";
              $db->exec($query);
          }

      }


      exportProveedoresToJson($db);
      header("Location: ../php/modificar_p.php");
}

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM proveedores WHERE id='$id'";
  $result = $db->query($query);
  $row = $result->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Editar Proveedor</title>
    <link rel="stylesheet" href="../css/estilo1.css">
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Editar producto</h2>
    <form method="POST">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <label>Empresa:</label>
      <input type="text" name="empresa" value="<?php echo $row['empresa']; ?>"><br>
      <label>Nombre:</label>
      <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>"><br>
      <label>Direccion:</label>
      <input type="text" name="direccion" value="<?php echo $row['direccion']; ?>"><br>
      <label>Telefono:</label>
      <input type="number" name="telefono" value="<?php echo $row['telefono']; ?>"><br>
      <label>Correo:</label>
      <input type="mail" name="correo" pattern="^[^@]+@[^@]+\.[^@.]+$" value="<?php echo $row['correo']; ?>"><br>
      <label>RUC:</label>
      <input type="text" name="ruc" value="<?php echo $row['ruc']; ?>"><br>
      <input type="submit" name="submit" value="Guardar cambios">
    </form>
  </body>
</html>
