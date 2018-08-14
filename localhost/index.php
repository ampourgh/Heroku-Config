<?php
	echo 'Webapp on localhost';
	
	// http://localhost:81/MAMP/index.php?page=phpmyadmin&language=English

	// first, connect to the server where the database will be created
	// $conn = mysqli_connect("us-cdbr-iron-east-01.cleardb.net", "b13525e9dcde9c", "71459c8d", "heroku_c5eb04791d8ad92");
	$conn = mysqli_connect("localhost", "root", "root");
	
	if ($conn) {
		echo "<br>Successfully connected!";
	} else {
		die("<br>Cannot connect: " . mysqli_connect_error());
	}
	
	echo "<br><br>";
	
	$sql = "SELECT * FROM genremaker";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo "<b>id: </b>" . $row["id"]. " - <b>genre:</b> " . $row["genre"] . "<br>";
		}
	} else {
		echo "0 results";
	}

	mysqli_close($conn);
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