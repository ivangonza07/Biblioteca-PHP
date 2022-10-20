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
	

<h1 class="izenburua"> PRODUKTUAK </h1>

<article>

	<?php while ($row=$result->fetch_assoc()) { //$row erantzun bat ematen badigu... ?>
	<!-- taula batean produkten informazio guztia pantailaratuko dugu -->
		
		<table id="taula"> 
  			<tr>
    			<td><?php echo "<img src='./IRUDIAK/" . $row['Irudia'] . "' width='250' ></img>"; ?></td>
    			<td><?php echo "<u>" . $row['Izena'] . "</u>" . "<br><br>" . $row['Azalpena'] . "<br>" . "<a href='infoprod.php?id=".$row['Id']."'>informazio gehiago</a>"; ?></td>
    			<td><form action="prod_edit_ikusi.php" method="post">
						<input type="submit" value="Editatu"/>
						<input type="hidden" name="id" value="<?=$row["Id"]?>"/>
					</form>
				</td>
				<td><form action="produktu_kendu.php" method="post">
						<input type="submit" value="Borratu"/>
						<input type="hidden" name="id" value="<?=$row["Id"]?>"/>
					</form>
				</td>
  			</tr>

		</table>
	<!-- konexioa bukatzeko -->
	<?php } $conn->close(); ?>

<table id="taula"> 
<tr>
<td><div id="register">

		<h1>Produktu berri bat sartu</h1>
			<form action= "produktu_gehitu.php" method="POST">
				<label>Izena: </label>
					<input type="text" name="izena"/><br><br>
				<label>Kantitatea: </label>
					<input type="text" name="kantitatea"/><br><br>
				<label>Mota: </label>
					<select name="mota">
						<option>berrerabilgarria</option>
						<option>aldi-bat</option>
					</select><br><br>
				<label>Argazkiaren izena: </label>
					<input type="text" name="argazkia"/><br><br>
				<label>Azalpena: </label>
					<input type="text" name="azalpena"/><br><br>
           	 <input type="submit" value="Produktua sartu"/>
			</form>
	</div>
</td>
</tr>
</table>
</article>

<div id="bukaera">
<p> -Egilea: Ivan Gonzalez / Telegonoa: 943256487 / TWITTER= @inbentarioaivan / Eskerrikasko gure dendan erosteagatik!!  </p>
</div>

</body>
</html>

