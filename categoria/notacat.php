<?php
	session_start();

	include "../conexao/db_banco.php";

	$num_nota = $_POST['num_nota'];
	$data = $_POST['data'];
	$dataP = explode('/', $data);
	$datadB = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];

	mysqli_set_charset($conn, 'utf8');


	$sql = "INSERT INTO nota_fiscal (num_nota,data)
	VALUES ('$num_nota', '$datadB')";

	if ($conn->query($sql) === TRUE) {
	    header("Location: ../add_nota.php");
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();


?>