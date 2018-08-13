<?php
	echo 'Webapp on Localhost';
	// http://localhost:81/MAMP/index.php?page=phpmyadmin&language=English

	// first, connect to the server where the database will be created
	// $conn = mysqli_connect("heroku_c5eb04791d8ad92", "b13525e9dcde9c", "71459c8d");
	$conn = mysqli_connect("localhost", "root", "root");
	
	if ($conn) {
		echo "<br>Successfully connected!";
	} else {
		die("<br>Cannot connect: " . mysqli_connect_error());
	}
/*	
	// create database, in this case the database is called genre maker
	if (mysql_query("CREATE DATABASE genreMaker", $conn)) {
		echo "Your database was successfully created!";
	} else {
		echo "DB Error: " . mysql_error();
	}
	
	// select the database in order to tell where the table will be going
	mysql_select_db("snippets", $conn);
	
	// create table and specify what the type of each column is
	$sql = "CREATE TABLE genres (
		section1 varchar(20),
		section2 varchar(20),
		section3 int
	)";
	
	if (mysql_query($sql, $conn)) {
		echo "Your table was successfully created!";
	} else {
		echo "TB Error: " . mysql_error();
	}
	
	mysql_close($conn);
*/
?>