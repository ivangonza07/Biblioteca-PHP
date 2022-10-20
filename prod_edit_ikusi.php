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
	

<h1 class="izenburua"> Produktua </h1>

<?php 
//select batekin produktuen informazioa atera baino id -engatik
include("DBconexioa.php");

$id = $_POST["id"];

$sql="SELECT Id, Izena, Kantitatea, Mota, Irudia, Azalpena FROM produktuak where Id=$id"; 

$result = $conn->query($sql);

while ($row=$result->fetch_assoc())  { 

 ?>


<table id="taula">
<tr>
    
	<td><?php echo "<img src='./IRUDIAK/" . $row['Irudia'] . "' width='250' ></img>"; ?></td>
	<td><form action= "produktu_editatu.php" method="POST">
				<label>ID -a: </label>
					<input type="text" name="id" value=<?php echo $row['Id'];?> readonly><br><br>
				<label>Izena: </label>
					<textarea cols="40" name="izena" spellcheck="true"><?php echo $row['Izena'];?></textarea><br><br>
				<label>Kantitatea: </label>
					<input type="number" min="1" name="kantitatea" value = <?php echo $row['Kantitatea'];?> /><br><br>
				<label>Mota: </label>
					<select name="mota">
						<option>berrerabilgarria</option>
						<option>aldi-bat</option>
					</select><br><br>
				<label>Argazkiaren izena: </label>
					<input type="text" name="argazkia" value = <?php echo $row['Irudia'];?> /><br><br>
				<label>Azalpena: </label>
					<textarea cols="40" name="azalpena" spellcheck="true"><?php echo $row['Azalpena'];?></textarea><br><br>
           	 <input type="submit" value="Produktua aldatu"/>
		</form>
	</td>
</tr>

</table>

<?php } $conn->close(); ?>

</article>

<div id="bukaera">
<p> -Izena: Ivan Gonzalez / Telegonoa: 943256487 / Email= ivangonzalez@gmail.com / Eskerrikasko web orria bisitatzeagatik  </p>
</div>

</body>
</html>
}