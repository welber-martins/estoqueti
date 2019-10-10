<?php

	$id = $_GET['id'];

	include_once "../conexao/db_banco.php";

	$sql = "DELETE FROM subcategoria WHERE id = $id ";
	$result = $conn->query($sql);

	$conn = null;

	header("location: ../exclui.php");

 ?>