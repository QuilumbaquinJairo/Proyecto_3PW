<?php
//Conexión a la base de datos
$db = new PDO("mysql:host=localhost;dbname=materiaprima", "admin", "admin");

if(isset($_POST['submit'])) {
    //Obtener los datos del formulario
    $id = $_POST['id'];
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];

    //Actualizar los datos en la base de datos
    $query = "UPDATE ordenes SET producto='$producto', cantidad='$cantidad' WHERE id='$id'";
    $db->exec($query);

    //Redirigir al usuario a la página principal
    header("Location: ../php/oProduccion.php");
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    //Consulta para obtener el producto a editar
    $query = "SELECT * FROM ordenes WHERE id='$id'";
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
    <label>Codigo:</label>
    <input type="text" name="producto" value="<?php echo $row['producto']; ?>"><br>
    <label>Cantidad:</label>
    <input type="text" name="cantidad" value="<?php echo $row['cantidad']; ?>"><br>
    <input type="submit" name="submit" value="Guardar cambios">
</form>
</body>
</html>
