
<?php

	include("DBconexioa.php");

	// Balioak lortu
	
	$id = $_GET["id"];
	
	$sql = "DELETE from orgatxoa
			where id='$id'";

	$emaitza=$conn->query($sql);

	// Ondo exekutatu bada -> Orgatxora joan
	//echo $sql ;
	header('Location: eskaerak.php');
	// Akatsa gertatu bada, ....


?>