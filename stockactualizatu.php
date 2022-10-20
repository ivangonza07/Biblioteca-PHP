<?php 

include("DBconexioa.php");


session_start();

//orgatxora gehituko dira guk nahi ditugun produktuak

$id=$_POST["id"];
$kantitatea=$_POST["kantitatea"];

$sql_produktuak="SELECT Id, Izena, Kantitatea, Mota, Irudia, Azalpena FROM produktuak WHERE Id = $id";

$result_produktuak = $conn->query($sql_produktuak);

echo $sql_produktuak;

	if ($result_produktuak->num_rows > 0)
	{
				
		$row = $result_produktuak->fetch_assoc();

		$sql_produktuak_aktualizatu = "UPDATE produktuak SET id = '$row[Id]', Izena = '$row[Izena]', Kantitatea = '$kantitatea' + '$row[Kantitatea]', Mota = '$row[Mota]', Irudia = '$row[Irudia]', Azalpena = '$row[Azalpena]'
			WHERE id = '$id';";   

		$result_produktuak_aktualizatu = $conn->query($sql_produktuak_aktualizatu);

		//echo $sql_produktuak_aktualizatu;
	}

//index.php orrira joateko
header('location: index.php');

?>