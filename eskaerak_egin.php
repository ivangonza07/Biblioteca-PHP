<?php 

include("DBconexioa.php");

session_start();


$erabid = $_SESSION["erabid"];
$data_hasiera = date("Y-m-d");
$data_bukaera = date("2020-8-22");

//insert intu eginez orgatxoa daudena eskaerak taulara pasatuko dira

$sql="SELECT Id, Izena, orgatxo_Kantitatea, Mota, erabiltzaileak_Id, prod_Id FROM orgatxoa where erabiltzaileak_Id = $erabid;";

$result = $conn->query($sql);

//echo $sql;



if ($result->num_rows > 0)
{
		while ($row=$result->fetch_assoc())
		{

			if($row['Mota'] == "berrerabilgarria")
			{

				$sql_kontatueskaerak = "SELECT * FROM eskaera;";

				$result_kontatueskaerak = $conn->query($sql_kontatueskaerak);

				$sql_kontatuorgatxoa = "SELECT * FROM orgatxoa;";

				$result_kontatuorgatxoa = $conn->query($sql_kontatuorgatxoa);

				//echo $sql_kontatueskaerak;
				if ($result_kontatuorgatxoa->num_rows <= 2)
				{
					if ($result_kontatueskaerak->num_rows < 2 )
					{

						$sql_insertinto = "INSERT INTO eskaera (Izena, Kantitatea, Mota, erabiltzaileak_Id, prod_Id) SELECT Izena, orgatxo_Kantitatea, Mota, erabiltzaileak_Id, prod_id FROM orgatxoa WHERE erabiltzaileak_Id=$erabid and Mota = '$row[Mota]' and prod_Id = $row[prod_Id];";

						$result_insertinto = $conn->query($sql_insertinto);

						//echo $sql_insertinto;

						$sql_insertinto_historiala = "INSERT INTO eskaera_historiala (Izena, Mota, kantitatea, Data_hasiera, Data_bukaera, eskaera_Id, produktuak_Id, erabiltzaileak_Id) VALUES ('$row[Izena]','$row[Mota]', $row[orgatxo_Kantitatea], '$data_hasiera', '$data_bukaera', $row[Id], $row[prod_Id], $erabid);";

						$result_insertinto_historiala = $conn->query($sql_insertinto_historiala);

						//echo $sql_insertinto_historiala;

						header('location: index.php');
					}
					else
					{
						echo "Ezin duzu 2 produktu berrebilgarri baino gehiago eskatu" . ' <br><br> ' . ' <form action= "eskaerak.php" method="POST">
							<input type="submit" value="Atzera"/>
							</form>';
							break;
					}
				}
				else
				{
					echo "Ezin duzu 2 produktu berrebilgarri baino gehiago eskatu" . ' <br><br> ' . ' <form action= "eskaerak.php" method="POST">
							<input type="submit" value="Atzera"/>
							</form>';
							break;
				}

				$sql_orgatxokendu = "DELETE FROM orgatxoa WHERE erabiltzaileak_Id=$erabid and Mota = '$row[Mota]' and prod_Id = $row[prod_Id];";

				$result_delete = $conn->query($sql_orgatxokendu);

				echo $sql_orgatxokendu;				
			}
			else
			{
				$sql_produktuak="SELECT produktuak.Id, produktuak.Izena, produktuak.Kantitatea, produktuak.Mota, produktuak.Irudia, produktuak.Azalpena, orgatxoa.prod_Id, orgatxoa.orgatxo_Kantitatea FROM produktuak inner join orgatxoa on produktuak.Id = orgatxoa.prod_Id;";

				$result_produktuak = $conn->query($sql_produktuak);

				//echo $sql_produktuak;

				$sql_kontatuorgatxoa = "SELECT * FROM orgatxoa;";

				$result_kontatuorgatxoa = $conn->query($sql_kontatuorgatxoa);

				//echo $sql_kontatuorgatxoa

				if ($result_produktuak->num_rows > 0)
				{
				
					$row = $result_produktuak->fetch_assoc();

					$emaitza = $row["Kantitatea"] - $row["orgatxo_Kantitatea"];

					//echo $emaitza;

					if ($emaitza >= 0)
					{

					$sql_produktuak_aktualizatu = "UPDATE produktuak SET id = '$row[Id]', Izena = '$row[Izena]', Kantitatea = '$emaitza', Mota = '$row[Mota]', Irudia = '$row[Irudia]', Azalpena = '$row[Azalpena]'
						WHERE id = '$row[Id]' and Mota = '$row[Mota]' ;";   

					$result_produktuak_aktualizatu = $conn->query($sql_produktuak_aktualizatu);

					//echo $sql_produktuak_aktualizatu;

					$sql_insertinto_historiala2 = "INSERT INTO eskaera_historiala (Izena, Mota, kantitatea, Data_hasiera, Data_bukaera, eskaera_Id, produktuak_Id, erabiltzaileak_Id) VALUES ('$row[Izena]','$row[Mota]', $row[orgatxo_Kantitatea], '$data_hasiera', '$data_bukaera', $row[Id], $row[prod_Id], $erabid);";

					$result_insertinto_historiala2 = $conn->query($sql_insertinto_historiala2);

					//echo $sql_insertinto_historiala2;

					header('location: index.php');
					}
					else
					{
						echo "Ez daude nahiko liburu" . ' <br><br> ' . ' <form action= "eskaerak.php" method="POST">
							<input type="submit" value="Atzera"/>
							</form>';
							break;
					}
				}
				
				$sql_orgatxokendu = "DELETE FROM orgatxoa WHERE erabiltzaileak_Id=$erabid and Mota = '$row[Mota]' and prod_Id = $row[prod_Id];";

				$result_delete = $conn->query($sql_orgatxokendu);

				//echo $sql_orgatxokendu;

			}

		}

}
else
{
	echo "0 results";
}



 ?>