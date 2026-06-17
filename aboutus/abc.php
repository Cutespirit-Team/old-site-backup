<?php

$link = mysqli_connect("localhost","phpmyadmin","Cutespirit25648","myschool")
	or die("無法連接");
$sql = "SELECT * FROM students";
if ($result = mysqli_query($link, $sql)){
	while( $row = mysqli_fetch_assoc($result)){
		echo $row["sno"]."-".$row["name"]."<br>";
	}
	mysqli_free_result($result);
}
mysqli_close($link);
?>
