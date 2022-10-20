<?php 

include("DBconexioa.php");

session_start();


$erabid = $_SESSION["erabid"];
$data_hasiera = date("Y-m-d");
$data_bukaera = date("2020-08-22");



$sql_eskaerakikusi = "SELECT Id, Kantitatea, Mota, erabiltzaileak_Id, prod_Id FROM eskaera WHERE erabiltzaileak_Id=$erabid;";

$result_eskaerakikusi = $conn->query($sql_eskaerakikusi);


if ($result_eskaerakikusi->num_rows > 0)
{
	while ($row=$result_eskaerakikusi->fetch_assoc())
	{
		$sql_insertinto_historiala = "INSERT INTO eskaera_historiala (Mota, kantitatea, Data_hasiera, Data_bukaera, eskaera_Id, produktuak_Id, erabiltzaileak_Id) VALUES ('$row[Mota]', '$row[Kantitatea]', '$data_hasiera', '$data_bukaera', '$row[Id]', '$row[prod_Id]', '$row[erabiltzaileak_Id]');";

		$result_insertinto_historiala = $conn->query($sql_insertinto_historiala);

		//echo $sql_insertinto_historiala;
	}
}


//index.php orrira joateko
header('location: index.php');

 ?>