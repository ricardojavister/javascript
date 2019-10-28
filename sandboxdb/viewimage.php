<?php
//header('Content-type: image/jpeg');
include("conexion.php");
$sql = mysqli_query($con, "SELECT image, idvocabulary FROM vocabulary where idvocabulary=" . $_GET['id']);
while($row = mysqli_fetch_array($sql)){
	//echo $row['image'];
	echo $row['idvocabulary'];
}
?>