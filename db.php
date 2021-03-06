<?php

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "ltem_db";
	
	// Create connection
	$bdd = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($bdd->connect_error) {
		die("Connection failed: " . $bdd->connect_error);
	}
	
?> 