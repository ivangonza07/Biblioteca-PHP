<?php

include("DBconexioa.php");


$sql = "INSERT INTO produktuak (izena, kantitatea, mota, irudia, azalpena)
		VALUES ('$_POST[izena]', '$_POST[kantitatea]', '$_POST[mota]', '$_POST[argazkia]', '$_POST[azalpena]')";

$result = $conn->query($sql);

//echo $sql;

mysqli_close($conn);

header('location: index.php');

?>