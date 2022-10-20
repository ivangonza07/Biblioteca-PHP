<?php 

include("DBconexioa.php");


session_start();

//orgatxora gehituko dira guk nahi ditugun produktuak

$id=$_POST["id"];
$erabid = $_SESSION["erabid"];
$kantitatea=$_POST["kantitatea"];

echo $id;
echo $erabid;
echo $kantitatea;


$sql="SELECT Id, Izena, Kantitatea, Mota, Irudia, Azalpena FROM produktuak WHERE Id = $id";


$result = $conn->query($sql);


echo $sql;

	if ($result->num_rows > 0)
	{
		
		$row = $result->fetch_assoc();

		$sql_orgatxora_gehitu = "INSERT INTO orgatxoa (Izena, orgatxo_Kantitatea, Mota, erabiltzaileak_id, prod_Id)
		VALUES ('$row[Izena]', $kantitatea, '$row[Mota]', $erabid, $id)";

		$result_insert_into = $conn->query($sql_orgatxora_gehitu);

	}
	else
	{
		echo "0 results";
	}

//echo $sql;
//echo $sql_orgatxora_gehitu;




header('location: index.php');

 ?>