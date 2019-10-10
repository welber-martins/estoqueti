<?php
	session_start();
	include_once("../conexao/db_banco.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Saída</title>
	<head>
	<body>


		<?php

			// Definimos o nome do arquivo que será exportado
			$arquivo = 'estoqueTI.xls';
			
			// Criamos uma tabela HTML com o formato da planilha
			$html = '';
			$html .= '<table border="1">';
			$html .= '<tr>';
			$html .= '<td colspan="7"><center>Total de Saida</center></tr>';
			$html .= '</tr>';
			
			
			$html .= '<tr>';
			$html .= '<td><b>ID</b></td>';  
			$html .= '<th>Número da nota</th>';
			$html .= '<th>Dispositivo</th>';
			$html .= '<th>Descrição</th>';
			$html .= '<th>Data</th>';
			$html .= '<th>Quantidade</th>';
			$html .= '</tr>';


			$result_empresas ="SELECT sn.id, nf.num_nota, ct.categoria_nome, sub.nome_subcategoria, nf.data, sn.quantidade from sub_nota as sn, categoria as ct, subcategoria as sub, nota_fiscal as nf
								WHERE  sn.nota_fiscal_id = nf.id and sn.categorias = ct.id and sn.sub_categoria = sub.id";	
			$resultado_empresas = mysqli_query($conn, $result_empresas);
				
				while ($row_empresas = mysqli_fetch_assoc($resultado_empresas)){

			      	$html .= '<tr>';
			        $html .= '<td>'.$row_empresas["id"].'</td>';
			        $html .= '<td> '.$row_empresas["num_nota"].'';
			        $html .= '<td> '.$row_empresas["categoria_nome"].'';
			        $html .= '<td> '.$row_empresas["nome_subcategoria"].'';
			        $data = date('d/m/Y',strtotime($row_empresas['data']));
					$html .= '<td>'.$data.'</td>';
			        $html .= '<td> '.$row_empresas["quantidade"].'';
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
		
		
		?>
		
	
	</body>
</html>