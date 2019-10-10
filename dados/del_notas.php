<?php

	$id = $_GET['id'];

	include_once "../conexao/db_banco.php";

	$sql = "DELETE FROM sub_nota WHERE id = $id ";
	$result = $conn->query($sql);

	$conn = null;

	header("location: ../total_notas.php");

 ?>