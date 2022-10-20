<?php 

include("DBconexioa.php");

$id = $_POST[id];

$sql = "UPDATE erabiltzaileak SET id = '$_POST[id]', izena = '$_POST[izena]', Abizena = '$_POST[Abizena]', Pasahitza = '$_POST[Pasahitza]', NAN = '$_POST[NAN]', Telefonoa = '$_POST[Telefonoa]', Helbidea = '$_POST[Helbidea]', Mota = '$_POST[mota]' WHERE id = $id";

$result = $conn->query($sql);

mysqli_close($conn);

header('location: index.php');

 ?>