<?php
//including the database connection file

include_once("conexao/db_banco.php");

?>
<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/mont.ico" type="image/ico" />
    <title>Estoque TI</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <link href="css/hardware.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php
          include 'menu.php';
        ?>
        <!-- top navigation -->
        <?php
          include 'nav.php';
        ?>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Hardware </h3>
              </div>

              <div class="container">
    

<!-- Corpo -->

    
  <div id="">
      <br/><br/><br/><br/><br/><br/>
              <center><h3>Total Notas</h3></center>
              <br />
            <div class="row">
            <form action="total_notas.php" method="POST">
        <div class="col-xs-3">
          <label >Nota Fiscal:</label>
           <select  class="form-control" name="nota_fiscal_id" id="nota_fiscal_id" onchange="changeSelect();">
              <option value="">Selecione</option>
                <?php
                  $result_cat_post = "SELECT * FROM nota_fiscal ORDER BY num_nota";
                $resultado_cat_post = mysqli_query($conn, $result_cat_post);
                while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
                  echo '<option value="'.$row_cat_post['id'].'">'.$row_cat_post['num_nota'].'</option>';
                }
                ?>
             </select>
        </div>
        <div class="col-xs-3">
        <label >Período:</label>
        <div class="input-group input-daterange" data-provide="datepicker">
            <input type="text" class="form-control" name="data1"  id="data1">
            <div class="input-group-addon">Até</div>
            <input type="text" class="form-control" name="data2" id="data2">
        </div>
        </div>
        <br />
       
        <input type="submit" class="btn btn-primary" id="btn_enviar" value="Pesquisar" name="enviar">
      </form>
          <form method="POST" action="excel/excel_nota.php">
            <div class="row espaco">
              <div class="pull-right">
                <a href="excel/excel_s_n.php"><button type='button' class='btn btn-success'>Gerar Excel Total</button></a>          
                <input type="submit" value="Gerar Excel" class='btn btn-success'>
              </div>
            </div>

            <br /><br /><br />
            </div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Número da nota</th>
                  <th>Dispositivo</th>
                  <th>Descrição</th>
                  <th>Qtd</th>
                </tr>
              </thead>
            <?php 
            if (isset($_REQUEST['nota_fiscal_id']) && $_REQUEST['data1'] == "") {
              $nota_fiscal = $_POST['nota_fiscal_id'];

                //$result_empresas = "SELECT * FROM hardware WHERE dispositivos LIKE  '$dispositivo'";  
                $result_empresas ="SELECT sn.id, nf.num_nota, ct.categoria_nome, sub.nome_subcategoria, sn.quantidade from sub_nota as sn, categoria as ct, subcategoria as sub, nota_fiscal as nf
                WHERE sn.nota_fiscal_id = '$nota_fiscal' and sn.nota_fiscal_id = nf.id and sn.categorias = ct.id and sn.sub_categoria = sub.id";
    
                  $resultado_empresas = mysqli_query($conn, $result_empresas);
                  
                  while ($row_empresas = mysqli_fetch_assoc($resultado_empresas)){

                        echo '<tr>';
                        echo '<td> '.$row_empresas["id"].'';
                        echo '<td> '.$row_empresas["num_nota"].'';
                        echo '<td> '.$row_empresas["categoria_nome"].'';
                        echo '<td> '.$row_empresas["nome_subcategoria"].'';
                        echo '<td> '.$row_empresas["quantidade"].'';
                        echo '<td width=230>';
                        //echo "<a class='btn btn-success' href=\"cliente/editar_contato.php?id=".$aux_query['id']."\">Editar</a> ";
                        echo " <a class='btn btn-danger' href=\"dados/del_entrada.php?id=".$row_empresas['id']."#modaldel\">Deletar</a> ";
                        echo '<tr>'; }
                }
            elseif ($_SERVER['REQUEST_METHOD']=='POST') {
            
                $nota_fiscal = $_POST['nota_fiscal_id'];
                $data = $_POST['data1'];
                $data1 = $_POST['data2'];
                $dataP = explode('/', $data);
                $dataPP = explode('/', $data1);
                @$datadB = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];
                @$dataDb = $dataPP[2].'-'.$dataPP[1].'-'.$dataPP[0];
                $pagina = 1;
                $_SESSION['nota_fiscals'] = $nota_fiscal;
                $_SESSION['data1'] = $datadB;
                $_SESSION['data2'] = $dataDb;
                
                listar($nota_fiscal, $datadB, $dataDb, $pagina, $conn);

                }
                elseif((isset($_SESSION['nota_fiscals'])) AND (isset($_SESSION['data1'])) AND (isset($_SESSION['data2']))){
                  $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
                  listar($_SESSION['nota_fiscals'], $_SESSION['data1'], $_SESSION['data2'], $pagina, $conn);
                }

                function listar($nota_fiscal, $datadB, $dataDb, $pagina, $conn){
                  
                  $result_empresa = "SELECT sn.id, nf.num_nota, ct.categoria_nome, sub.nome_subcategoria, nf.data, sn.quantidade from sub_nota as sn, categoria as ct, subcategoria as sub, nota_fiscal as nf
                  WHERE sn.nota_fiscal_id = '$nota_fiscal' and sn.nota_fiscal_id = nf.id and data BETWEEN '$datadB' AND '$dataDb' and sn.categorias = ct.id and sn.sub_categoria = sub.id";       
                  
                  $resultado_empresa = mysqli_query($conn, $result_empresa);
                  
                  $total_empresas = mysqli_num_rows($resultado_empresa);
                  
                  $qnt_result_pg = 10;
                  
                  $inicio = ($qnt_result_pg*$pagina)-$qnt_result_pg;
                  
                  //$result_empresas = "SELECT * FROM hardware WHERE dispositivos LIKE  '$dispositivo' AND data BETWEEN '$datadB' AND '$dataDb' limit $inicio, $qnt_result_pg";
                  $result_empresas ="SELECT sn.id, nf.num_nota, ct.categoria_nome, sub.nome_subcategoria, nf.data, sn.quantidade from sub_nota as sn, categoria as ct, subcategoria as sub, nota_fiscal as nf
                  WHERE sn.nota_fiscal_id = '$nota_fiscal' and sn.nota_fiscal_id = nf.id and data BETWEEN '$datadB' AND '$dataDb' and sn.categorias = ct.id and sn.sub_categoria = sub.id limit $inicio, $qnt_result_pg";
                    
                    
                  $resultado_empresas = mysqli_query($conn, $result_empresas);
                  
                  while ($row_empresas = mysqli_fetch_assoc($resultado_empresas)){

                        echo '<tr>';
                        echo '<td> '.$row_empresas["id"].'';
                        echo '<td> '.$row_empresas["num_nota"].'';
                        echo '<td> '.$row_empresas["categoria_nome"].'';
                        echo '<td> '.$row_empresas["nome_subcategoria"].'';
                        echo '<td> '.$row_empresas["quantidade"].'';
                        echo '<td width=230>';
                        //echo "<a class='btn btn-success' href=\"cliente/editar_contato.php?id=".$aux_query['id']."\">Editar</a> ";
                        echo " <a class='btn btn-danger' href=\"dados/del_notas.php?id=".$row_empresas['id']."#modaldel\">Deletar</a> ";;
                        echo '<tr>'; }
            ?>
          </table>
        </form>
      <?php  


                //************* INICIO PAGINAÇÂO **************/
                //Qunatidade de paginas
                $quantidade_pg = ceil($total_empresas / $qnt_result_pg);
                
                //Limite de link antes e depois 
                $MaxLinks = 10;
                
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                
                echo "<a href='total_notas.php?pagina=1'>Primeira</a> ";
                
                for($iPag = $pagina - $MaxLinks; $iPag <= $pagina - 1; $iPag++){
                  if($iPag >= 1){
                    echo "<a href='total_notas.php?pagina=$iPag'>$iPag</a> ";
                  }
                }
                
                echo " $pagina ";
                
                for($dPag = $pagina + 1; $dPag <= $pagina + $MaxLinks; $dPag++){
                  if($dPag <= $quantidade_pg){
                    echo "<a href='total_notas.php?pagina=$dPag'>$dPag</a> ";
                  }
                }
                
                echo "<a href='total_notas.php?pagina=$quantidade_pg'>Última</a>";
              }


      ?>

        
    </div>
    </script>
    <!-- jQuery -->
    <script src="js/jquery-3.2.1.min.js"></script>

    <script src="js/pt-br.js"></script>
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Dropzone.js -->
    <script src="vendors/dropzone/dist/min/dropzone.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/locales/bootstrap-datepicker.pt-BR.min.js"></script>

     <script>
      $('.input-group').datepicker({
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        forceParse: 0,
        showMeridian: 1,
        language:"pt-BR"
      })
    </script>
  </body>
</html>