 <?php
	session_start();
	include_once("../conexao/db_banco.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Excel</title>
	<head>
	<body>


		<?php
		//Está sendo enviado as informações
		if ($_SERVER['REQUEST_METHOD']=='SESSION') {
			
			$programa = $_POST['programa'];

			listar($programa, $conn);

		}elseif((isset($_SESSION['programa']))){
				listar($_SESSION['programa'], $conn);
			}

			function listar($programa, $conn){


			// Definimos o nome do arquivo que será exportado
			$arquivo = 'estoqueTI.xls';
			
			// Criamos uma tabela HTML com o formato da planilha
			$html = '';
			$html .= '<table border="1">';
			$html .= '<tr>';
			$html .= '<td colspan="5"><center>Total de Software</center></tr>';
			$html .= '</tr>';
			
			
			$html .= '<tr>';
			$html .= '<td><b>ID</b></td>';
			$html .= '<td><b>Programa</b></td>';
			$html .= '<td><b>Descricao</b></td>';
			$html .= '<td><b>Quantidade</b></td>';
			$html .= '<td><b>Setor</b></td>';
			$html .= '</tr>';


			$result_empresas = "SELECT * FROM software WHERE programa LIKE  '$programa'";		
			$resultado_empresas = mysqli_query($conn, $result_empresas);
				
				while ($row_empresas = mysqli_fetch_assoc($resultado_empresas)){

			      	$html .= '<tr>';
			      	$html .= '<td>'.$row_empresas["id"].'</td>';
					$html .= '<td>'.$row_empresas["programa"].'</td>';
					$html .= '<td>'.$row_empresas["descricao"].'</td>';
					$html .= '<td>'.$row_empresas["quant"].'</td>';
					$html .= '<td>'.utf8_encode($row_empresas["setor"]).'</td>';
					$html .= '</tr>';
			         }
			// Configurações header para forçar o download
			header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
			header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
			header ("Cache-Control: no-cache, must-revalidate");
			header ("Pragma: no-cache");
			header ("Content-type: application/x-msexcel");
			header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
			header ("Content-Description: PHP Generated Data" );
			// Envia o conteúdo do arquivo
			echo $html;
			exit;
		}
		
		?>
		
	
	</body>
</html>