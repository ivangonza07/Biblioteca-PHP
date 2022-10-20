<?php 
//datubasearekin konexioa ein eta select batekin prduktuak erakusteko esaten diogu
session_start();

include("DBconexioa.php");

$sql="SELECT Id, Izena, Kantitatea, Mota, Irudia, Azalpena FROM produktuak";

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

<h1 class="izenburua"> Erabiltzailea </h1>


<?php 
//select batekin produktuen informazioa atera baino id -engatik
include("DBconexioa.php");

$izena = $_POST["izena"];

$sql="SELECT Id, Izena, Abizena, Pasahitza, Nan, Telefonoa, Helbidea, Mota FROM erabiltzaileak where Izena='$izena'";

$result = $conn->query($sql);


while ($row=$result->fetch_assoc())  { 

 ?>


<article>


<table id="taula"> 
  	<tr>
  		<td>
		<form action= "erabiltzaile_editatu.php" method="POST">
				<label>ID -a: </label>
					<input type="text" name="id" value=<?php echo $row['Id'];?> readonly><br><br>
				<label>Izena: </label>
					<input type="text" name="izena" value=<?php echo $row['Izena'];?> ><br><br>
				<label>Abizena: </label>
					<input type="text" name="Abizena" value=<?php echo $row['Abizena'];?> ><br><br>
				<label>Pasahitza: </label>
					<input type="password" name="Pasahitza" value=<?php echo $row['Pasahitza'];?> ><br><br>
				<label>NAN: </label>
					<input type="text" name="NAN" value=<?php echo $row['Nan'];?> ><br><br>
				<label>Telefonoa: </label>
					<input type="text" name="Telefonoa" value=<?php echo $row['Telefonoa'];?> ><br><br>
				<label>Helbidea: </label>
					<input type="text" name="Helbidea" value=<?php echo $row['Helbidea'];?> ><br><br>
				<label>Mota: </label>
					<input type="text" name="mota" value=<?php echo $row['Mota'];?> readonly><br><br>
           	 <input type="submit" value="Erbiltzailea aldatu"/>
		</form>
		</td>
	</tr>
</table>

<?php } $conn->close(); ?>

</article>

<div id="bukaera">
<p> -Egilea: Ivan Gonzalez / Telegonoa: 943256487 / TWITTER= @inbentarioaivan / Eskerrikasko gure dendan erosteagatik!!  </p>
</div>

</body>
</html>