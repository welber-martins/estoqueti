<?php
	include_once("../conexao/db_banco.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$nome = mysqli_real_escape_string($conn, $_POST['nome_subcategoria']);


	$result_sub = "UPDATE subcategoria SET nome_subcategoria ='$nome' WHERE id = '$id'";
	$resultado_sub = mysqli_query($conn, $result_sub);


	//echo "$id - $nome";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
</head>
<body><?php
		if (mysqli_affected_rows($conn) !=0) {
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0; URL=http://localhost/gentelella-master/production/exclui.php'>
				<script type=\"text/javascript\"
					alert(\"Subcategoria alterado com sucesso.\");
				<script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0; URL=http://localhost/gentelella-master/production/exclui.php'>
				<script type=\"text/javascript\"
					alert(\"Subcategoria não alterado com sucesso.\");
				<script>

			";
		}?>


</body>
</html>
<?php $conn->close(); ?>