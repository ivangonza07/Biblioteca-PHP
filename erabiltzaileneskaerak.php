<?php 
//datubasearekin konexioa ein eta select batekin prduktuak erakusteko esaten diogu
session_start();

include("DBconexioa.php");

$sql="SELECT Id, Izena, Kantitatea, Mota, Irudia, Prezioa, Azalpena FROM produktuak";

$result = $conn->query($sql);



 ?>

<!DOCTYPE html>
<html lang="eu">
<head>
<link rel="stylesheet" type="text/css" href="estilos.css">

<meta charset="utf-8"/>

<title>ivan gonzalez</title>
</head>

<body id="body">


<nav id="menu">
	<ul>
		<li><a href="index.php">SARRERA</a></li>
		<li><li><a href="produktuak.php">PRODUKTUAK</a></li>
		<li> <?php if ( isset($_SESSION["sesioaHasita"]) && $_SESSION["sesioaHasita"] == true && $_SESSION["mota"] == 'bezeroa')
					{
						echo '<a href="eskaerak.php"> ESKAERAK</a>';
					}
					if ( isset($_SESSION["sesioaHasita"]) && $_SESSION["sesioaHasita"] == true && $_SESSION["mota"] == 'admin')
					{
						echo '<a href="eskaerak_ikusi.php"> ESKAERAK</a>';
					}
				?>					
		</li>
		<li>  <?php if ( isset($_SESSION["sesioaHasita"]) && $_SESSION["mota"] == 'admin')
					{
						//sesioa asita badago eta admin mota bada urrengo errenkada agertzeko{administratu}
						echo "<a href='administrazioa.php'>Administratu</a>";
					}
				?>
		</li>
		<li><?php if ( isset($_SESSION["sesioaHasita"]) && $_SESSION["sesioaHasita"] == true && $_SESSION["mota"] == 'bezeroa')
					{
						echo '<a href="historiala.php"> HISTORIALA</a>';
					}
				?>
		</li>
		<li><?php if ( isset($_SESSION["sesioaHasita"]) && $_SESSION["sesioaHasita"] == true && $_SESSION["mota"] == 'admin')
					{
						echo '<a href="prod_edit.php"> Produktuak editatu</a>';
					}
				?>
		</li>
		<li><?php if ( isset($_SESSION["sesioaHasita"]) && $_SESSION["sesioaHasita"] == true && $_SESSION["mota"] == 'admin')
					{
						echo '<a href="stokeditatu.php"> Stock-a editatu</a>';
					}
				?>
		</li>
		
			<div id="erab">
			<?php

			#komprueba si eso tiene valor o no {el isset} y si la sesion esta iniciada sesioa itxi botoia, kaixo eta izena eta orgatxoa aterako zaigu. bestela izena eman eta sesioa asi botoiak

			if ( isset($_SESSION["sesioaHasita"]) && $_SESSION["sesioaHasita"] == true)
			{
				
				echo ' Kaixo, '. $_SESSION["erabiltzaile"] .'

				<form action= "logout.php" method="POST">
					<input type="submit" value="Saioa itxi"/>
				</form>';
			}

			else
			{
				echo '			<form action= "erregistroa.php" method="POST">
					<input type="submit" value="Izena eman"/>
				</form>';
				echo '			<form action= "login.php" method="POST">
					<input type="submit" value="Saioa hasi"/>
				</form>';
			}
			 ?>

			
	</ul>
</nav>

<?php 
//select batekin produktuen informazioa atera baino id -engatik
include("DBconexioa.php");

$id = $_POST["id"];

$sql="SELECT Id, Izena, Mota, kantitatea, Data_hasiera, Data_bukaera, eskaera_Id, produktuak_Id, erabiltzaileak_Id FROM eskaera_historiala WHERE erabiltzaileak_Id = $id;"; 

$result = $conn->query($sql);

?>

<table id="taula"> 
  			<tr>
				<th>Produktuaren Izena</th>
				<th>Kantitatea</th>
				<th>Mota</th>
				<th>Data hasiera</th>
				<th>Data Bukaera</th>
				<th>Erabiltzailearen ID-a</th>
			</tr>

			<?php while ($row=$result->fetch_assoc()) { //$row erantzun bat ematen badigu... ?>
			<!-- taula batean produkten informazio guztia pantailaratuko dugu -->

			<tr>
    			<td><?php echo $row['Izena']; ?></td>
    			<td><?php echo $row['kantitatea']; ?></td>
    			<td><?php echo $row['Mota']; ?></td>
    			<td><?php echo $row['Data_hasiera']; ?></td>
    			<td><?php echo $row['Data_bukaera']; ?></td>
    			<td><?php echo $row['erabiltzaileak_Id']; ?></td>	
  			</tr>
			<!-- konexioa bukatzeko -->
			<?php } $conn->close(); ?>
</table>

<table id="taula">
			<tr>
				<td><form action="eskaerak_ikusi.php">
						<input type="submit" value="Atzera"/>
					</form>
				</td>
			</tr>
	</table>

</article>

<div id="bukaera">
<p> -Izena: Ivan Gonzalez / Telegonoa: 943256487 / Email= ivangonzalez@gmail.com / Eskerrikasko web orria bisitatzeagatik  </p>
</div>

</body>
</html>

