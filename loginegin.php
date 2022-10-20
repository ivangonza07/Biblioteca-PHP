<!DOCTYPE html>
<html>
	<body>

		<?php

		include("DBconexioa.php");


		$izena = $_POST['erabiltzailea'];
		$pasahitza = $_POST['pasahitza'];


		$sql="SELECT Id, Izena, Pasahitza, Mota FROM erabiltzaileak WHERE Izena ='$izena' AND Pasahitza='$pasahitza'";

		$result = $conn->query($sql);
		//por cada erabiltzaile 1 resultau

		$url="index.php";


		if ($result->num_rows > 0)
		{
			session_start();

			$row = $result->fetch_assoc();

			//aldagaiak zehaztu

			$_SESSION["erabiltzaile"] = $izena;
			$_SESSION["erabid"] = $row["Id"];
			$_SESSION["sesioaHasita"] = true; 
			$_SESSION["mota"] = $row["Mota"];

			//admin bazea... egin...

			if($row['Mota'] == 'admin') {
				header("Location: index.php");
			} 
			else {
				header("Location: $url");
			}

		}	
		else
		{

			echo "ez dago ondo" . ' <br><br> ' . ' <form action= "login.php" method="POST">
					<input type="submit" value="Atzera"/>
				</form>';


		}	



		?>

	</body>
</html>