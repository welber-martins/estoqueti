<?php
	session_start();

	include "../conexao/db_banco.php";
	
	$categorias = $_POST['categorias'];
	$nota_fiscal_id = $_POST['nota_fiscal_id'];
	$sub_categoria = $_POST['sub_categoria'];
	$quantidade = $_POST['quantidade'];
	
	mysqli_set_charset($conn, 'utf8');


	$sql = "INSERT INTO sub_nota (categorias , nota_fiscal_id, sub_categoria, quantidade)
	VALUES ('$categorias', '$nota_fiscal_id', '$sub_categoria', '$quantidade')";

	if ($conn->query($sql) === TRUE) {
	    header("Location: ../add_nota.php");
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();


?>