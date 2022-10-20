<?php 

include("DBconexioa.php");


$id = $_POST[id];

$sql = "UPDATE produktuak SET id = '$_POST[id]', izena = '$_POST[izena]', kantitatea = '$_POST[kantitatea]', mota = '$_POST[mota]', irudia = '$_POST[argazkia]', azalpena = '$_POST[azalpena]' WHERE id = $id";

$result = $conn->query($sql);

//echo $sql;

mysqli_close($conn);

header('location: index.php');

?>