<?php
	session_start();

	include "../conexao/db_banco.php";

	$categoria_nome = $_POST['categoria_nome'];
	

	mysqli_set_charset($conn, 'utf8');


	$sql = "INSERT INTO categoria (categoria_nome)
	VALUES ('$categoria_nome')";

	if ($conn->query($sql) === TRUE) {
	    header("Location: ../adc_dis.php");
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();


?>