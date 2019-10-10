
<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "estoque";


	$conn = new mysqli($servername, $username, $password, $dbname);


	if($conn->connect_errno)
	echo "Falha na conexão: (".$mysqli->connect_errno.") ".$conn->connect_error;




?>