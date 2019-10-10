<?php

	include "../conexao/db_banco.php";

	$programa = $_POST['programa'];
	$descricao = $_POST['descricao'];
	$quant = $_POST['quant'];
	$setor = $_POST['setor'];
	

	mysqli_set_charset($conn, 'utf8');

	$sql = "INSERT INTO software (programa, descricao, quant, setor)
	VALUES ('$programa', '$descricao', '$quant', '$setor')";

	if ($conn->query($sql) === TRUE) {
	    header("Location: ../reg_software.php");
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();


?>