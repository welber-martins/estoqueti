<?php
	session_start();

	include "../conexao/db_banco.php";
	
	$categoria_id = $_POST['categoria_id'];
	$nome_subcategoria = $_POST['nome_subcategoria'];
	
	mysqli_set_charset($conn, 'utf8');


	$sql = "INSERT INTO subcategoria (categoria_id , nome_subcategoria)
	VALUES ('$categoria_id', '$nome_subcategoria')";

	if ($conn->query($sql) === TRUE) {
	    header("Location: ../adc_dis.php");
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();


?>