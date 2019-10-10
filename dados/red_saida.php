<?php

	include "../conexao/db_banco.php";

	$dispositivo = $_POST['dispositivo'];
	$descricao = $_POST['descricao'];
	$quant = $_POST['quant'];
	$data = $_POST['data'];
	$dataP = explode('/', $data);
	$datadB = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];
	$setor = $_POST['setor'];
	$observacao = $_POST['observacao'];

	mysqli_set_charset($conn, 'utf8');

	$sql = "INSERT INTO saida (dispositivo, descricao, quant, data, setor, observacao)
	VALUES ('$dispositivo', '$descricao', '$quant', '$datadB', '$setor', '$observacao')";

	if ($conn->query($sql) === TRUE) {
	    header("Location: ../hardware_saida.php");
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();


?>