<?php 
include_once("conexao/db_banco.php");

	$dispositivos = $_REQUEST['dispositivos'];

	$result_sub_cat = "SELECT * FROM subcategoria WHERE categoria_id=$dispositivos ORDER BY nome_subcategoria";
	$resultado_sub_cat = mysqli_query($conn, $result_sub_cat);


		while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$subcategoria[] = array(
			'id'	=> $row_sub_cat['id'],
			'nome_subcategoria' => utf8_encode($row_sub_cat['nome_subcategoria']),
		);
	}
	
	echo(json_encode($subcategoria));