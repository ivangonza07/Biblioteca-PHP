<?php

include("DBconexioa.php");

//insert intu batekin guk sartuko dugun informazioa erabiltzailek taulara joango dira
$sql = "INSERT INTO erabiltzaileak (Izena, Abizena, Pasahitza, Nan, Telefonoa, Helbidea, Mota)
		VALUES ('$_POST[izena]', '$_POST[abizena]', '$_POST[pasahitza]', '$_POST[nan]', '$_POST[telefonoa]', '$_POST[helbidea]', 'bezeroa')";

$result = $conn->query($sql);

echo "logeatu egin zara <br>" ;

mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<div id="register">
		<form action= "./login.php" method="GET"><br><br>
            <input type="submit" value="Logeatu"/>
		</form>
	</div>