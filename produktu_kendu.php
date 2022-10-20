<?php

include("DBconexioa.php");

$id=$_POST['id'];

$sql = "DELETE FROM produktuak WHERE id=$id";

$result = $conn->query($sql);

mysqli_close($conn);

header('location: index.php');

?>