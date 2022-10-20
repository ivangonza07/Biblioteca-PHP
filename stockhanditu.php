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
	

<?php 

include("DBconexioa.php");

//orgatxora gehituko dira guk nahi ditugun produktuak

$id = $_GET["id"];

$sql_produktuak="SELECT Id, Izena, Kantitatea, Mota, Irudia, Azalpena FROM produktuak where Id=$id";

$result_produktuak = $conn->query($sql_produktuak);

while ($row=$result_produktuak->fetch_assoc()) 
{ //$row erantzun bat ematen badigu... ?>
	<!-- taula batean produkten informazio guztia pantailaratuko dugu -->
		
		<table id="taula"> 
  			<tr>
    			<td><?php echo "<img src='./IRUDIAK/" . $row['Irudia'] . "' width='250' ></img>"; ?></td>
    			<td><?php echo "<u>" . $row['Izena'];?></td>
    			<td><?php echo "Kantitatea: " . $row['Kantitatea'];?></td>
    			<td><form action="stockactualizatu.php" method="post">
        				Kantitatea: <input type="number" min="1" max="5" name="kantitatea"/>
						<input type="submit" value="Gehitu"/>
						<input type="hidden" name="id" value="<?=$row['Id']?>"/>
					</form>
				</td>
			</tr>	
		</table>
	<!-- konexioa bukatzeko -->
	<?php } $conn->close(); ?>

</article>

<div id="bukaera">
<p> -Izena: Ivan Gonzalez / Telegonoa: 943256487 / Email= ivangonzalez@gmail.com / Eskerrikasko web orria bisitatzeagatik  </p>
</div>

</body>
</html>
