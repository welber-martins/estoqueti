<?php

	include "../conexao/db_banco.php";

	$dispositivos = $_POST['dispositivos'];
	$descricao = $_POST['descricao'];
	$quant = $_POST['quant'];
	$data = $_POST['data'];
	$dataP = explode('/', $data);
	$datadB = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];
	$obsrvacao = $_POST['obsrvacao'];

	mysqli_set_charset($conn, 'utf8');

	$sql = "INSERT INTO hardware (dispositivos, descricao, quant, data, obsrvacao)
	VALUES ('$dispositivos', '$descricao', '$quant', '$datadB', '$obsrvacao')";

	if ($conn->query($sql) === TRUE) {
	    header("Location: ../hardware.php");
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();


?>