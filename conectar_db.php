<?php
	//Código para conectar
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "inventario";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbName);
	$conn->set_charset("utf8");

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
?>